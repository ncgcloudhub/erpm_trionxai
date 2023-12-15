<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Dealer;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;


class CustomerController extends Controller
{
    public function CustomerView(){
		$customers = Customer::where('dea_cus',1)->orderBy('customer_name','ASC')->get();
		return view('admin.Backend.Brand.customer' ,compact('customers'));
	}


     public function CustomerStore(Request $request){

		$validator = Validator::make($request->all(), [
			'customer_name' => 'required',
			'phone' => 'nullable|unique:customers',
		], [
			'phone.unique' => 'The phone number already exists.',
		]);
	
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
		}

        Customer::insert([
		'customer_name' => $request->customer_name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
		'dea_cus' => 1,
    	]);

	    $notification = array(
			'message' => 'Customer Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method

	public function CustomerEdit($id){
		$customers = Customer::where('dea_cus',1)->orderBy('customer_name','ASC')->get();
		$customer = Customer::findOrFail($id);
			return view('admin.Backend.Brand.customer_edit',compact('customer','customers'));
		}
	
	
	public function CustomerUpdate(Request $request){
			
		$id = $request->id;
	
		Customer::findOrFail($id)->update([
			'customer_name' => $request->customer_name,
			'email' => $request->email,
			'phone' => $request->phone,
			'address' => $request->address,
			'updated_at' => Carbon::now(), 
	
			]);
	
			$notification = array(
				'message' => 'Customer Updated Successfully',
				'alert-type' => 'info'
			);
	
			return redirect()->route('customer.view')->with($notification);
	
			 // end else 
			
		} // end method 
	
	
		public function CustomerDelete($id){
			$customer = Customer::findOrFail($id);
			$img = $customer->slider_img;
			unlink($img);
			Customer::findOrFail($id)->delete();
	
			$notification = array(
				'message' => 'Slider Delectd Successfully',
				'alert-type' => 'info'
			);
	
			return redirect()->back()->with($notification);
	
		} // end method

		// public function DealerView(){
		// 	$dealers = Dealer::latest()->get();
		// 	return view('admin.Backend.Dealer.dealer' ,compact('dealers'));
		// }
	
}
