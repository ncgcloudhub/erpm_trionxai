<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Pipeline;
use Laravel\Fortify\Actions\EnsureLoginIsNotThrottled;
use Laravel\Fortify\Actions\PrepareAuthenticatedSession;
use Laravel\Fortify\Contracts\LoginViewResponse;
use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Features;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Requests\LoginRequest;

use App\Actions\Fortify\AttemptToAuthenticate;
use App\Actions\Fortify\RedirectIfTwoFactorAuthenticatable;
use App\Http\Responses\LoginResponse;
use App\Models\Brand;
use App\Models\TaxProject;
use App\Models\TaxTaskProject;
use Illuminate\Support\Str;


class Admincontroller extends Controller
{

    public function search(Request $request)
    {
        $query = $request->input('query');
        
        // Search TaxProject model
        $projects = TaxProject::where('project_name', 'LIKE', "%$query%")
            ->orWhere('description', 'LIKE', "%$query%")->orWhere('income_project_id', 'LIKE', "%$query%")
            ->get();
    
        // Search TaxTaskProject model
        $tasks = TaxTaskProject::where('description', 'LIKE', "%$query%")
        ->orWhere('task_id', 'LIKE', "%$query%")
        ->orWhere('status', 'LIKE', "%$query%")
        ->orWhere('eSignature', 'LIKE', "%$query%")
        ->orWhere('ef_status', 'LIKE', "%$query%")
        ->orWhereHas('customer', function($q) use ($query) {
            $q->where('company_name', 'LIKE', "%$query%")
              ->orWhere('user_name', 'LIKE', "%$query%")
              ->orWhere('email', 'LIKE', "%$query%")
              ->orWhere('ssn', 'LIKE', "%$query%")
              ->orWhere('personal_phone', 'LIKE', "%$query%");
        })
        ->get();
    
        // Format results
        $results = [];
    
        foreach ($projects as $project) {
            $results[] = [
                'title' => $project->project_name,
                'url' => route('taxproject.manage.task', $project->id),  // Adjust route name as needed
                'excerpt' => Str::limit($project->description, 100),
            ];
        }
    
        foreach ($tasks as $task) {
            $results[] = [
                'title' => 'Income Tax Task - ' . ($task->customer ? $task->customer->user_name : 'No Customer'),
                'url' => route('taxproject.task.view', $task->id),  // Adjust route name as needed
                'excerpt' => Str::limit($task->description, 100),
            ];
        }
    
        return response()->json(['results' => $results]);
    }
    




    /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\StatefulGuard  $guard
     * @return void
     */
    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    public function loginForm(){
        return view('auth.login',['guard' => 'admin']);
    }

    /**
     * Show the login view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Fortify\Contracts\LoginViewResponse
     */
    public function create(Request $request): LoginViewResponse
    {
        return app(LoginViewResponse::class);
    }

    /**
     * Attempt to authenticate a new session.
     *
     * @param  \Laravel\Fortify\Http\Requests\LoginRequest  $request
     * @return mixed
     */
    public function store(LoginRequest $request)
    {
        return $this->loginPipeline($request)->then(function ($request) {
            return app(LoginResponse::class);
        });
    }

    /**
     * Get the authentication pipeline instance.
     *
     * @param  \Laravel\Fortify\Http\Requests\LoginRequest  $request
     * @return \Illuminate\Pipeline\Pipeline
     */
    protected function loginPipeline(LoginRequest $request)
    {
        if (Fortify::$authenticateThroughCallback) {
            return (new Pipeline(app()))->send($request)->through(array_filter(
                call_user_func(Fortify::$authenticateThroughCallback, $request)
            ));
        }

        if (is_array(config('fortify.pipelines.login'))) {
            return (new Pipeline(app()))->send($request)->through(array_filter(
                config('fortify.pipelines.login')
            ));
        }

        return (new Pipeline(app()))->send($request)->through(array_filter([
            config('fortify.limiters.login') ? null : EnsureLoginIsNotThrottled::class,
            Features::enabled(Features::twoFactorAuthentication()) ? 
            RedirectIfTwoFactorAuthenticatable::class : null,
            AttemptToAuthenticate::class,
            PrepareAuthenticatedSession::class,
        ]));
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Fortify\Contracts\LogoutResponse
     */
    public function destroy(Request $request): LogoutResponse
    {
        $this->guard->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return app(LogoutResponse::class);
    }

    public function BrandView(){
        
        return view('admin.adminIndex' );
    }
    

}
