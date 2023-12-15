<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


class PayrollController extends Controller
{
    public function GenerateForm(){
		
		// return view('admin.Backend.Payroll.PayrollForm');
        $employees = Employee::latest()->get();

        return view('admin.Backend.Payroll.generated_form', compact('employees'));
	}

    public function SalaryEdit($id){

		$employee = Employee::findOrFail($id);
        $banks = Bank::orderBy('bank_name','ASC')->get();
		return view('admin.Backend.Payroll.salary_edit', compact('employee','banks'));
	}

    public function SalaryStore(Request $request)
    {

    //    dd($request);
       $admin = Auth::guard('admin')->user();

       Salary::insert([
           'employee_id' => $request->employee_id,
           'date' => $request->date,
           'amount' => $request->amount,
           'month' => $request->month,
           'year' => $request->year,
           'salary_type' => $request->salary_type,
           'details' => $request->details,
           'bank_id' => $request->bank_id,
           'made_by_id' => $admin->id,
           'created_at' => Carbon::now(),   
   
           ]);

                $employee_id = Employee::findOrFail($request->employee_id);
                $bank_id = Bank::findOrFail($request->bank_id);

				$amount = $request->amount;

                if ($request->salary_type == "Advance") {
                    $employee_id->advance += $amount;
                    $bank_id->balance -= $amount;
                    $employee_id->net_pay -= $amount;

                } elseif ($request->salary_type == "Salary") {
                    
                    $employee_id->net_pay -= $amount;
                    $bank_id->balance -= $amount;
                    // $cbank->loan -= $amount;
                    if($employee_id->net_pay == 0){
                        $employee_id->advance = 0;
                    }   
                }
                
                $bank_id->save();
                $employee_id->save();
                
				// $cbank->save();
          
        // SMS

// Sending SMS using the API
$apiKey = "C2004084656705562b4566.58564675";
$senderId = "2";
$contentType = "text";
$scheduledDateTime = "6:00 PM";
$message = "Salary Updated Successfully for employee: " . $employee_id->name;
$contacts = "8801677341032+8801964870827";

$response = Http::post("https://www.bangladeshsms.com/smsapi", [
    'api_key' => $apiKey,
    'senderid' => $senderId,
    'type' => $contentType,
    'scheduledDateTime' => $scheduledDateTime,
    'msg' => $message,
    'contacts' => $contacts,
]);
        // END SMS

        // dd($response );

        if ($response->successful()) {
            // SMS sent successfully
            $notification = [
                'message' => 'Salary Updated Successfully. SMS sent.',
                'alert-type' => 'success',
            ];
        } else {
            // SMS sending failed
            $notification = [
                'message' => 'Salary Updated Successfully. SMS sending failed.',
                'alert-type' => 'error',
            ];
        }

           return redirect()->back()->with($notification);
    }


    public function ManageSalary(){
		
        $salaries = Salary::latest()->get();

        return view('admin.Backend.Payroll.salary_manage', compact('salaries'));
	}
}
