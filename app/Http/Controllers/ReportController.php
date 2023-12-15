<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Conveyance;
use App\Models\Employee;
use App\Models\Expense;
use App\Models\ExpenseType;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Requisition;
use App\Models\Sales;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function ReportsForm (){
        $employees = Employee::orderBy('f_name','ASC')->get();
        $expenseTypes = ExpenseType::orderBy('expenseType','ASC')->get();
        $admins =  Admin::orderBy('name','ASC')->get();
        return view('admin.Backend.Report.reportForm', compact('employees','expenseTypes','admins'));
    }

    public function ReportFilter(Request $request){

        $option = $request->option;
        $sdate = $request->sdate;
		$edate = $request->edate;
		
        if($option == "expense"){
            $filtered = Expense::whereBetween('date', [$sdate, $edate])->get();
        }elseif($option == "requisition"){
            $filtered = Requisition::whereBetween('date', [$sdate, $edate])->get();
        }elseif($option == "L/C"){
            $filtered = Purchase::whereBetween('purchase_date', [$sdate, $edate])
            ->get();
        }elseif($option == "sale"){
            $filtered = Sales::whereBetween('sale_date', [$sdate, $edate])
            ->get();
        }else{
            $filtered = Expense::whereBetween('date', [$sdate, $edate])->get();
        }

       $notification = array(
			'message' => 'Filterd Data Successfully',
			'alert-type' => 'success'
		);

	return view('admin.Backend.Report.filteredData' ,compact('filtered','option','sdate','edate'));

    } 

// Department Wise 

public function ReportDepartmentFilter(Request $request){

    $option = $request->option;
    $doption = $request->doption;
    $sdate = $request->sdate;
    $edate = $request->edate;
    $admin = Admin::where('type', $doption)->pluck('id');

    // $admin = Admin::where('type', $doption)->get();

  

    if($option == "sale"){
        $filtered = Sales::whereBetween('sale_date', [$sdate, $edate])->whereIn('user_id', $admin)
        ->get();
        // dd($filtered);
    }elseif($option == "conveyance"){
        $filtered = Conveyance::whereBetween('date', [$sdate, $edate])->whereIn('user_id', $admin)
        ->get();
    }else{
        $filtered = Expense::whereBetween('date', [$sdate, $edate])->get();
    }

    // dd($doption);

   $notification = array(
        'message' => 'Filterd Department Wise Data Successfully',
        'alert-type' => 'success'
    );

return view('admin.Backend.Report.filteredData' ,compact('filtered','option','sdate','edate','doption'));

} 
// END Depertment Wise

public function ReportEmployeeExpenseFilter(Request $request){

    $option = $request->option;
    $doption = $request->doption;
    $sdate = $request->sdate;
    $edate = $request->edate;
    
    $admin = Admin::where('type', $doption)->pluck('id');

    // $admin = Admin::where('type', $doption)->get();

  

    if($option == "sale"){
        $filtered = Sales::whereBetween('sale_date', [$sdate, $edate])->whereIn('user_id', $admin)
        ->get();
        // dd($filtered);
    }elseif($option == "conveyance"){
        $filtered = Conveyance::whereBetween('date', [$sdate, $edate])->whereIn('user_id', $admin)
        ->get();
    }else{
        $filtered = Expense::whereBetween('date', [$sdate, $edate])->get();
    }

    // dd($doption);

   $notification = array(
        'message' => 'Filterd Department Wise Data Successfully',
        'alert-type' => 'success'
    );

return view('admin.Backend.Report.filteredData' ,compact('filtered','option','sdate','edate','doption'));

} 
// END Employee Expense Wise


public function ReportEmployeeSaleFilter(Request $request){
// dd($request);
    $option = 'sale';
    $doption = $request->option;
    // $doption = $request->doption;
    $sdate = $request->sdate;
    $edate = $request->edate;
    
    $admin = Admin::where('id', $doption)->pluck('id');

    // $admin = Admin::where('type', $doption)->get();

    // if($option == "sale"){
        $filtered = Sales::whereBetween('sale_date', [$sdate, $edate])->whereIn('user_id', $admin)
        ->get();
        // dd($filtered);
    // }
    // elseif($option == "conveyance"){
    //     $filtered = Conveyance::whereBetween('date', [$sdate, $edate])->whereIn('user_id', $admin)
    //     ->get();
    // }else{
    //     $filtered = Expense::whereBetween('date', [$sdate, $edate])->get();
    // }

    // dd($doption);

   $notification = array(
        'message' => 'Filterd Sale Employee Wise Data Successfully',
        'alert-type' => 'success'
    );

return view('admin.Backend.Report.filteredData' ,compact('filtered','option','sdate','edate'));

} 
// END Employee Sale Wise


	public function DownloadPDF(Request $request)
    {	
        $sdate = $request->sdate;
		$edate = $request->edate;
        $option = $request->input('soption');
        // $doption = $request->input('doption');
        
        // dd($option);
        if($option == "expense"){
            $filter = collect(json_decode($request->input('filter'), true))->mapInto(Expense::class);
             if ($request->type === 'pdf') {
            $pdf = new Dompdf();
            $pdf->loadHTML(view('admin.Backend.Report.download_expense_report_pdf',compact('sdate','edate'), ['filter' => $filter])->render());
            $pdf->setPaper('A4', 'landscape');
            $pdf->render();
            $pdf->stream('Expense-Report-' . $sdate . ') - (' . $edate . '.pdf');
            }
        }elseif($option == "requisition"){
            $filter = collect(json_decode($request->input('filter'), true))->mapInto(Requisition::class);
            if ($request->type === 'pdf') {
           $pdf = new Dompdf();
           $pdf->loadHTML(view('admin.Backend.Report.download_requisition_report_pdf',compact('sdate','edate'), ['filter' => $filter])->render());
           $pdf->setPaper('A4', 'landscape');
           $pdf->render();
           $pdf->stream('Requisition-Report(' . $sdate . ') - ('. $edate . ').pdf');
           }
        }elseif($option == "L/C"){
            $filter = collect(json_decode($request->input('filter'), true))->mapInto(Purchase::class);
            if ($request->type === 'pdf') {
           $pdf = new Dompdf();
           $pdf->loadHTML(view('admin.Backend.Report.download_l_c_report_pdf',compact('sdate','edate'), ['filter' => $filter])->render());
           $pdf->setPaper('A4', 'landscape');
           $pdf->render();
           $pdf->stream('L-C-Report(' . $sdate . ') - (' . $edate . ').pdf');
           }
        }
        elseif($option == "conveyance"){
            $filter = collect(json_decode($request->input('filter'), true))
            ->mapInto(Conveyance::class);
            
            if ($request->type === 'pdf') {
           $pdf = new Dompdf();
           $pdf->loadHTML(view('admin.Backend.Report.download_conveyance_report_pdf',compact('sdate','edate'), ['filter' => $filter])->render());
           $pdf->setPaper('A4', 'landscape');
           $pdf->render();
           $pdf->stream('conveyance-Report(' . $sdate . ') - (' . $edate . ').pdf');
           }
        }
        elseif($option == "sale"){
            $filter = collect(json_decode($request->input('filter'), true))
            ->mapInto(Sales::class)
            ->each(function ($sale) {
                $sale->load('saleItems');
            });
            if ($request->type === 'pdf') {
           $pdf = new Dompdf();
           $pdf->loadHTML(view('admin.Backend.Report.download_sale_report_pdf',compact('sdate','edate'), ['filter' => $filter])->render());
           $pdf->setPaper('A4', 'landscape');
           $pdf->render();
           $pdf->stream('Sale-Report(' . $sdate . ') - (' . $edate . ').pdf');
           }
        }

		
    }
}
