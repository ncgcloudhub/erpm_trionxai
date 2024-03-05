<?php

namespace App\Http\Controllers;

use App\Exports\CustomerExport;
use App\Exports\ExportTasksCustomers;
use App\Imports\TaxCustomersImport;
use App\Models\TaxProject;
use App\Models\Admin;
use App\Models\Employee;
use App\Models\Product;
use App\Models\Customer;
use App\Models\TaxTaskProject;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;

use Illuminate\Support\Carbon;

class IncomeTaxController extends Controller
{
    public function AddProject(){

    	$categories = TaxProject::latest()->get();
		$assignedby = Admin::latest()->get();
		$assignto = Employee::latest()->get();
		// $brands = Brand::latest()->get();
		return view('admin.Backend.Tax.taxproject_add', compact('categories','assignedby','assignto'));   	
    }  // end method

    public function StoreProject(Request $request){
		
		$logged_in_user_id = Auth::guard('admin')->user();

		// Get the current date and time
		$currentDateTime = now();

		// Format the date and time as 'ymdHi'
		$formattedDateTime = $currentDateTime->format('ymdHis');

        TaxProject::insertGetId([
      	
		'income_project_id' => 'IP'.$formattedDateTime,
		'project_name' => $request->project_name,
		'description' => $request->description,
		'comment' => $request->comment,
		'assign_date' => $request->assign_date,
		'completion_date' => $request->completion_date,
		
		'assigned_by' => $request->assigned_by,
		'assign_to' => $request->assign_to,

      	'hyperlinks' => $request->hyperlinks,
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

		$categories = TaxProject::latest()->get();
		$assignedby = Admin::latest()->get();
		$assignto = Employee::latest()->get();
		$project = TaxProject::findOrFail($id);

        return view('admin.Backend.Tax.taxproject_edit',compact('categories','assignedby','assignto','project'));
	}

	public function ProjectUpdate(Request $request){

		TaxProject::findOrFail($request->id)->update([
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

			return redirect(route('taxproject.manage'))->with($notification);
	}

	public function ProjectDetails($id){		   

		$project = TaxProject::findOrFail($id);
		$tasks = TaxTaskProject::where('project_list',$id)->get();

		$categories = TaxProject::latest()->get();
		$assignedby = Admin::latest()->get();
		$assignto = Employee::latest()->get();
		

        return view('admin.Backend.Tax.taxproject_view_details',compact('categories','assignedby','assignto','project','tasks'));
	}

    public function ManageProject(){

		$products = TaxProject::latest()->get();
		
		foreach ($products as $product) {
			$product->tasks = TaxTaskProject::where('project_list', $product->id)->get();
		}

		return view('admin.Backend.Tax.taxproject_manage',compact('products'));
	}  // end method

    public function AddTask(){
		$categories = TaxProject::latest()->get();
		$assignedby = Admin::latest()->get();
		$assignto = Employee::latest()->get();
		$customers = Customer::latest()->get();
		// $brands = Brand::latest()->get();
		return view('admin.Backend.Tax.taxproject_task_add', compact('categories','customers','assignedby','assignto'));
	}  // end method


    public function StoreProjectTask(Request $request){

		$logged_in_user_id = Auth::guard('admin')->user();

		// Get the current date and time
		$currentDateTime = now();

		// Format the date and time as 'ymdHi'
		$formattedDateTime = $currentDateTime->format('ymdHis');

    $product_id = TaxTaskProject::insertGetId([
      	
		'customer_id' => $request->customer_id,
		'task_id' => 'T'.$formattedDateTime,
		'description' => $request->description,
		'comment' => $request->comment,
		'assign_date' => $request->assign_date,
		'completion_date' => $request->completion_date,
		
		'assigned_by' => $request->assigned_by,
		'assign_to' => $request->assign_to,
		'project_list' => $request->project_list,

      	'hyperlinks' => $request->hyperlinks,
      	'priority' => $request->priority,
		'status' => $request->status,
		'tax_year' => $request->tax_year,
		'eSignature' => $request->eSignature,
		'ef_status' => $request->ef_status,
		'logged_in_user' => $logged_in_user_id->id,

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

		$products = TaxTaskProject::latest()->get();
		
		return view('admin.Backend.Tax.taxproject_task_manage',compact('products'));
	}  // end method

	public function EditProjectTask($id){		   

		$categories = TaxProject::latest()->get();
		$assignedby = Admin::latest()->get();
		$assignto = Employee::latest()->get();
		$customers = Customer::latest()->get();
		$task = TaxTaskProject::findOrFail($id);
		// dd($task->description);

        return view('admin.Backend.Tax.taxproject_task_edit',compact('categories','customers','assignedby','assignto','task'));
	}

	public function ViewProjectTask($id){		   

		$categories = TaxProject::latest()->get();
		$assignedby = Admin::latest()->get();
		$assignto = Employee::latest()->get();
		$customers = Customer::latest()->get();
		$task = TaxTaskProject::findOrFail($id);
		// dd($task->description);

        return view('admin.Backend.Tax.taxproject_task_view',compact('categories','customers','assignedby','assignto','task'));
	}

	public function ProjectUpdateTask(Request $request){

		TaxTaskProject::findOrFail($request->id)->update([
			
		'customer_id' => $request->customer_id,
		'description' => $request->description,
		'comment' => $request->comment,
		'assign_date' => $request->assign_date,
		'completion_date' => $request->completion_date,
		
		'assigned_by' => $request->assigned_by,
		'assign_to' => $request->assign_to,
		'project_list' => $request->project_list,

      	'hyperlinks' => $request->hyperlinks,
      	'priority' => $request->priority,
		'status' => $request->status,
		'tax_year' => $request->tax_year,
		'eSignature' => $request->eSignature,
		'ef_status' => $request->ef_status,
		'updated_at' => Carbon::now(),   

			]);

			$notification = array(
				'message' => 'Project Task Updated Successfully',
				'alert-type' => 'success'
			);

			return redirect(route('taxproject.manage.task'))->with($notification);
	}

	public function ProjectsDelete($id){
		
		TaxProject::findOrFail($id)->delete();

		$notification = array(
			'message' => 'Project Delectd Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

	} // end method


	public function ProjectTaskDelete($id){
		
		TaxTaskProject::findOrFail($id)->delete();

		$notification = array(
			'message' => 'Project Task Delectd Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

	} // end method

	// IMPORT/Export Customer
	public function ImportCustomers(){

        return view('admin.Backend.Brand.Customer.import_customers');

    }// End Method 
	
	public function ImportTaskCustomers(){

        return view('admin.Backend.Tax.import_tasks_customers');

    }// End Method 

	public function ExportCustomers(){

        return Excel::download(new CustomerExport, 'TaxCustomers.xlsx');

    }// End Method 

	public function ExportTaskCustomers(){

        return Excel::download(new ExportTasksCustomers, 'TaskCustomers.xlsx');

    }// End Method 


	public function ImportTaxCustomers(Request $request){

		// Set maximum execution time to 700 seconds
        ini_set('max_execution_time', 700);

		Excel::import(new TaxCustomersImport, $request->file('import_file'));

		 $notification = array(
		   'message' => 'Tax Customers Imported Successfully',
		   'alert-type' => 'success'
	   );

	   return redirect()->back()->with($notification);

   }// End Method 
}
