<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Carbon;

class EmployeeController extends Controller
{
    public function AddEmployee(){
		// $categories = Category::latest()->get();
		$designations = Designation::latest()->get();
		$departments = Department::latest()->get();
		// return view('admin.Backend.Product.product', compact('categories','brands'));
        return view('admin.Backend.Employee.employee', compact('designations','departments'));
	}
    
	public function StoreEmployee(Request $request){


		$status=0;
		$checkstatus=$request->status;
		if($checkstatus=='1')
			{
				$status=1;
			}

		if ($request->file('image')) {

			$image = $request->file('image');
			$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
			Image::make($image)->resize(200,200)->save('upload/employee/'.$name_gen);
			$save_url = 'upload/employee/'.$name_gen;

			Employee::insertGetId([
				'f_name' => $request->first_name,
				'l_name' => $request->last_name,
				'designation_id' => $request->designation,
				'department_id' => $request->department,
	  
			  	'phone' => $request->phone,
				'r_type' => $request->rate_type,

				'salary' => $request->salary,

			  	'email' => $request->email,
				'employee_type' => $request->employee_type,
				'address' =>  $request->address,
				'city' =>  $request->city,
				'state' =>  $request->state,
				'zip' =>  $request->zip,
				'country' => $request->country,
				'consent' => $status,
			  
			  	'image' =>  $save_url,
		  
				
				'created_at' => Carbon::now(),   
	  
			]);
		}else{
			Employee::insertGetId([
				'f_name' => $request->first_name,
				'l_name' => $request->last_name,
				'designation_id' => $request->designation,
				'department_id' => $request->department,
	  
			  	'phone' => $request->phone,
				'r_type' => $request->rate_type,

				'salary' => $request->salary,

			  	'email' => $request->email,
				'employee_type' => $request->employee_type,
				'address' =>  $request->address,
				'city' =>  $request->city,
				'state' =>  $request->state,
				'zip' =>  $request->zip,
				'country' => $request->country,
				'consent' => $status,

				'created_at' => Carbon::now(),   
	  
			]);
		}

       $notification = array(
			'message' => 'Employee Added Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

	} // end method

	public function ManageEmployee(){

		$employees = Employee::latest()->get();
		return view('admin.Backend.Employee.manage_employee',compact('employees'));
	}


	public function EditEmployee($id){

		$employee = Employee::findOrFail($id);
		$designations = Designation::latest()->get();
		$departments = Department::latest()->get();
		return view('admin.Backend.Employee.employee_edit', compact('employee','designations','departments'));
		
	}

	public function ViewEmployee($id){

		$employee = Employee::findOrFail($id);
		$designations = Designation::latest()->get();
		$departments = Department::latest()->get();
		return view('admin.Backend.Employee.employee_view', compact('employee','designations','departments'));
		
	}

	public function EmployeeUpdate (Request $request){
		$id = $request->id;	

		$status=0;
		$checkstatus=$request->status;
		if($checkstatus=='1')
			{
				$status=1;
			}
			
			if($request->file('image')){

			$image = $request->file('image');
			$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
			Image::make($image)->resize(200,200)->save('upload/employee/'.$name_gen);
			$save_url = 'upload/employee/'.$name_gen;

				Employee::findOrFail($id)->update([
					'image' =>  $save_url,
				]);
			}


		Employee::findOrFail($id)->update([
				'f_name' => $request->first_name,
				'l_name' => $request->last_name,
				'designation_id' => $request->designation,
				'department_id' => $request->department,

			  	'phone' => $request->phone,
				'r_type' => $request->rate_type,
				'salary' => $request->salary,

			  	'email' => $request->email,
				'employee_type' => $request->employee_type,
				'address' =>  $request->address,
				'city' =>  $request->city,

				'state' =>  $request->state,
				'zip' =>  $request->zip,
				'country' => $request->country,
				'consent' => $status,
				'updated_at' => Carbon::now(), 
	
			]);
	
			$notification = array(
				'message' => 'Employee Updated Successfully',
				'alert-type' => 'info'
			);
	
			return redirect()->route('employee.manage')->with($notification);
	
			
		} // end method 


		public function EmployeeDelete($id){
			
			Employee::findOrFail($id)->delete();
	
			$notification = array(
				'message' => 'Employee Delectd Successfully',
				'alert-type' => 'info'
			);
	
			return redirect()->back()->with($notification);
	
		} // end method

}
