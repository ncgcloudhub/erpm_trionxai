<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Chalan;
use App\Models\ChalanItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Sales;
use App\Models\SalesItem;
use App\Models\Customer;
use App\Models\Preturn;
use App\Models\SalesPaymentItem;
use App\Models\Product;
use App\Models\ReturnProduct;
use App\Models\ReturnProductItem;

class ReturnController extends Controller
{
    public function ReturnManage (){

        $admin = Auth::guard('admin')->user();
        $chalans = Chalan::orderBy('id','DESC')->get();
		return view('admin.Backend.Return.manage_returns',compact('chalans','admin'));

    }

    public function MakeReturn($id){

        $chalan = Chalan::findOrFail($id);
        $chalanItem = ChalanItem::where('chalan_id',$id)->get();
        $customers = Customer::orderBy('customer_name','ASC')->get();
        $products = Product::orderBy('product_name','ASC')->get();

        // dd($paysaleItem);

        return view('admin.Backend.Return.returned_details',compact('chalan','customers','products','chalanItem'));

} // end method 

  // RETURN STORE
  public function ReturnStore(Request $request)
  {

    // dd($request);
      $admin = Auth::guard('admin')->user();

      $return_id = ReturnProduct::insertGetId([
          'customer_id' => $request->customer_id,
          'return_date' => $request->returnDate,
          'details' => $request->details,
          // 'sub_total' => $request->subtotal,
          'return_number' => 'STAR'.date('Y').mt_rand(10000, 99999),
          // 'grand_total' => $request->grandtotal,
          // 'discount_flat' => $request->dflat,
          // 'discount_per' => $request->dper,
          // 'total_vat' => $request->vper,
          'user_id' => $admin->id,
          'chalan_id' => $request->chalan_id,
          // 'p_paid_amount' => $request->paidamount,
          // 'due_amount' => $request->dueamount,
          'created_at' => Carbon::now(),   

      ]);

      
      $item = $request->input('item');
    //   $stock = $request->input('stock');
      // $batch = $request->input('batch');
      $qty = $request->input('qnty');
      $rqty = $request->input('rqnty');
      // $rate = $request->input('cqnty');
      // $rateType = $request->input('rateType');
    
      foreach ($item as $key => $value) {

          // $matchProduct = Product::where('id',$value)->get();

          // $productIDs = $matchProduct->pluck('id')->toArray();
          
          if (!empty($rqty[$key])) {
              
              ReturnProductItem::create([
                  'product_id' => $value,
                  'return_id' => $return_id,
                  'sold_qty' => $qty[$key],
                  'qty' => $rqty[$key],
                  // 'rate' => $rate[$key],
                  // 'rateType' => $rateType[$key],
                  // 'amount' => $amount[$key],
              ]);

              // Deduct the sold quantity from the product stock
              $product = Product::find($value);
              if ($request->input('inventory-select')[$key] == 'qty') {
                // Your logic when inventory-select is 'qty'
                $product->qty += $request->input('rqnty')[$key];
            } else if ($request->input('inventory-select')[$key] == 'stock_b') {
                // Your logic when inventory-select is 'stock_b'
                // Update 'stock_b' value
                // For example, you might have a 'stock_b' field in your 'Product' model
                $product->stock_b += $request->input('rqnty')[$key];
            }
            //   $product->qty += $rqty[$key];
              $product->save();
          }           
      }   

      // return redirect()->back();
      $notification = array(
          'message' => 'Returned Successfully',
          'alert-type' => 'success'
      );

      return redirect()->back()->with($notification);

  }
  // END RETURN STORE

  public function ReturnedManage (){

    $admin = Auth::guard('admin')->user();
    $returned = ReturnProduct::orderBy('id','DESC')->get();
    return view('admin.Backend.Return.manage_returned',compact('returned','admin'));

}

public function ReturnedDetails($id){

    $return = ReturnProduct::findOrFail($id);
    $returnItem = ReturnProductItem::where('return_id',$id)->get();
    $customers = Customer::orderBy('customer_name','ASC')->get();
    $products = Product::orderBy('product_name','ASC')->get();

    // dd($paysaleItem);

    return view('admin.Backend.Return.make_return_details',compact('return','customers','products','returnItem'));

} // end method 


}
