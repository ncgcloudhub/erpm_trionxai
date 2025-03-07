<?php

namespace App\Http\Controllers;

use App\Exports\CustomerExport;
use App\Exports\ExportTasksCustomers;
use App\Imports\TaxCustomersImport;
use App\MailHelper;
use App\Models\TaxProject;
use App\Models\Admin;
use App\Models\Employee;
use App\Models\Product;
use App\Models\Customer;
use App\Models\ImmigrationCategory;
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
		$immigrationcategories = ImmigrationCategory::all();

		// $brands = Brand::latest()->get();
		return view('admin.Backend.Tax.taxproject_task_add', compact('categories','customers','assignedby','assignto', 'immigrationcategories'));
	}  // end method


    public function StoreProjectTask(Request $request){

		// dd($request);
		$logged_in_user_id = Auth::guard('admin')->user();
		
		// Check if the custom fields have a value, fallback to default fields
		$priority = $request->custom_priority ?? $request->priority;
		$status = $request->custom_status ?? $request->status;
		$tax_year = $request->custom_tax_year ?? $request->tax_year;
		$eSignature = $request->custom_eSignature ?? $request->eSignature;
		$ef_status = $request->custom_ef_status ?? $request->ef_status;


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
		'category' => json_encode($request->category),

		'total_pay' => $request->total_pay,
		'paid_amount' => $request->paid_amount,
		'due_amount' => $request->due_amount,

      	'subject' => $request->subject,
      	'paymentStatus' => $request->paymentStatus,
      	'clientType' => $request->clientType,
      	'hyperlinks' => $request->hyperlinks,
      	'priority' => $priority,
		'status' => $status,
		'tax_year' => $tax_year,
		'eSignature' => $eSignature,
		'ef_status' => $ef_status,
		'logged_in_user' => $logged_in_user_id->id,

      	'created_at' => Carbon::now(),   

      ]);

	  MailHelper::sendTaskEmail($request->assing_to, $request->customer_id, $request->description, $request->checkMail);

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
		$immigrationcategories = ImmigrationCategory::all();
		// dd($task->description);
		// Ensure category is an array
		$task->category = json_decode($task->category, true); // If stored as JSON

        return view('admin.Backend.Tax.taxproject_task_edit',compact('categories','customers','assignedby','assignto','task', 'immigrationcategories'));
	}

	public function ViewProjectTask($id){		   

		$categories = TaxProject::latest()->get();
		$assignedby = Admin::latest()->get();
		$assignto = Employee::latest()->get();
		$customers = Customer::latest()->get();
		$task = TaxTaskProject::findOrFail($id);
		$immigrationcategories = ImmigrationCategory::all();
		// dd($task->description);

        return view('admin.Backend.Tax.taxproject_task_view',compact('categories','customers','assignedby','assignto','task', 'immigrationcategories'));
	}

	public function CloneTask($id)
	{
		$categories = TaxProject::latest()->get();
		$assignedby = Admin::latest()->get();
		$assignto = Employee::latest()->get();
		$customers = Customer::latest()->get();
		$task = TaxTaskProject::findOrFail($id);
		$immigrationcategories = ImmigrationCategory::all();
		// Ensure category is an array
		$task->category = json_decode($task->category, true); // If stored as JSON

        return view('admin.Backend.Tax.taxproject_task_clone',compact('categories','customers','assignedby','assignto','task', 'immigrationcategories'));
	}


	public function ProjectUpdateTask(Request $request){

		 // Check if the custom priority field has a value
		 $priority = $request->custom_priority ?: $request->priority;
		 $status = $request->custom_status ?: $request->status;
		 $tax_year = $request->custom_tax_year ?: $request->tax_year;
		 $eSignature = $request->custom_eSignature ?: $request->eSignature;
		 $ef_status = $request->custom_ef_status ?: $request->ef_status;

		TaxTaskProject::findOrFail($request->id)->update([
			
		'customer_id' => $request->customer_id,
		'description' => $request->description,
		'comment' => $request->comment,
		'assign_date' => $request->assign_date,
		'completion_date' => $request->completion_date,
		
		'assigned_by' => $request->assigned_by,
		'assign_to' => $request->assign_to,
		'project_list' => $request->project_list,
		'category' => json_encode($request->category),

		'total_pay' => $request->total_pay,
		'paid_amount' => $request->paid_amount,
		'due_amount' => $request->due_amount,

      	'subject' => $request->subject,
		'paymentStatus' => $request->paymentStatus,
      	'clientType' => $request->clientType,
      	'hyperlinks' => $request->hyperlinks,
      	'priority' => $priority,
		'status' => $status,
		'tax_year' => $tax_year,
		'eSignature' => $eSignature,
		'ef_status' => $ef_status,
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

   public function immigrationCategoryView()
   {
		$categories = ImmigrationCategory::orderBy('id','DESC')->get();
		return view('admin.Backend.Tax.incometax_category',compact('categories'));
	} // end method 

	public function immigrationCategoryStore(Request $request)
	{
		$request->validate([
			'value' => 'required|string|max:255',
			'category' => 'required|string|max:255',
		]);

		ImmigrationCategory::create([
			'value' => $request->value,
			'category_name' => $request->category,
		]);

		return redirect()->route('immigration.category')->with('success', 'Category added successfully.');
	}

	public function immigrationCategoryUpdate(Request $request, $id)
    {
        $request->validate([
            'value' => 'required|string|max:255',
            'category' => 'required|string|max:255',
        ]);

        ImmigrationCategory::findOrFail($id)->update([
            'value' => $request->value,
            'category_name' => $request->category,
        ]);

        return redirect()->route('immigration.category')->with('success', 'Category updated successfully.');
    }

    public function immigrationCategoryDelete($id)
    {
        ImmigrationCategory::findOrFail($id)->delete();
        return redirect()->route('immigration.category')->with('success', 'Category deleted successfully.');
    }


}
