<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Requisition;
use App\Models\RequisitionType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class RequisitionController extends Controller
{
    public function RequisitionTypeView (){

    	$requisitionTypes = RequisitionType::latest()->get();
    	return view('admin.Backend.Requisition.requisitionType',compact('requisitionTypes'));
    }

    public function RequisitionTypeStore(Request $request){

	RequisitionType::insert([
		'requisitionType' => $request->requisitionType,
		'created_at' => Carbon::now(),   

    	]);

	    $notification = array(
			'message' => 'Requisition Type Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method 

    public function RequisitionView (){

    	$requisitionTypes = RequisitionType::latest()->get();
    	return view('admin.Backend.Requisition.requisition',compact('requisitionTypes'));
    }

    public function RequisitionStore(Request $request){

        Requisition::insert([
            'requisitionType_id' => $request->requisitionType,
            'date' => $request->date,
            'amount' => $request->amount,
            'details' => $request->details,
            'type' => $request->type,
            'lo' => $request->lo,
            'location' => $request->location,
            'qty' => $request->qty,
            'status' => 'Unpaid',
            'created_at' => Carbon::now(),   
    
            ]);
            
           
            $notification = array(
                'message' => 'Requisition Added Successfully',
                'alert-type' => 'success'
            );
    
    
            return redirect()->back()->with($notification);
    
        } // end method 

        public function RequisitionManage (){

            if(Auth::guard('admin')->user()->type=="1" || Auth::guard('admin')->user()->type=="2"){
            	$requisitions = Requisition::latest()->get();
			}else{
				$requisitions = Requisition::where('location','factory')->get();
			}
            return view('admin.Backend.Requisition.manage_requisition',compact('requisitions'));
        }
}
