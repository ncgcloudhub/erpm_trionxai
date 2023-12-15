<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AcidProduct;
use App\Models\Bank;
use App\Models\Chalan;
use App\Models\ChalanItem;
use App\Models\Customer;
use App\Models\PaymentItem;
use App\Models\Product;
use App\Models\Sales;
use App\Models\SalesItem;
use App\Models\SalesPaymentItem;
use App\Models\TodaysProduction;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    public function SalesForm() 
    {
        // $id = Auth::user()->id;
		// $adminData = Admin::find($id);
        $banks = Bank::orderBy('bank_name','ASC')->get();
        $customers = Customer::orderBy('customer_name','ASC')->get();
        // $inventory = TodaysProduction::sum('qty');
        $acidProducts = AcidProduct::find(1);
        // $acidProducts = AcidProduct::orderBy('product_name','ASC')->first();
        $products = Product::where('qty','>',0) ->orWhere('stock_b', '>', 0)->orderBy('product_name','ASC')->get();
        return view('admin.Backend.Sales.sales_form', compact('customers','banks','acidProducts','products'));
    }

    public function SalesStore(Request $request)
    {   

        $admin = Auth::guard('admin')->user();

        $sale_id = Sales::insertGetId([
            'customer_id' => $request->customer_id,
            'sale_date' => $request->saleDate,
            'details' => $request->details,
            'sub_total' => $request->subtotal,
            'invoice' => 'STA'.date('Y').mt_rand(10000, 99999),
            'grand_total' => $request->grandtotal,
            'pInvoice' => $request->pInvoice,
            'discount_flat' => $request->dflat,
            'discount_per' => $request->dper,
            'total_vat' => $request->vper,
            'user_id' => $admin->id,
            'p_paid_amount' => $request->paidamount,
            'due_amount' => $request->dueamount,
            'sale_due_amount' => $request->grandtotal - $request->paidamount,
            'created_at' => Carbon::now(),   
  
        ]);

        // ADD DUE TO CUSTOMER
        $customer = Customer::findOrFail($request->customer_id);
        $customer->cusDue+=$request->dueamount;
        // $customer->balance += $paidAmount;
        // $customer->advance += $totalQty;
        // $customer->due += $totalQty;
        // $customer->rate = $rate;
        // $customer->rateType = $rateType;
        $customer->save();

        
        $item = $request->input('item');
        $stock = $request->input('stock');
        // $batch = $request->input('batch');
        $qty = $request->input('qnty');
        $rate = $request->input('rate');
        // $rateType = $request->input('rateType');
        $amount = $request->input('amount');
        $cost_price = 0;

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

            $product_id = Product::findOrFail($value);

            $cost_price+=$product_id->cost_price * $qty[$key];

            SalesItem::create([
                'product_id' => $value,
                'sales_id' => $sale_id,
                'qty' => $qty[$key],
                'rate' => $rate[$key],
                // 'rateType' => $rateType[$key],
                'amount' => $amount[$key],
            ]);
        }
        
        $capital = $request->grandtotal - $cost_price;

           $capital_bank = Bank::findOrFail(5);
           $capital_bank->balance += $cost_price;
           $capital_bank->save();
        
        $capital_banks = Bank::findOrFail(8);
        $capital_banks->balance += $request->paidamount;
        $capital_banks->save();
        

        //  // Advance
        //  $totalQty = array_sum($qty);
        //  $rate = array_shift($rate);
        //  $rateType = array_shift($rateType);
        
       
        // foreach ($item as $key => $value) {

        //     SalesItem::create([
        //         'product_id' => $value,
        //         'sales_id' => $sale_id,
        //         'qty' => $qty[$key],
        //         'rate' => $rate[$key],
        //         'rateType' => $rateType[$key],
        //         'amount' => $amount[$key],
        //     ]);
        // }

        // Deduct Product Stock
        // $sales = Sales::find($sale_id);
        // $product_id = $sales->customer->id;
        // $customer = Customer::find($customer_id);
       
        // $customer->balance = $chalan->nbalance;
        // $customer->delivery += $chalan->qty;
        // $customer->due -= $chalan->qty;
        // $customer->save();

        // // Retrieve the customer ID from the sales record
        // $customer_id = $sales->customer->id;
        // $customer = Customer::find($customer_id);
        // $customer->balance += $paidAmount;
        // $customer->advance += $totalQty;
        // $customer->due += $totalQty;
        // $customer->rate = $rate;
        // $customer->rateType = $rateType;
        // $customer->save();

       

        $payitem = $request->input('payitem');
        $pay_amount = $request->input('pay_amount');
     
        foreach ($payitem as $key => $value) {

            SalesPaymentItem::create([
                'bank_id' => $value,
                'sale_id' => $sale_id,
                'b_paid_amount' => $pay_amount[$key],
            ]);
        }
    
		// return redirect()->back();
        $notification = array(
			'message' => 'Sale Saved Successfully',
			'alert-type' => 'success'
		);

        return redirect()->back()->with($notification);

    }

    public function ManageSales (){

        $admin = Auth::guard('admin')->user();
        $sales = Sales::orderBy('id','DESC')->get();
		return view('admin.Backend.Sales.manage_sales',compact('sales','admin'));

    }

    public function DownloadSale ($id){
                    
        $sale = Sales::with('customer','user')->where('id',$id)->first();
    	$saleItem = SalesItem::with('product','sales')->where('sales_id',$id)->orderBy('id','ASC')->get();

		$pdf = PDF::loadView('admin.Backend.Sales.view_sales',compact('sale','saleItem'))->setPaper('a4')->setOptions([
				'tempDir' => public_path(),
				'chroot' => public_path(),
		]);
		return $pdf->download('Sale.pdf');
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

    public function getStock(Request $request)
    {
        $productId = $request->input('productId');
        $inventory = $request->input('inventory');

        // Fetch the product based on the productId
        $product = Product::findOrFail($productId);

        // Determine the stock based on the selected inventory
        $stock = ($inventory == 'qty') ? $product->qty : $product->stock_b;

        // Return the stock in JSON format
        return response()->json(['stock' => $stock]);
    }

    public function SaleDelete($id){
// CUSTOMER DUE CLEAR
        $sale = Sales::find($id);

        $customer = Customer::findOrFail($sale->customer_id);
        
        $saleDue = $sale->sale_due_amount;

        $customer->cusDue-=$saleDue;
        $customer->save();

// CAPITAL DEDUCTED CLEAR
        // $totalPaid = SalesPaymentItem::where('sale_id', $id)
        // ->groupBy('sale_id') // Group by the sale_id field
        // ->select(DB::raw('SUM(b_paid_amount) as total_amount')) // Calculate the sum of the amount field
        // ->first(); // Get the first result

        // $capital_banks = Bank::findOrFail(8);
        // $capital_banks->balance -= $totalPaid;
        // $capital_banks->save();

// COST PRICE
$totalCostPrice = SalesItem::join('products', 'sales_items.product_id', '=', 'products.id')
    ->select('sales_items.sales_id', DB::raw('SUM(products.cost_price * sales_items.qty) as total_cost_price'))
    ->groupBy('sales_items.sales_id')
    ->get();

// Find the specific sum for a given sales_id ($id)
$specificSaleTotal = $totalCostPrice->firstWhere('sales_id', $id);

        $capital_bank = Bank::findOrFail(5);
        $totalCost = $specificSaleTotal->total_cost_price;
        $capital_bank->balance -= $totalCost;
        $capital_bank->save();
     
// SALE DELETE
    	Sales::findOrFail($id)->delete();

        
    	$notification = array(
			'message' => 'Sale Deleted Successfully',
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
        $inventory = $request->input('inventory-select');
        // $rate = $request->input('cqnty');
        // $rateType = $request->input('rateType');
        $amount = $request->input('amount');

        foreach ($item as $key => $value) {

            // $matchProduct = Product::where('id',$value)->get();

            // $productIDs = $matchProduct->pluck('id')->toArray();
            
            // Calculate the deduction amount based on the selected inventory
            $deductionAmount = ($inventory[$key] == "qty") ? $qty[$key] : 0;
            $deductionAmountStockB = ($inventory[$key] == "stock_b") ? $qty[$key] : 0;
            
            
            if (!empty($qty[$key])) {
                
                ChalanItem::create([
                    'product_id' => $value,
                    'chalan_id' => $chalan_id,
                    'qty' => $qty[$key],
                    // 'rate' => $rate[$key],
                    // 'rateType' => $rateType[$key],
                    // 'amount' => $amount[$key],
                    'inventory' => $inventory[$key],

                ]);
                
                
                // Deduct the sold quantity from the product stock
                $product = Product::find($value);
                 // Deduct from the appropriate inventory
                $product->update([
                    'qty' => $product->qty - $deductionAmount,
                    'stock_b' => $product->stock_b - $deductionAmountStockB,
                ]);
                // $product->qty -= $qty[$key];
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

		   $sale = Sales::find($cid);

           $customer = Customer::findOrFail($sale->customer_id);
           
           $initialPaid = $sale->p_paid_amount;

           $customer->cusDue-=$initialPaid;
           $customer->save();

		   $sale->update([
			   'p_paid_amount' => $request->paidamount,
               'details' => $request->details,
			   'due_amount' => $request->dueamount,
			   'updated_at' => Carbon::now(),
		   ]);

         $notification = array(
            'message' => 'Sale Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    }// End Method 

    public function SalesFullPaid(Request $request, $id){

		   $sale = Sales::find($id);

           $customer = Customer::findOrFail($sale->customer_id);
           
           $due_amount = $sale->due_amount;

           $customer->cusDue-=$due_amount;
           $customer->save();


		   $sale->update([
			   'p_paid_amount' => $sale->grand_total,
			   'due_amount' => 0,
			   'updated_at' => Carbon::now(),
		   ]);

         $notification = array(
            'message' => 'Sale Fully Paid Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    }// End Method 

}
