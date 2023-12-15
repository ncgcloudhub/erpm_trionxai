<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AcidProduct;
use App\Models\Bank;
use App\Models\Customer;
use App\Models\Product;
use App\Models\ServiceInvoice;
use App\Models\ServiceInvoiceItem;
use App\Models\ServiceInvoicePaymentItem;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class ServiceController extends Controller
{
    public function ServiceForm() 
    {
        // $id = Auth::user()->id;
		// $adminData = Admin::find($id);
        $banks = Bank::orderBy('bank_name','ASC')->get();
        $customers = Customer::orderBy('customer_name','ASC')->get();
        // $inventory = TodaysProduction::sum('qty');
        $acidProducts = AcidProduct::find(1);
        // $acidProducts = AcidProduct::orderBy('product_name','ASC')->first();
        $products = Product::where('qty','>',10000)->orderBy('product_name','ASC')->get();
        return view('admin.Backend.Service.service_form', compact('customers','banks','acidProducts','products'));
    }

    public function ServiceStore(Request $request)
    {   

        $admin = Auth::guard('admin')->user();

        $service_id = ServiceInvoice::insertGetId([
            'customer_id' => $request->customer_id,
            'service_date' => $request->saleDate,
            'details' => $request->details,
            'sub_total' => $request->subtotal,
            'invoice' => 'STAS'.date('Y').mt_rand(10000, 99999),
            'grand_total' => $request->grandtotal,
            'service_discount_flat' => $request->dflat,
            'service_discount_per' => $request->dper,
            'total_vat' => $request->vper,
            'user_id' => $admin->id,
            'p_paid_amount' => $request->paidamount,
            'due_amount' => $request->dueamount,
            'created_at' => Carbon::now(),   
  
        ]);

        
        $item = $request->input('item');
        $stock = $request->input('stock');
        // $batch = $request->input('batch');
        $qty = $request->input('qnty');
        $rate = $request->input('rate');
        // $rateType = $request->input('rateType');
        $amount = $request->input('amount');

        foreach ($item as $key => $value) {

            $matchProduct = Product::where('id',$value)->get();

            // $productIDs = $matchProduct->pluck('id')->toArray();
            
            // foreach($productIDs as $product) {
            //     // dd($product);
            //     // print($product.',');
            //     $match1Product = Product::where('id',$product)->get();

            //     if(isset($product->qty) && $product->qty == null){
            //         Product::findOrFail($product)->update([
            //             'qty' => $qty[$key],
            //         ]);
            //     }else{
            //         Product::findOrFail($product)->update([
            //             'qty' => $stock[$key] - $qty[$key] ,
            //         ]);
            //     }
            // }


            ServiceInvoiceItem::create([
                'product_id' => $value,
                'service_id' => $service_id,
                'qty' => $qty[$key],
                'rate' => $rate[$key],
                // 'rateType' => $rateType[$key],
                'amount' => $amount[$key],


            ]);
        }   


        $payitem = $request->input('payitem');
        $pay_amount = $request->input('pay_amount');
     
        foreach ($payitem as $key => $value) {

            ServiceInvoicePaymentItem::create([
                'bank_id' => $value,
                'service_id' => $service_id,
                'b_paid_amount' => $pay_amount[$key],
            ]);
        }
    
		// return redirect()->back();
        $notification = array(
			'message' => 'Service Saved Successfully',
			'alert-type' => 'success'
		);

        return redirect()->back()->with($notification);

    }

    public function ManageService (){

        $admin = Auth::guard('admin')->user();
        $service = ServiceInvoice::orderBy('id','DESC')->get();
		return view('admin.Backend.Service.manage_service',compact('service','admin'));

    }

    public function DownloadService ($id){
                    
        $sale = ServiceInvoice::with('customer','user')->where('id',$id)->first();
    	$saleItem = ServiceInvoiceItem::with('product','sales')->where('service_id',$id)->orderBy('id','ASC')->get();

		$pdf = PDF::loadView('admin.Backend.Service.view_service',compact('sale','saleItem'))->setPaper('a4')->setOptions([
				'tempDir' => public_path(),
				'chroot' => public_path(),
		]);
		return $pdf->download('Service.pdf');
    }

    	// Sale Detailed View 
	    public function DetailService($id){

            $sale = ServiceInvoice::findOrFail($id);
            $saleItem = ServiceInvoiceItem::where('service_id',$id)->get();
            $paysaleItem = ServiceInvoicePaymentItem::where('service_id',$id)->get();
            $customers = Customer::orderBy('customer_name','ASC')->get();
            $products = Product::orderBy('product_name','ASC')->get();

            // dd($paysaleItem);

            return view('admin.Backend.Service.service_details',compact('sale','customers','products','saleItem','paysaleItem'));

	} // end method

    	// Sale Detailed View 
	    public function MaleSaleChalan($id){

            $sale = Sales::findOrFail($id);
            $saleItem = SalesItem::where('sales_id',$id)->get();
            $paysaleItem = SalesPaymentItem::where('sale_id',$id)->get();
            $customers = Customer::orderBy('customer_name','ASC')->get();
            $products = Product::orderBy('product_name','ASC')->get();

            // dd($paysaleItem);

            return view('admin.Backend.Sales.sale_chalan',compact('sale','customers','products','saleItem','paysaleItem'));

	} // end method 

    public function ServiceDelete($id){

    	ServiceInvoice::findOrFail($id)->delete();

    	$notification = array(
			'message' => 'Service Invoice Deleted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method 

    // SALES CHALAN STORE
    public function SalesChalanStore(Request $request)
    {

        $admin = Auth::guard('admin')->user();

        $chalan_id = Chalan::insertGetId([
            'customer_id' => $request->customer_id,
            'chalan_date' => $request->saleDate,
            'details' => $request->details,
            // 'sub_total' => $request->subtotal,
            'chalan_no' => 'STAC'.date('Y').mt_rand(10000, 99999),
            // 'grand_total' => $request->grandtotal,
            // 'discount_flat' => $request->dflat,
            // 'discount_per' => $request->dper,
            // 'total_vat' => $request->vper,
            'user_id' => $admin->id,
            'invoice_number' => $request->sale_id,
            'purpose' => "Sales",
            // 'p_paid_amount' => $request->paidamount,
            // 'due_amount' => $request->dueamount,
            'created_at' => Carbon::now(),   
  
        ]);

        
        $item = $request->input('item');
        $stock = $request->input('stock');
        // $batch = $request->input('batch');
        $qty = $request->input('cqnty');
        // $rate = $request->input('cqnty');
        // $rateType = $request->input('rateType');
        $amount = $request->input('amount');

        foreach ($item as $key => $value) {

            // $matchProduct = Product::where('id',$value)->get();

            // $productIDs = $matchProduct->pluck('id')->toArray();
            
            if (!empty($qty[$key])) {
                
                ChalanItem::create([
                    'product_id' => $value,
                    'chalan_id' => $chalan_id,
                    'qty' => $qty[$key],
                    // 'rate' => $rate[$key],
                    // 'rateType' => $rateType[$key],
                    // 'amount' => $amount[$key],
                ]);

                // Deduct the sold quantity from the product stock
                $product = Product::find($value);
                $product->qty -= $qty[$key];
                $product->save();
            }           
        }   

		// return redirect()->back();
        $notification = array(
			'message' => 'Sale Chalan Created Successfully',
			'alert-type' => 'success'
		);

        return redirect()->back()->with($notification);

    }
    // END SALES CHALAN STORE

    // ACTIVE/INACTIVE
    public function SaleInactive($id){
        Sales::findOrFail($id)->update(['active_inactive' => 0]);
        $notification = array(
           'message' => 'Sale Inactivated',
           'alert-type' => 'info'
       );

       return redirect()->back()->with($notification);
    }


     public function SaleActive($id){
         Sales::findOrFail($id)->update(['active_inactive' => 1]);
            $notification = array(
            'message' => 'Sale Activated',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
        
    }
    // END ACTIVE INSACTIVE

    	// Sale Detailed View 
	    public function EditSale($id){

            $sale = Sales::findOrFail($id);
            $saleItem = SalesItem::where('sales_id',$id)->get();
            $paysaleItem = SalesPaymentItem::where('sale_id',$id)->get();
            $customers = Customer::orderBy('customer_name','ASC')->get();
            $products = Product::orderBy('product_name','ASC')->get();

            // dd($paysaleItem);

            return view('admin.Backend.Sales.sale_edit',compact('sale','customers','products','saleItem','paysaleItem'));

	} // end method

    public function SalesUpdate(Request $request){

		// dd($request);
        $cid = $request->id;

		   $sale = Sales::find($cid);  // Assuming you have the conveyance ID
		   $sale->update([
			   'p_paid_amount' => $request->paidamount,
			   'due_amount' => $request->dueamount,
			   'updated_at' => Carbon::now(),
		   ]);

         $notification = array(
            'message' => 'Sale Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    }// End Method 
}
