<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SupplierController extends Controller
{
    public function SupplierAdd(){
		$supplier = Supplier::latest()->get();
		return view('admin.Backend.Supplier.supplier' ,compact('supplier'));
	}

    public function SupplierStore(Request $request){

	    Supplier::insert([
		'vendor_name' => $request->vendor_name,
		'vendor_s_name' => $request->vendor_s_name,
        'price' => $request->price,
        'email' => $request->email,
        'contact' => $request->contact,
        'address' => $request->address,
        'city' => $request->city,
        'state' => $request->state,
        'zip' => $request->zip,
        'country' => $request->counntry,
		'created_at' => Carbon::now(),   

    	]);

	    $notification = array(
			'message' => 'Vendor Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    } // end method

	public function SupplierManage(){
		$suppliers = Supplier::latest()->get();
		return view('admin.Backend.Supplier.supplier_manage' ,compact('suppliers'));
	}

	public function SupplierEdit($id){
		$supplier = Supplier::findOrFail($id);
			return view('admin.Backend.Supplier.supplier_edit',compact('supplier'));
		}
	
	public function SupplierView($id){
		$supplier = Supplier::findOrFail($id);
			return view('admin.Backend.Supplier.supplier_view',compact('supplier'));
		}
	

		public function SupplierUpdate(Request $request){
			
			$id = $request->id;
		
			Supplier::findOrFail($id)->update([
				'vendor_name' => $request->vendor_name,
				'vendor_s_name' => $request->vendor_s_name,
        		'price' => $request->price,
        		'email' => $request->email,
        		'contact' => $request->contact,
        		'address' => $request->address,
        		'city' => $request->city,
        		'state' => $request->state,
        		'zip' => $request->zip,
        		'country' => $request->country,
				'updated_at' => Carbon::now(), 
		
				]);
		
				$notification = array(
					'message' => 'Vendor Updated Successfully',
					'alert-type' => 'info'
				);
		
				return redirect()->route('supplier.manage')->with($notification);
		
				 // end else 
				
			} // end method 


			public function SupplierDelete($id){
				
				Supplier::findOrFail($id)->delete();
		
				$notification = array(
					'message' => 'Vendor Delectd Successfully',
					'alert-type' => 'info'
				);
		
				return redirect()->back()->with($notification);
		
			} // end method

}
