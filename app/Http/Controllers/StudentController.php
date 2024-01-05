<?php

namespace App\Http\Controllers;

use App\Models\Student;

use Illuminate\Http\Request;

use Illuminate\Support\Carbon;

class StudentController extends Controller
{


	public function StudentAdd(){
		$students = Student::orderBy('id','ASC')->get();
		return view('admin.Backend.Student.student' ,compact('students'));
	}

    public function StudentManage(){
		$students = Student::orderBy('id','ASC')->get();
		return view('admin.Backend.Student.student_manage' ,compact('students'));
	}

	public function StudentView($id){
		$students = Student::orderBy('id','ASC')->get();
		$student = Student::findOrFail($id);
			return view('admin.Backend.Student.student_view',compact('student','students'));
	}


	public function StudentStore(Request $request){
	
		// Get the current date and time
		$currentDateTime = now();

		// Format the date and time as 'ymdHi'
		$formattedDateTime = $currentDateTime->format('ymdHis');

        Student::insert([
		'student_name' => $request->student_name,
        'student_id' => $formattedDateTime,
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


	public function StudentEdit($id){
		$students = Student::orderBy('id','ASC')->get();
		$student = Student::findOrFail($id);
			return view('admin.Backend.Student.student_edit',compact('student','students'));
		}
	
	
	public function StudentUpdate(Request $request){
			
		$id = $request->id;
	
		Student::findOrFail($id)->update([
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
		'updated_at' => Carbon::now(), 
	
			]);
	
			$notification = array(
				'message' => 'Student Updated Successfully',
				'alert-type' => 'info'
			);
	
			return redirect()->route('student.manage')->with($notification);
	
			 // end else 
			
		} // end method 


		public function StudentDelete($id){
			$student = Student::findOrFail($id);
			
			Student::findOrFail($id)->delete();
	
			$notification = array(
				'message' => 'Student Delectd Successfully',
				'alert-type' => 'info'
			);
	
			return redirect()->back()->with($notification);
	
		} // end method
}
