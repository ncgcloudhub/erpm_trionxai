<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;

use Illuminate\Support\Carbon;

class CourseController extends Controller
{
    public function CourseAdd(){
		$courses = Course::orderBy('id','ASC')->get();
		return view('admin.Backend.Course.course' ,compact('courses'));
	}

    public function CourseManage(){
		$courses = Course::orderBy('id','ASC')->get();
		return view('admin.Backend.Course.course_manage' ,compact('courses'));
	}

	public function CourseView($id){
		$courses = Course::orderBy('id','ASC')->get();
		$course = Course::findOrFail($id);
			return view('admin.Backend.Course.course_view',compact('course','courses'));
	}


	public function CourseStore(Request $request){
	

        Course::insert([
		'course_name' => $request->course_name,
		'code' => $request->code,
        'description' => $request->description,
        'type' => $request->type,
        'fees' => $request->fees,
        'discounted_fees' => $request->discounted_fees,
        'difficulty' => $request->difficulty,
        'duration' => $request->duration,
        'prerequisites' => $request->prerequisites,
        'objectives' => $request->objectives,
        'comments' => $request->comments,
       
		
    	]);

	    $notification = array(
			'message' => 'Course Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method


	public function CourseEdit($id){
		$courses = Course::orderBy('id','ASC')->get();
		$course = Course::findOrFail($id);
			return view('admin.Backend.Course.course_edit',compact('course','courses'));
		}
	
	
	public function CourseUpdate(Request $request){
			
		$id = $request->id;
	
		Course::findOrFail($id)->update([
			'course_name' => $request->course_name,
			'code' => $request->code,
    		'description' => $request->description,
        	'type' => $request->type,
        	'fees' => $request->fees,
        	'discounted_fees' => $request->discounted_fees,
        	'difficulty' => $request->difficulty,
        	'duration' => $request->duration,
        	'prerequisites' => $request->prerequisites,
        	'objectives' => $request->objectives,
        	'comments' => $request->comments,
			'updated_at' => Carbon::now(), 
	
			]);
	
			$notification = array(
				'message' => 'Course Updated Successfully',
				'alert-type' => 'info'
			);
	
			return redirect()->route('course.manage')->with($notification);
	
			 // end else 
			
		} // end method 


		public function CourseDelete($id){
			$course = Course::findOrFail($id);
			
			Course::findOrFail($id)->delete();
	
			$notification = array(
				'message' => 'Course Delectd Successfully',
				'alert-type' => 'info'
			);
	
			return redirect()->back()->with($notification);
	
		} // end method


}
