<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use App\Models\Department;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function AddDesignation (){
		$designations = Designation::latest()->get();
		return view('admin.Backend.Designation.designation' ,compact('designations'));
	}

     public function DesignationStore(Request $request){

    	// $request->validate([
    		 
    	// 	'customer_name' => 'required',
    	// ],[
    	// 	'phone' => 'required',
    		 
    	// ]);

        Designation::insert([
		'designation' => $request->designation,

    	]);

	    $notification = array(
			'message' => 'Designation Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method

	////////// DEPARTMENT ////////

	public function AddDepartment (){
		$departments = Department::latest()->get();
		return view('admin.Backend.Department.department' ,compact('departments'));
	}


     public function DepartmentStore(Request $request){

    	// $request->validate([
    		 
    	// 	'customer_name' => 'required',
    	// ],[
    	// 	'phone' => 'required',
    		 
    	// ]);

        Department::insert([
		'department' => $request->department,

    	]);

	    $notification = array(
			'message' => 'Department Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method
}
