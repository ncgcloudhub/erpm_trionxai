<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Employee;
use App\Models\Expense;
use App\Models\ExpenseType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
	public function ExpenseTypeView()
	{

		$expenseTypes = ExpenseType::latest()->get();
		return view('admin.Backend.Expense.expenseType', compact('expenseTypes'));
	}

	public function ExpenseTypeStore(Request $request)
	{
		ExpenseType::insert([
			'expenseType' => $request->expenseType,

			'created_at' => Carbon::now(),

		]);

		$notification = array(
			'message' => 'Expense Type Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
	} // end method 

	public function ExpenseTypeEdit($id)
	{

		$expenseTypes = ExpenseType::latest()->get();
		$expenseType = ExpenseType::findOrFail($id);

		return view('admin.Backend.Expense.expenseType_edit', compact('expenseTypes', 'expenseType'));
	}

	public function ExpenseTypeUpdate(Request $request)
	{

		ExpenseType::findOrFail($request->id)->update([
			'expenseType' => $request->expenseType,
			'updated_at' => Carbon::now(),
		]);

		$notification = array(
			'message' => 'Expense Type Updated Successfully',
			'alert-type' => 'success'
		);

		return redirect(route('expenseType.view'))->with($notification);
	}
	public function ExpenseTypeDelete($id)
	{

		ExpenseType::findOrFail($id)->delete();

		$notification = array(
			'message' => 'Expense Type Delectd Successfully',
			'alert-type' => 'info'
		);

		return redirect(route('expenseType.view'))->with($notification);
	} // end method






	public function ExpenseView()
	{
		$employees = Employee::orderBy('f_name', 'ASC')->get();
		$expenseTypes = ExpenseType::latest()->get();
		return view('admin.Backend.Expense.expense', compact('expenseTypes', 'employees'));
	}

	public function ExpenseEdit($id)
	{
		$expense = Expense::findOrFail($id);
		$employees = Employee::orderBy('f_name', 'ASC')->get();
		$expenseTypes = ExpenseType::latest()->get();
		$banks = Bank::orderBy('bank_name', 'ASC')->get();
		return view('admin.Backend.Expense.edit_expense', compact('expenseTypes', 'employees', 'expense', 'banks'));
	}

	public function ExpenseUpdate(Request $request)
	{

		// dd($request);
		$expense_id = $request->id;

		Expense::findOrFail($expense_id)->update([
			'expenseType_id' => $request->expenseType,
			'date' => $request->date,
			'amount' => $request->amount,
			'location' => $request->location,
			'details' => $request->details,
			'user_id' => $request->employee_id,
			'updated_at' => Carbon::now(),
		]);

		$cbank = Bank::findOrFail($request->bank_item);
		$pay_from_amount = $request->pay_from_amount;

		$cbank->balance -= $pay_from_amount;
		$cbank->save();

		$purchase_id_find = Expense::findOrFail($expense_id);
		$purchase_id_find->from_bank_id = $request->bank_item;
		$purchase_id_find->amount_from = $request->pay_from_amount;
		$purchase_id_find->save();

		$admin = Auth::guard('admin')->user()->id;
		Expense::findOrFail($expense_id)->update(['status' => "Approved", 'approved_by' => $admin]);

		$notification = array(
			'message' => 'Expense Updated Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
	} // end method 

	public function ExpenseStore(Request $request)
	{

		$admin = Auth::guard('admin')->user();

		// Handle file upload
		$receiptPath = null;
		if ($request->hasFile('receipt')) {
			$file = $request->file('receipt');
			$destinationPath = 'upload/expense/expense_receipt';
			$fileName = time() . '_' . $file->getClientOriginalName();
			$file->move(public_path($destinationPath), $fileName);
			$receiptPath = $destinationPath . '/' . $fileName;
		}

		// Handle file upload
		$attachmentPath = null;
		if ($request->hasFile('attachment')) {
			$file = $request->file('attachment');
			$destinationPath = 'upload/expense/expense_attachment';
			$fileName = time() . '_' . $file->getClientOriginalName();
			$file->move(public_path($destinationPath), $fileName);
			$attachmentPath = $destinationPath . '/' . $fileName;
		}

		// Insert the expense record
		Expense::insert([
			'date' => $request->date,
			'user_id' => $request->employee_id,
			'expenseType_id' => $request->expenseType,
			'amount' => $request->amount,
			'recurring_expense' => $request->recurring_expense,
			'merchant_vendor' => $request->merchant_vendor,
			'payment_method' => $request->payment_method,

			'receipt' => $receiptPath, // Store the file path in the database
			'details' => $request->details,
			'location' => $request->location,
			'tax_information' => $request->tax_information,
			'refundable' => $request->refundable,
			'notes' => $request->notes,
			'attachment' => $attachmentPath, // Store the file path in the database

			'made_by_id' => $admin->id,

			'created_at' => Carbon::now(),
		]);

		// Create the notification
		$notification = array(
			'message' => 'Expense Added Successfully',
			'alert-type' => 'success'
		);

		// Redirect back with notification
		return redirect()->back()->with($notification);
	}



	public function ExpenseManage()
	{

		$admin = Auth::guard('admin')->user();

		$match = Expense::where('user_id', $admin->id)->get();
		if ($admin->type == "1" || $admin->type == "2" || $admin->type == "3") {
			$expenses = Expense::orderBy('id', 'DESC')->get();
		} elseif ($match) {
			$expenses = Expense::where('made_by_id', $admin->id)->orderBy('id', 'DESC')->get();
		}
		return view('admin.Backend.Expense.manage_expense', compact('expenses', 'admin'));
	}

	public function ExpenseApprove($id)
	{

		$admin = Auth::guard('admin')->user()->id;
		Expense::findOrFail($id)->update(['status' => "Approved", 'approved_by' => $admin]);
		$notification = array(
			'message' => 'Expense Approved',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
	}
}
