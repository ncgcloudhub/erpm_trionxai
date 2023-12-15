<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Deposit;
use App\Models\Employee;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class BankController extends Controller
{
    public function BankView(){
		$banks = Bank::latest()->get();
		$capital = Bank::findOrFail(5);
		return view('admin.Backend.Bank.bank' ,compact('banks','capital'));
	}

	public function DepositAll(){
		$deposits = Deposit::latest()->get();
		return view('admin.Backend.Deposit.all_deposit' ,compact('deposits'));
	}


     public function BankStore(Request $request){

    	$request->validate([
    		'bank_name' => 'required',
    		'ac_name' => 'required',
            'ano_name' => 'required',
            'branch' => 'required',
    	],[
    		'bank_name.required' => 'Please Enter Bank Name',
            'ac_name.required' => 'Please Enter Account Name',
            'ano_name.required' => 'Please Enter Account Number',
            'branch.required' => 'Please Enter Branch',
    	]);

        if ($request->file('sign_image')) {

        $image = $request->file('sign_image');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

    	Image::make($image)->resize(200,200)->save('upload/bank/'.$name_gen);
    	$save_url = 'upload/bank/'.$name_gen;

	    Bank::insert([
		'bank_name' => $request->bank_name,
		'ac_name' => $request->ac_name,
        'ano_name' => $request->ano_name,
        'branch' => $request->branch,
        'loan' => $request->loan,
		'sign_image' => $save_url,
		'created_at' => Carbon::now(),   

    	]);

	    $notification = array(
			'message' => 'Bank Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
     }else{
        Bank::insert([
            'bank_name' => $request->bank_name,
            'ac_name' => $request->ac_name,
            'ano_name' => $request->ano_name,
            'branch' => $request->branch,
			'balance' => $request->balance,
			'loan' => $request->loan,
            'created_at' => Carbon::now(),   
            ]);
    
            $notification = array(
                'message' => 'Bank Inserted Without Image Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);
     }
    } // end method

	public function BankEdit($id){
		$banks = Bank::latest()->get();
		$bank = Bank::findOrFail($id);
		$capital = Bank::findOrFail(5);
			return view('admin.Backend.Bank.bank_edit',compact('bank','banks','capital'));
		}

	
	public function DepositView(){
			$banks = Bank::latest()->get();
			$employees = Employee::latest()->get();
			return view('admin.Backend.Deposit.deposit_form' ,compact('banks','employees'));
		}

	public function getBalance(Request $request){

			$selectedOption = $request->input('option');
			$data = Bank::findOrFail($selectedOption);
		
			return $data;
		
		}

		public function DepositStore(Request $request){

			// dd($request);
			$admin = Auth::guard('admin')->user();

			Deposit::insert([
				'deposit_date' => $request->deposit_date,
				'employee_id' => $request->employee_id,
				'cashType_id' => $request->balance,
				'bank_id' => $request->c_bank,
				'amount' => $request->amount,
				'details' => $request->details,
				'type_of_deposit' => $request->deposit_type,
				'user_id' => $admin->id,
				'created_at' => Carbon::now(),   
				]);

				$typeOfCash = Bank::findOrFail($request->balance);
				$cbank = Bank::findOrFail($request->c_bank);
				$amount = $request->amount;

				if($request->deposit_type == "loan"){
					
					$typeOfCash->loan+=$amount;
					$cbank->balance+=$amount;
				
				}else if($request->deposit_type == "return_loan"){
					$typeOfCash->balance-=$amount;
					$cbank->loan-=$amount;	
				
				}else{			
					// dd($request->depositType);		
					$typeOfCash->balance-=$amount;
					$cbank->balance+=$amount;					
				}
				$typeOfCash->save();
				$cbank->save();

			
		
				$notification = array(
					'message' => 'Deposit Added Successfully',
					'alert-type' => 'success'
				);
		
				return redirect()->back()->with($notification);
		 }
		// end method
	
	
	
	public function BankUpdate(Request $request){
			
	$id = $request->id;
	
            Bank::findOrFail($id)->update([
				'bank_name' => $request->bank_name,
				'ac_name' => $request->ac_name,
				'ano_name' => $request->ano_name,
				'branch' => $request->branch,
				'balance' => $request->balance,
				'loan' => $request->loan,
				'updated_at' => Carbon::now(), 
	
			]);
	
			$notification = array(
				'message' => 'Bank Updated Successfully',
				'alert-type' => 'info'
			);
	
			return redirect()->route('bank.view')->with($notification);
	
			} // end else 
		 // end method 
	
	
	    public function BankDelete($id){

			Bank::findOrFail($id)->delete();
	
			$notification = array(
				'message' => 'Bank Deleted Successfully',
				'alert-type' => 'success'
			);
	
			return redirect()->back()->with($notification);
	
		} // end method 
}
