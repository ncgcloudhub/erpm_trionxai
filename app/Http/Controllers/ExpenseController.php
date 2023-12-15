<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Employee;
use App\Models\Expense;
use App\Models\ExpenseType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function EnpenseTypeView (){

    	$expenseTypes = ExpenseType::latest()->get();
    	return view('admin.Backend.Expense.expenseType',compact('expenseTypes'));
    }

    public function EnpenseTypeStore(Request $request){

    //    $request->validate([
    // 		'expense' => 'required',
			// 'category_image' => 'required',
    		// 'category_icon' => 'required',
    	// ],[
    	// 	'category_name.required' => 'Input Category Name',
			// 'category_image.required' => 'Input Category Image',
    	// ]);
		
		// $image = $request->file('category_image');
    	// $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

    	// Image::make($image)->save('upload/category/'.$name_gen);
    	// $save_url = 'upload/category/'.$name_gen;
    	 

	ExpenseType::insert([
		'expenseType' => $request->expenseType,
		// 'category_image' => $save_url,
		// 'feature' => $request->featured,
		
	
		// 'category_icon' => $request->category_icon,
		'created_at' => Carbon::now(),   

    	]);

	    $notification = array(
			'message' => 'Expense Type Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method 

	public function ExpenseView (){
		$employees = Employee::orderBy('f_name','ASC')->get();
    	$expenseTypes = ExpenseType::latest()->get();
    	return view('admin.Backend.Expense.expense',compact('expenseTypes','employees'));
    }

	public function ExpenseEdit ($id){
		$expense = Expense::findOrFail($id);
		$employees = Employee::orderBy('f_name','ASC')->get();
    	$expenseTypes = ExpenseType::latest()->get();
		$banks = Bank::orderBy('bank_name','ASC')->get();
    	return view('admin.Backend.Expense.edit_expense',compact('expenseTypes','employees','expense','banks'));
    }

	public function ExpenseUpdate(Request $request){

		// dd($request);
		$expense_id = $request->id;

			Expense::findOrFail($expense_id)->update([
				'expenseType_id' => $request->expenseType,
				'date' => $request->date,
				'amount' => $request->amount,
				'location' => $request->location,
				'details' => $request->details,
				'user_id' => $request->employee_id,
				'updated_at' => Carbon::now(),   
		  ]);

		  $cbank = Bank::findOrFail($request->bank_item);
		  $pay_from_amount = $request->pay_from_amount;
		  
		  $cbank->balance-=$pay_from_amount;
		  $cbank->save();

		  $purchase_id_find = Expense::findOrFail($expense_id);
		  $purchase_id_find->from_bank_id = $request->bank_item;
		  $purchase_id_find->amount_from = $request->pay_from_amount;
		  $purchase_id_find->save();

		  $admin = Auth::guard('admin')->user()->id;
		  Expense::findOrFail($expense_id)->update(['status' => "Approved", 'approved_by' => $admin]);

          $notification = array(
			'message' => 'Expense Updated Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);


	} // end method 

    public function ExpenseStore(Request $request){

		$admin = Auth::guard('admin')->user();

        Expense::insert([
            'expenseType_id' => $request->expenseType,
            'date' => $request->date,
            'amount' => $request->amount,
			'location' => $request->location,
            'details' => $request->details,
			'user_id' => $request->employee_id,
			'made_by_id' => $admin->id,
            'created_at' => Carbon::now(),   
    
            ]);
            
           
            $notification = array(
                'message' => 'Expense Added Successfully',
                'alert-type' => 'success'
            );
    
    
            return redirect()->back()->with($notification);
    
        } // end method 

        public function ExpenseManage (){

		$admin = Auth::guard('admin')->user();

			$match = Expense::where('user_id',$admin->id)->get();
			if($admin->type=="1" || $admin->type=="2" || $admin->type=="3"){
				$expenses = Expense::orderBy('id','DESC')->get();
			}elseif($match){
				$expenses = Expense::where('made_by_id',$admin->id)->orderBy('id','DESC')->get();
			}
			return view('admin.Backend.Expense.manage_expense',compact('expenses','admin'));
	
		}

		public function ExpenseApprove($id){

			$admin = Auth::guard('admin')->user()->id;
			Expense::findOrFail($id)->update(['status' => "Approved", 'approved_by' => $admin]);
			   $notification = array(
				  'message' => 'Expense Approved',
				  'alert-type' => 'success'
			  );
	  
			  return redirect()->back()->with($notification);
			   
		   }
}
