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
		$formattedDateTime = $currentDateTime->format('ymdHi');

		// dd($formattedDateTime);
		// Extract the last two digits of the year
		$lastTwoDigitsOfYear = $currentDateTime->format('y');

		// Create a 10-digit student ID in the format 'YYMMDDHHMM'
		$studentID = $lastTwoDigitsOfYear . $formattedDateTime;

        Student::insert([
		'student_name' => $request->student_name,
        'student_id' => $studentID,
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
}
