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
}
