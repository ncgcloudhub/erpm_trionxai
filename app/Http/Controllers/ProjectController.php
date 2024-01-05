<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Admin;
use App\Models\Employee;
use App\Models\Product;

use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;

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

		// $image = $request->file('product_img');
    	// $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

    	// Image::make($image)->resize(200,200)->save('upload/products/'.$name_gen);
    	// $save_url = 'upload/products/'.$name_gen;

        Category::insertGetId([
      	
		'project_name' => $request->project_name,
		'description' => $request->description,
		'comment' => $request->comment,
		'assign_date' => $request->assign_date,
		'completion_date' => $request->completion_date,
		
		'assigned_by' => $request->assigned_by,
		'assign_to' => $request->assign_to,

      	'hyperlinks' => $request->hyperlinks,
      	'priority' => $request->priority,
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

		// $image = $request->file('product_img');
    	// $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

    	// Image::make($image)->resize(200,200)->save('upload/products/'.$name_gen);
    	// $save_url = 'upload/products/'.$name_gen;

      $product_id = Product::insertGetId([
      	
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
		// 'product_img' => $save_url,

      	'created_at' => Carbon::now(),   

      ]);


       $notification = array(
			'message' => 'Project Task Inserted Successfully',
			'alert-type' => 'success'
		);

		// return redirect()->route('manage-product')->with($notification);
		return redirect()->back()->with($notification);

	} // end method

    public function ManageTask(){

		$products = Product::latest()->get();
		return view('admin.Backend.Project.project_task_manage',compact('products'));
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
		'updated_at' => Carbon::now(),   

			]);

			$notification = array(
				'message' => 'Project Task Updated Successfully',
				'alert-type' => 'success'
			);

			return redirect()->back()->with($notification);
	}




}
