<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Expense;
use App\Models\ExpenseType;
use App\Models\PaymentItem;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\ShipExpense;
use App\Models\ShipExpenseType;
use App\Models\SulphurStock;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function PurchaseAdd() 
    { 
        $suppliers = Supplier::orderBy('vendor_name','ASC')->get();
       
        return view('admin.Backend.Purchase.purchase_form', compact('suppliers'));
    }

    public function PurchaseStore(Request $request)
    {
       
        $purchased_id = Purchase::insertGetId([
            'vendor_id' => $request->vendor_id,
           
            'purchase_date' => $request->purchase_date,
            'expiration_date' => $request->expiration_date,
            
            'details' => $request->details,
           
            'created_at' => Carbon::now(),   
  
        ]);

    
		// return redirect()->back();
        $notification = array(
			'message' => 'Vendor Purchased Successfully',
			'alert-type' => 'success'
		);

        return redirect()->back()->with($notification);

    }

    public function PurchaseView($id){
        $vendors = Supplier::latest()->get();
		
		$purchase = Purchase::findOrFail($id);
		return view('admin.Backend.Purchase.purchase_view' ,compact('vendors','purchase'));
	}

    public function PurchaseManage(){
		$purchase = Purchase::orderBy('id','ASC')->get();
		return view('admin.Backend.Purchase.purchase_manage' ,compact('purchase'));
	}

    public function PurchaseEdit($id) 
    { 
        $vendors = Supplier::latest()->get();
		
		$purchase = Purchase::findOrFail($id);
       
        return view('admin.Backend.Purchase.purchase_edit', compact('vendors','purchase'));
    }



    public function PurchaseUpdate(Request $request){
			
		$id = $request->id;
	
		Purchase::findOrFail($id)->update([
            'vendor_id' => $request->vendor_id,
           
            'purchase_date' => $request->purchase_date,
            'expiration_date' => $request->expiration_date,
            
            'details' => $request->details,
			'updated_at' => Carbon::now(), 
	
			]);
	
			$notification = array(
				'message' => 'Purchase Updated Successfully',
				'alert-type' => 'info'
			);
	
			return redirect()->route('purchase.manage')->with($notification);
	
			 // end else 
			
		} // end method 


        public function PurchaseDelete($id){
		
            Purchase::findOrFail($id)->delete();
    
            $notification = array(
                'message' => 'Purchase Delectd Successfully',
                'alert-type' => 'info'
            );
    
            return redirect()->back()->with($notification);
    
        } // end method











    public function PurchaseLCOpened (){
       
        $purchases = Purchase::where('status','L/C Opened')->get();
		return view('admin.Backend.Purchase.lcopened_purchase',compact('purchases'));

    }

    public function PurchaseReachedPort (){
       
        $purchases = Purchase::where('status','Reached Port')->get();
		return view('admin.Backend.Purchase.reachedport_purchase',compact('purchases'));

    }

    
    public function PurchaseReachedFactory (){
       
        $purchases = Purchase::where('status','Reached Factory')->get();
		return view('admin.Backend.Purchase.reachedfactory_purchase',compact('purchases'));

    }

    	// Quotation View 
	    public function PurchaseDetails($purchase_id){

            $purchase = Purchase::findOrFail($purchase_id);
            $purchaseItems = PurchaseItem::where('purchase_id',$purchase_id)->get();
            $paymentItems = PaymentItem::where('purchase_id',$purchase_id)->get();
            $banks = Bank::orderBy('bank_name','ASC')->get();
            $suppliers = Supplier::orderBy('supplier_name','ASC')->get();
            $products = Product::orderBy('product_name','ASC')->get();
            // $supplier = Supplier::orderBy('supplier_name','ASC')->get();
            // $products = Product::orderBy('product_name','ASC')->get();

            return view('admin.Backend.Purchase.purchase_details',compact('purchase','purchaseItems','paymentItems','banks','suppliers','products'));

	} // end method 


    public function StatusChangePort($id){
        
        $find = Purchase::findOrFail($id);
        
        if($find->status == 'L/C Opened'){
            Purchase::findOrFail($id)->update(['status' => 'Reached Port']);

            $notification = array(
                'message' => 'Status Changed to Reached Port',
                'alert-type' => 'info'
            );
        }
        else{
            $notification = array(
                'message' => 'Status Already Reached Port',
                'alert-type' => 'info'
            );
        }

        return redirect()->back()->with($notification);

    } // end method 


    // Stock Update & Change Status
    public function StatusChangeFactory($id,$inventory){
        
        // dd($inventory);
        $find = Purchase::findOrFail($id);
        
        if($find->status == 'Reached Port'){
       
            foreach ($find->purchaseItems as $purchaseItem) {
                $productItem = $purchaseItem->product;
                
                if($inventory == 'qty'){
                    $productItem->qty += $purchaseItem->qty;
                   
                }elseif($inventory == 'stock_b'){ 
                $productItem->stock_b += $purchaseItem->qty;
            }
                $productItem->save(); 
            }

            Purchase::findOrFail($id)->update(['status' => 'Reached Factory']);

            $notification = array(
                'message' => 'Status Changed to Reached Factory',
                'alert-type' => 'info'
            );

        }
        else{
            $notification = array(
                'message' => 'Status Already Reached Factory',
                'alert-type' => 'info'
            );
        }

        return redirect()->back()->with($notification);

    } // end method 



    public function AdminInvoiceDownload($quotation_id){

		$quotation = Quotation::with('customer','auth')->where('id',$quotation_id)->first();
    	$quotationItem = QuotationItem::with('product','quotation')->where('quotation_id',$quotation_id)->orderBy('id','DESC')->get();

		$pdf = PDF::loadView('admin.Backend.Quotation.quotation_invoice',compact('quotation','quotationItem'))->setPaper('a4')->setOptions([
				'tempDir' => public_path(),
				'chroot' => public_path(),
		]);
		return $pdf->download('Quotation.pdf');

	} // end method 

    public function getData(Request $request){

        $selectedOption = $request->input('option');
        $data = Customer::findOrFail($selectedOption);
    
        return $data;
    
        }
    
        
        public function getDataProduct(Request $request){
    
            $selectedOption = $request->input('option');
            $data = Product::findOrFail($selectedOption);
        
            return $data;
        
        }
    
        public function getProductStock(Request $request){
    
            $selectedOption = $request->input('option');
            $data = Product::findOrFail($selectedOption);

            return $data;
        
        }
}
