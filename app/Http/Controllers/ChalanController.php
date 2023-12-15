<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AcidProduct;
use App\Models\Customer;
use App\Models\Sales;
use App\Models\Bank;
use App\Models\TodaysProduction;
use Illuminate\Http\Request;
use App\Models\Chalan;
use App\Models\ReturnProduct;
use App\Models\ChalanItem;
use App\Models\Product;
use App\Models\Schedule;
use Carbon\Carbon;
// use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use PDF;

class ChalanController extends Controller
{
    public function ChalanForm() 
    {
        // $id = Auth::user()->id;
		// $adminData = Admin::find($id);
        $banks = Bank::orderBy('bank_name','ASC')->get();
        $customers = Customer::orderBy('customer_name','ASC')->get();
        $sales = Sales::orderBy('id','ASC')->get();
        // $inventory = TodaysProduction::sum('qty');
        $acidProducts = AcidProduct::find(1);
        // $acidProducts = AcidProduct::orderBy('product_name','ASC')->first();
        $products = Product::where('qty','>',0) ->orWhere('stock_b', '>', 0)->orderBy('product_name','ASC')->get();
        return view('admin.Backend.Chalan.chalan_form', compact('customers','banks','acidProducts','products','sales'));
    }

    public function ChalanStore(Request $request)
    {

        // dd($request);
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
            // 'sale_id' => $request->sale_id,
            'purpose' => $request->purpose,
            // 'p_paid_amount' => $request->paidamount,
            // 'due_amount' => $request->dueamount,
            'created_at' => Carbon::now(),   
  
        ]);

        
        $item = $request->input('item');
        $stock = $request->input('stock');
        $inventory = $request->input('inventory-select');
        $qty = $request->input('qnty');
        $rate = $request->input('rate');
        $amount = $request->input('amount');
    
        foreach ($item as $key => $value) {
            // Get the selected product
            $product = Product::findOrFail($value);
    
            // Calculate the deduction amount based on the selected inventory
            $deductionAmount = ($inventory[$key] == "qty") ? $qty[$key] : 0;
            $deductionAmountStockB = ($inventory[$key] == "stock_b") ? $qty[$key] : 0;
    
            // Deduct from the appropriate inventory
            $product->update([
                'qty' => $product->qty - $deductionAmount,
                'stock_b' => $product->stock_b - $deductionAmountStockB,
            ]);
    
            // Create ChalanItem for each item
            ChalanItem::create([
                'product_id' => $value,
                'chalan_id' => $chalan_id,
                'qty' => $qty[$key],
                'rate' => $rate[$key],
                'amount' => $amount[$key],
                'inventory' => $inventory[$key],
            ]);
        }

		// return redirect()->back();
        $notification = array(
			'message' => 'Chalan Created Successfully',
			'alert-type' => 'success'
		);

        return redirect()->back()->with($notification);

    }

    public function ManageChalan (){

        $admin = Auth::guard('admin')->user();
        $chalans = Chalan::orderBy('id','DESC')->get();
		return view('admin.Backend.Chalan.manage_chalan',compact('chalans','admin'));

    }

    public function ManageSampleChalan() {

        $admin = Auth::guard('admin')->user();
        $chalans = Chalan::leftJoin('return_products', 'chalans.id', '=', 'return_products.chalan_id')
            ->whereNull('return_products.chalan_id')
            ->where(function ($query) {
                $query->where('purpose', 'Sample')->orWhere('purpose', 'Digital Team');
            })
            ->select('chalans.*')
            ->get();
        return view('admin.Backend.Chalan.manage_sample_chalan', compact('chalans', 'admin'));
    }
    
    

    // Sale Detailed View 
    public function DetailChalan($id){

        $chalan = Chalan::findOrFail($id);
        $chalanItem = ChalanItem::where('chalan_id',$id)->get();
        $customers = Customer::orderBy('customer_name','ASC')->get();
        $products = Product::orderBy('product_name','ASC')->get();

        // dd($paysaleItem);

        return view('admin.Backend.Chalan.chalan_details',compact('chalan','customers','products','chalanItem'));
    
        } // end method

    public function DownloadChalan ($id){
                    
        $chalan = Chalan::with('customer','user')->where('id',$id)->first();
    	$chalanItem = ChalanItem::with('product','chalans')->where('chalan_id',$id)->orderBy('id','ASC')->get();

		$pdf = PDF::loadView('admin.Backend.Chalan.view_chalan',compact('chalan','chalanItem'))->setPaper('a4')->setOptions([
				'tempDir' => public_path(),
				'chroot' => public_path(),
		]);
		return $pdf->download('Chalan.pdf');
    }

    	// Sale Detailed View 
	    public function DetailSale($id){

            $sale = Sales::findOrFail($id);
            $saleItem = SalesItem::where('sales_id',$id)->get();
            $paysaleItem = SalesPaymentItem::where('sale_id',$id)->get();
            $customers = Customer::orderBy('customer_name','ASC')->get();
            $products = Product::orderBy('product_name','ASC')->get();

            // dd($paysaleItem);

            return view('admin.Backend.Sales.sale_details',compact('sale','customers','products','saleItem','paysaleItem'));

	} // end method 

    public function ChalanDelete($id){

    	Chalan::findOrFail($id)->delete();

    	$notification = array(
			'message' => 'Chalan Deleted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method 


}
