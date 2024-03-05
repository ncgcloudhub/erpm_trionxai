<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Admin;
use App\Models\Employee;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;
use App\Mail\ProjectTaskConfirmation;
use Illuminate\Support\Facades\Mail;

class ProjectController extends Controller
{
    public function AddProject(){

    	$categories = Category::latest()->get();
		$assignedby = Admin::latest()->get();
		$assignto = Employee::latest()->get();
		// $brands = Brand::latest()->get();
		return view('admin.Backend.Project.project_add', compact('categories','assignedby','assignto'));   	
    }  // end method

    public function StoreProject(Request $request){

		$logged_in_user_id = Auth::guard('admin')->user();

		// Get the current date and time
		$currentDateTime = now();

		// Format the date and time as 'ymdHi'
		$formattedDateTime = $currentDateTime->format('ymdHis');

        Category::insertGetId([
      	
		'project_id' => 'P'.$formattedDateTime,
		'project_name' => $request->project_name,
		'description' => $request->description,
		'comment' => $request->comment,
		'assign_date' => $request->assign_date,
		'completion_date' => $request->completion_date,
		
		'assigned_by' => $request->assigned_by,
		'assign_to' => $request->assign_to,

      	'hyperlinks' => $request->hyperlinks,
      	'phases' => $request->phases,
      	'priority' => $request->priority,
      	'logged_in_user' => $logged_in_user_id->id,
		// 'product_img' => $save_url,

      	'created_at' => Carbon::now(),   

      ]);

       $notification = array(
			'message' => 'Project Inserted Successfully',
			'alert-type' => 'success'
		);

		// return redirect()->route('manage-product')->with($notification);
		return redirect()->back()->with($notification);

	} // end method

	public function EditProject($id){		   

		$categories = Category::latest()->get();
		$assignedby = Admin::latest()->get();
		$assignto = Employee::latest()->get();
		$project = Category::findOrFail($id);

        return view('admin.Backend.Project.project_edit',compact('categories','assignedby','assignto','project'));
	}

	public function ProjectUpdate(Request $request){

		Category::findOrFail($request->id)->update([
			'project_name' => $request->project_name,
			'description' => $request->description,
			'comment' => $request->comment,
			'assign_date' => $request->assign_date,
			'completion_date' => $request->completion_date,
			
			'assigned_by' => $request->assigned_by,
			'assign_to' => $request->assign_to,
	
			  'hyperlinks' => $request->hyperlinks,
			  'priority' => $request->priority,
			  'bug' => $request->bug,
			  'issue' => $request->issue,
			]);

			$notification = array(
				'message' => 'Project Updated Successfully',
				'alert-type' => 'success'
			);

			return redirect(route('project.manage'))->with($notification);
	}

	public function UpdateComment(Request $request){

		Category::findOrFail($request->id)->update([
			'comment' => $request->comment,
			]);

			$notification = array(
				'message' => 'Comment Updated Successfully',
				'alert-type' => 'success'
			);

			return redirect()->back()->with($notification);
	}

	public function ProjectDetails($id){		   

		$project = Category::findOrFail($id);
		$tasks = Product::where('project_list',$id)->get();

		$categories = Category::latest()->get();
		$assignedby = Admin::latest()->get();
		$assignto = Employee::latest()->get();
		

        return view('admin.Backend.Project.project_view_details',compact('categories','assignedby','assignto','project','tasks'));
	}

    public function ManageProject(){

		$products = Category::latest()->get();
		
		foreach ($products as $product) {
			$product->tasks = Product::where('project_list', $product->id)->get();
		}

		return view('admin.Backend.Project.project_manage',compact('products'));
	}  // end method

    public function AddTask(){
		$categories = Category::latest()->get();
		$assignedby = Admin::latest()->get();
		$assignto = Employee::latest()->get();
		// $brands = Brand::latest()->get();
		return view('admin.Backend.Project.project_task_add', compact('categories','assignedby','assignto'));
	}  // end method


    public function StoreProjectTask(Request $request){

		
	$logged_in_user_id = Auth::guard('admin')->user();

	// Get the current date and time
	$currentDateTime = now();

	// Format the date and time as 'ymdHi'
	$formattedDateTime = $currentDateTime->format('ymdHis');

      $product_id = Product::insertGetId([
      	
		'project_task_id' => 'PT'.$formattedDateTime,
		'task_name' => $request->task_name,
		'description' => $request->description,
		'comment' => $request->comment,
		'assign_date' => $request->assign_date,
		'completion_date' => $request->completion_date,
		
		'assigned_by' => $request->assigned_by,
		'assign_to' => $request->assign_to,
		'project_list' => $request->project_list,

		'sub_task' => $request->sub_task,
      	'bug' => $request->bug,
      	'issue' => $request->issue,
      	'hyperlinks' => $request->hyperlinks,
      	'priority' => $request->priority,
      	'status' => 'Not Started',
      	'logged_in_user' => $logged_in_user_id->id,
		// 'product_img' => $save_url,

      	'created_at' => Carbon::now(),   

      ]);

	  $user_email = Admin::findOrFail($request->assign_to);
	  $email = $user_email->email;

	//   dd($email);

	   // Get details for the confirmation email
	   $taskDetails = [
        'assign_to_name' => Admin::find($request->assign_to)->name,
        'task_name' => $request->task_name,
        'description' => $request->description,
        // Add more details as needed
    ];

	if($request->checkMail == 1){
		// Send confirmation email
		Mail::to($email)->send(new ProjectTaskConfirmation($taskDetails));
	}


       $notification = array(
			'message' => 'Project Task Inserted Successfully',
			'alert-type' => 'success'
		);

		// return redirect()->route('manage-product')->with($notification);
		return redirect()->back()->with($notification);

	} // end method

    public function ManageTask(){
		
		$products = Product::latest()->get();
		$names = Admin::latest()->get();
		return view('admin.Backend.Project.project_task_manage',compact('products','names'));
	}  // end method

	public function EditProjectTask($id){		   

		$categories = Category::latest()->get();
		$assignedby = Admin::latest()->get();
		$assignto = Employee::latest()->get();
		$task = Product::findOrFail($id);
		// dd($task->description);

        return view('admin.Backend.Project.project_task_edit',compact('categories','assignedby','assignto','task'));
	}

	public function ViewProjectTask($id){		   

		$categories = Category::latest()->get();
		$assignedby = Admin::latest()->get();
		$assignto = Employee::latest()->get();
		$task = Product::findOrFail($id);
		// dd($task->description);

        return view('admin.Backend.Project.project_task_view',compact('categories','assignedby','assignto','task'));
	}

	public function ProjectUpdateTask(Request $request){

		Product::findOrFail($request->id)->update([
			
		'task_name' => $request->task_name,
		'description' => $request->description,
		'comment' => $request->comment,
		'assign_date' => $request->assign_date,
		'completion_date' => $request->completion_date,
		
		'assigned_by' => $request->assigned_by,
		'assign_to' => $request->assign_to,
		'project_list' => $request->project_list,

		'sub_task' => $request->sub_task,
      	'bug' => $request->bug,
      	'issue' => $request->issue,
      	'hyperlinks' => $request->hyperlinks,
      	'priority' => $request->priority,
		'status' => $request->status,
		'updated_at' => Carbon::now(),   

			]);

			$notification = array(
				'message' => 'Project Task Updated Successfully',
				'alert-type' => 'success'
			);

			return redirect(route('project.manage.task'))->with($notification);
	}

	public function ProjectsDelete($id){
		
		Category::findOrFail($id)->delete();

		$notification = array(
			'message' => 'Project Delectd Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

	} // end method


	public function ProjectTaskDelete($id){
		
		Product::findOrFail($id)->delete();

		$notification = array(
			'message' => 'Project Task Delectd Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

	} // end method

}
