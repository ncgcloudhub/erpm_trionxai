<?php

namespace App\Http\Controllers;

use App\Models\Student;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function StudentView(){
		$students = Student::orderBy('id','ASC')->get();
		return view('admin.Backend.Student.student' ,compact('students'));
	}


	public function StudentStore(Request $request){
	
		// $validator = Validator::make($request->all(), [
		// 	'customer_name' => 'required',
		// 	'phone' => 'nullable|unique:customers',
		// ], [
		// 	'phone.unique' => 'The phone number already exists.',
		// ]);
	
		// if ($validator->fails()) {
		// 	return redirect()->back()->withErrors($validator)->withInput();
		// }

        Student::insert([
		'student_name' => $request->student_name,
        'student_id' => $request->student_id,
        'gender' => $request->gender,
        'dob' => $request->dob,
        'email' => $request->email,
        'enrolled_in' => $request->enrolled_in,
        'phone' => $request->phone,
        'address' => $request->address,
        'city' => $request->city,
        'state' => $request->state,
        'zip' => $request->zip,
        'country' => $request->country,
		
    	]);

	    $notification = array(
			'message' => 'Student Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method
}
