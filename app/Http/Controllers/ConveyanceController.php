<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Conveyance;
use App\Models\ConveyanceItem;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ConveyanceController extends Controller
{
    public function ConveyanceView(){
		$employees = Employee::orderBy('f_name','ASC')->get();
		return view('admin.Backend.Conveyance.conveyance_form' ,compact('employees'));
	}

	public function getData(Request $request){

		$selectedOption = $request->input('option');
		error_log('Selected option: ' . $selectedOption);
		$data = Employee::with('designation','department')->findOrFail($selectedOption);
		
		return $data;
	
		}

		public function ConveyanceStore(Request $request)
		{
	
			$admin = Auth::guard('admin')->user();
	
			$conveyance_id = Conveyance::insertGetId([
				'employee_id' => $request->employee_id,
				'date' => $request->date,
				's_employee' => $request->s_employee,
				'grand_total' => $request->grandtotal,
				'user_id' => $admin->id,
				'created_at' => Carbon::now(),   
	  
			]);
	
			
			$from = $request->input('from');
			$to = $request->input('to');
			// $batch = $request->input('batch');
			$transport = $request->input('transport');
			$purpose = $request->input('purpose');
			// $rateType = $request->input('rateType');
			$amount = $request->input('amount');
			
			// dd($from, $to, $transport, $purpose, $amount);

			foreach ($from as $key => $value) {
	
				ConveyanceItem::create([
					'from' => $value,
					'conveyance_id' => $conveyance_id,
					'to' => $to[$key],
					'transport' => $transport[$key],
					'purpose' => $purpose[$key],
					'amount' => $amount[$key],
					'created_at' => Carbon::now(),   
				]);
			}   
	
			// return redirect()->back();
			$notification = array(
				'message' => 'Conveyance Created Successfully',
				'alert-type' => 'success'
			);
	
			return redirect()->back()->with($notification);
	
		}

		public function ManageConveyance (){

			$admin = Auth::guard('admin')->user();
			$match = Conveyance::where('user_id',$admin->id)->get();
			if($admin->type=="1" || $admin->type=="2" || $admin->type=="3"){
				$conveyances = Conveyance::orderBy('id','DESC')->get();
			}elseif($match){
				$conveyances = Conveyance::where('user_id',$admin->id)->orderBy('id','DESC')->get();
			}
			return view('admin.Backend.Conveyance.manage_conveyance',compact('conveyances','admin'));
	
		}

		public function ConveyanceApprove($id){

			$admin = Auth::guard('admin')->user()->id;
			Conveyance::findOrFail($id)->update(['status' => "Approved", 'approved_by' => $admin]);
			   $notification = array(
				  'message' => 'Conveyance Approved',
				  'alert-type' => 'success'
			  );
	  
			  return redirect()->back()->with($notification);
			   
		   }
	

		// Sale Detailed View 
	    public function DetailConveyance($id){

            $conveyance = Conveyance::findOrFail($id);
            $conveyanceitems = ConveyanceItem::where('conveyance_id',$id)->get();
			$banks = Bank::orderBy('bank_name','ASC')->get();

            // dd($paysaleItem);

            return view('admin.Backend.Conveyance.conveyance_details',compact('conveyance','conveyanceitems','banks'));

	} // end method 


	public function ConveyanceEdit($id){

		$admin = Auth::guard('admin')->user()->id;
		$conveyance = Conveyance::findOrFail($id);
		$conveyanceitems = ConveyanceItem::where('conveyance_id',$id)->get();
		$banks = Bank::orderBy('bank_name','ASC')->get();

		return view('admin.Backend.Conveyance.edit_conveyance',compact('admin','conveyance','conveyanceitems','banks'));
		   
	   }

	 public function ConveyanceUpdate(Request $request){

		// dd($request);
        $cid = $request->id;

        if ($request->from == NULL) {
           return redirect()->back();
        }else{
            ConveyanceItem::where('conveyance_id',$cid)->delete();

          $conveyanceitems = Count($request->from); 

           for ($i=0; $i < $conveyanceitems; $i++) { 
               $fcount = new ConveyanceItem();
               $fcount->conveyance_id = $cid;
               $fcount->from = $request->from[$i];
               $fcount->to = $request->to[$i];
               $fcount->transport = $request->transport[$i];
               $fcount->purpose = $request->purpose[$i];
               $fcount->amount = $request->amount[$i];
               $fcount->save();
           } // end for 

		   $conveyance = Conveyance::find($cid);  // Assuming you have the conveyance ID
		   $conveyance->update([
			   'grand_total' => $request->grandtotal,
			   'updated_at' => now(),
		   ]);

		   $cbank = Bank::findOrFail($request->bank_item);
		   $pay_from_amount = $request->pay_from_amount;
		   
		   $cbank->balance-=$pay_from_amount;
		   $cbank->save();

		   $purchase_id_find = Conveyance::findOrFail($cid);
		   $purchase_id_find->from_bank_id = $request->bank_item;
		   $purchase_id_find->amount_from = $request->pay_from_amount;
		   $purchase_id_find->save();

		   $admin = Auth::guard('admin')->user()->id;
		   Conveyance::findOrFail($cid)->update(['status' => "Approved", 'approved_by' => $admin]);

        }

         $notification = array(
            'message' => 'Conveyance Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    }// End Method 

	public function ConveyanceDelete($id){

    	Conveyance::findOrFail($id)->delete();

    	$notification = array(
			'message' => 'Conveyance Deleted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method 

	
}
