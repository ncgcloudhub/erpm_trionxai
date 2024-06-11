@extends('admin.aDashboard')
@section('admins')

  {{-- TRIAL START --}}
  <div class="container-fluid">
	<div class="row">
	  <div class="col-lg-12 mb-lg-0 mb-4">
		<div class="card">
		  <div class="card-body p-3">
			<div class="row">
				
			<form class="insert-form" id="insert_form" method="post" action="{{ route('expense.update') }}">
			@csrf
			<div class="row">
				<div class="col">
					<div class="row mb-5">
						<div class="col-3"><label class="text-uppercase text-dark text-xs font-weight-bold">Date</label></div>
						<div class="col"><input class="form-control" value="{{$expense->date}}" type="date" id="date" name="date" required=""></div>
					</div>

					<div class="row mb-5">
						<div class="col-3"><label  class="text-uppercase text-dark text-xs font-weight-bold" for="mySelect">Employee</label></div>
						<div class="col">
						<select id="mySelect" name="employee_id" class="js-example-basic-single select2 form-control" required="">
							<option value="{{$expense->user_id}}" selected="">{{$expense->user->f_name}} {{$expense->user->l_name}}</option>
							@foreach($employees as $employee)
									 <option value="{{ $employee->id }}">{{ $employee->f_name }} {{ $employee->l_name }}</option>	
							@endforeach
							<!-- More options -->
							</select>
						</div>
						
					</div>

					<div class="row mb-5">
						<input hidden type="text" name="id" id="id" value="{{$expense->id}}">
						<div class="col-3"><label  class="text-uppercase text-dark text-xs font-weight-bold" for="mySelect1">Expense Type</label></div>
						<div class="col">
							<select id="mySelect1" name="expenseType" class="js-example-basic-single select2 form-control" required="">
							<option value="{{$expense->expenseType_id}}" selected="">{{$expense->expenseType->expenseType}}</option>
							
							@foreach($expenseTypes as $expenseType)
									 <option value="{{ $expenseType->id }}">{{ $expenseType->expenseType }}</option>	
							@endforeach
							<!-- More options -->
							</select>
						</div>
						</div>
	
						<div class="row mb-5">
							<div class="col-3"><label class="text-uppercase text-dark text-xs font-weight-bold">Amount</label></div>
							<div class="col"><input class="form-control" value="{{$expense->amount}}" type="number" id="amount" name="amount" required="">
						</div>	
						</div>

						<div class="row mb-5">
							<div class="col-3">
								<label class="text-uppercase text-dark text-xs font-weight-bold">Recurring Expense</label>
							</div>
							<div class="col form-check mb-3">
								<input class="form-check-input" type="radio" value="Daily" name="recurring_expense" id="customRadio1" {{ old('recurring_expense', $expense->recurring_expense) == 'Daily' ? 'checked' : '' }}>
								<label class="custom-control-label" for="customRadio1">Daily</label>
							</div>
							<div class="col form-check">
								<input class="form-check-input" type="radio" value="Weekly" name="recurring_expense" id="customRadio2" {{ old('recurring_expense', $expense->recurring_expense) == 'Weekly' ? 'checked' : '' }}>
								<label class="custom-control-label" for="customRadio2">Weekly</label>
							</div>
							<div class="col form-check">
								<input class="form-check-input" type="radio" value="Monthly" name="recurring_expense" id="customRadio3" {{ old('recurring_expense', $expense->recurring_expense) == 'Monthly' ? 'checked' : '' }}>
								<label class="custom-control-label" for="customRadio3">Monthly</label>
							</div>
							<div class="col">
								<button type="button" class="btn btn-secondary" onclick="clearRadio()">Clear</button>
							</div>
						</div>

						<div class="row mb-5">
							<div class="col-3"><label class="text-uppercase text-dark text-xs font-weight-bold">Merchant/Vendor</label></div>
							<div class="col"><input class="form-control" value="{{$expense->merchant_vendor}}" type="text" id="merchant_vendor" name="merchant_vendor">
							</div>	
						</div>

						<div class="row mb-5">
							<div class="col-3">
								<label class="text-uppercase text-dark text-xs font-weight-bold">Payment Method</label>
							</div>
							<div class="col">
								<select id="payment_method" name="payment_method" class="js-example-basic-single select2 form-control">
									<option value="credit-card" {{ old('payment_method', $expense->payment_method) == 'credit-card' ? 'selected' : '' }}>Credit Card</option>
									<option value="debit-card" {{ old('payment_method', $expense->payment_method) == 'debit-card' ? 'selected' : '' }}>Debit Card</option>
									<option value="paypal" {{ old('payment_method', $expense->payment_method) == 'paypal' ? 'selected' : '' }}>PayPal</option>
									<option value="bank-transfer" {{ old('payment_method', $expense->payment_method) == 'bank-transfer' ? 'selected' : '' }}>Bank Transfer</option>
									<option value="cash" {{ old('payment_method', $expense->payment_method) == 'cash' ? 'selected' : '' }}>Cash</option>
									<option value="check" {{ old('payment_method', $expense->payment_method) == 'check' ? 'selected' : '' }}>Check</option>
									<option value="mobile-payment" {{ old('payment_method', $expense->payment_method) == 'mobile-payment' ? 'selected' : '' }}>Mobile Payment</option>
									<option value="crypto" {{ old('payment_method', $expense->payment_method) == 'crypto' ? 'selected' : '' }}>Cryptocurrency</option>
									<option value="apple-pay" {{ old('payment_method', $expense->payment_method) == 'apple-pay' ? 'selected' : '' }}>Apple Pay</option>
									<option value="google-pay" {{ old('payment_method', $expense->payment_method) == 'google-pay' ? 'selected' : '' }}>Google Pay</option>
								</select>
							</div>
						</div>

	
				</div>
				<div class="col">
				
					<div class="row mb-5">
						<div class="col-3">
							<label for="receipt">Receipt</label>
						</div>
						<div class="col">
							@if(!empty($expense->receipt))
								<a href="{{ asset($expense->receipt) }}" download>Download Receipt</a>
							@else
								<p>No receipt</p>
							@endif
						</div>
					</div>
					
				
					<div class="row mb-5">
						<div class="col-3"> <label for="details">Details</label></div>
						<div class="col"><textarea class="form-control" name="details" id="details" rows="4">{{$expense->details}}</textarea></div>
					</div>

					<div class="row mb-5">
						<div class="col-3"> <label class="text-uppercase text-dark text-xs font-weight-bold">Location</label></div>
						<div class="col"><select id="location" name="location" class="js-example-basic-single form-control">
							<option value="{{$expense->location}}">{{$expense->location}}</option>
							<option value="Factory">Factory</option>
							<option value="Head Office">Head Office</option>
							<!-- More options -->
							</select></div>
					</div>

					<div class="row mb-5">
						<div class="col-3">
							<label class="text-uppercase text-dark text-xs font-weight-bold">Tax Information</label>
						</div>
						<div class="col">
							<input class="form-control" type="text" id="tax_information" name="tax_information" value="{{ old('tax_information', $expense->tax_information) }}">
						</div>
					</div>
					
					<div class="row mb-5">
						<div class="col-3">
							<label class="text-uppercase text-dark text-xs font-weight-bold">Refundable</label>
						</div>
						<div class="col form-check">
							<input class="form-check-input" type="checkbox" name="refundable" value="Yes" id="fcustomCheck1" {{ old('refundable', $expense->refundable) == 'Yes' ? 'checked' : '' }}>
							<label class="custom-control-label" for="customCheck1">Yes</label>
						</div>
					</div>
					
					<div class="row mb-5">
						<div class="col-3">
							<label for="details">Notes</label>
						</div>
						<div class="col">
							<textarea class="form-control" name="notes" id="notes" rows="2">{{ old('notes', $expense->notes) }}</textarea>
						</div>
					</div>

					<div class="row mb-5">
						<div class="col-3">
							<label for="attachment">Attachment</label>
						</div>
						<div class="col">
							@if(!empty($expense->attachment))
								<a href="{{ asset($expense->attachment) }}" download>Download Attachment</a>
							@else
								<p>No attachments</p>
							@endif
						</div>
					</div>
					
					
					
					
			</div>

			<div class="row">
				<div class="col">
				<hr>
				<p>Pay From</p>
					<table class="table">
						<tr>
							<td>
							  <select id="bank_item" name="bank_item" class="form-control" required="" >
								  <option value="" selected="" disabled="">Select Account</option>
								  @foreach($banks as $payment)
									   <option value="{{ $payment->id }}">{{ $payment->ac_name }}</option>	
								  @endforeach
							  </select>	  
						  </td>
							<td><input class="form-control balance" type="number" id="balance" name="balance" readonly></td>
							<td><input class="form-control pay_from_amount" type="number" id="pay_from_amount" name="pay_from_amount" required=""></td>
							
					  </tr>
					</table>					 
				</div>
			</div>
			<br>

			<div class="container">
				<div class="row">
				  <div class="col">
				  </div>
				  <div class="col">
					<input type="submit" class="btn bg-gradient-primary w-100" value="Update & Approve Expense">
				  </div>
				  <div class="col">
				  </div>
				</div>
			  </div>
			
	  </form>
	</div>
</div>
</div>
</div>

</div>

@include('admin.body.footer')

{{-- TRIAL END --}}

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
 
  <script>
	function clearRadio() {
		const radios = document.getElementsByName('recurring_expense');
		radios.forEach(radio => {
			radio.checked = false;
		});
	}
	</script>

  <script>
	$("#bank_item").change(function() {
	  // get the selected option value
	  var selectedOption = $(this).val();
	
	  // make an AJAX request to the server
	  $.get('/get-balance', { option: selectedOption }, function(data) {
		// update the field with the response data
		$("#balance").val(data.balance);
		console.log(data);
	   
	  });
	});
	</script>

  <script>
	$(document).ready(function(){
	
		// var x =1;
	  $("#add").click(function(){
		$("#table_field").append(html);
	  });
	  $("#table_field").on('click', '#remove', function () {
    $(this).closest('tr').remove();
	totalPrice();
	duePrice();
	});

		// var x =1;
	  $("#addpay").click(function(){
		$("#table_fieldpayment").append(htmlpay);
	  });
	  $("#table_fieldpayment").on('click', '#payremove', function () {
    $(this).closest('tr').remove();
	totalPayment()
	duePrice();
	});

	$("#mySelect").change(function() {
      // get the selected option value
      var selectedOption = $(this).val();

      // make an AJAX request to the server
      $.get('/get-data', { option: selectedOption }, function(data) {
        // update the field with the response data
        $("#address").val(data.address);
		$("#phone").val(data.phone);
		console.log(data);
		$('.js-example-basic-single').select2();

      });
    });
	
	$("#table_field tbody").on("input", ".rate", function () {
                var rate = parseFloat($(this).val());
                var qnty = parseFloat($(this).closest("tr").find(".qnty").val());
                var total = $(this).closest("tr").find(".total");
                total.val(qnty * rate);
				totalPrice();
				duePrice();
            });
	$("#table_field tbody").on("input", ".qnty", function () {
		var qnty = parseFloat($(this).val());
		var rate = parseFloat($(this).closest("tr").find(".rate").val());
		var total = $(this).closest("tr").find(".total");
		total.val(rate * qnty);
		totalPrice();
		duePrice();
	});
	// $("#discount-percentage").on("input", ".dper", function () {
	// 	var discount_value = this.value;
	// 	var grandtotal = document.getElementById("grandtotal").value;
	// 	var discount = grandtotal - (discount_value / 100) * grandtotal;
	// 	$("#grandtotal").val(discount);
	// 	console.log(discount);
	// });

	$("#table_fieldpayment tbody").on("input", ".pay_amount", function () {
                // var amount = parseFloat($(this).val());
                // var qnty = parseFloat($(this).closest("tr").find(".qnty").val());
                // var total = $(this).closest("tr").find(".total");
                // total.val(qnty * rate);
				// totalPrice();
				totalPayment();
				duePrice();

	      });

		  function duePrice(){
			$("#paidamount").val($("#sumPayment").val());
			$("#dueamount").val(($("#grandtotal").val()) - ($("#sumPayment").val()));
		  }

	function totalPrice(){
		var sum = 0;
	
		$(".total").each(function(){
		sum += parseFloat($(this).val());
		});
		$("#grandtotal").val(sum);
		$("#subtotal").val(sum);	
	}

	function totalPayment(){
		var sum = 0;
	
		$(".pay_amount").each(function(){
		sum += parseFloat($(this).val());
		});

		$("#sumPayment").val(sum);
	}
	
	document.querySelector('#discount-percentage').addEventListener('input', function() {
		$("#discount-flat").val("");
 		var discount_value = this.value;
		var grandtotal = document.getElementById("subtotal").value;
		var discount = grandtotal - (discount_value / 100) * grandtotal;
		$("#grandtotal").val(discount);
		duePrice();
		console.log(discount);
  // Now you can use the inputValue variable to access the value of the input element
	});
	document.querySelector('#discount-flat').addEventListener('input', function() {
		$("#discount-percentage").val("");
 		var discount_value = this.value;
		var grandtotal = document.getElementById("subtotal").value;
		var discount = grandtotal - discount_value;
		$("#grandtotal").val(discount);
		console.log(discount);
		duePrice();
  // Now you can use the inputValue variable to access the value of the input element
	});

	document.querySelector('#vat-percentage').addEventListener('input', function() {
 		var vat_value = this.value;
		var grandtotal = document.getElementById("subtotal").value;
		var vat = ((vat_value / 100) * grandtotal) + parseInt(grandtotal);
		$("#grandtotal").val(vat);
		console.log(vat);
  // Now you can use the inputValue variable to access the value of the input element
	});

	$("#mySelect").change(function() {
      // get the selected option value
      var selectedOption = $(this).val();

      // make an AJAX request to the server
      $.get('/get-data', { option: selectedOption }, function(data) {
        // update the field with the response data
        $("#address").val(data.address);
		$("#phone").val(data.phone);
		console.log(data);
      });
    });

	$("#item").change(function() {
      // get the selected option value
      var selectedOption = $(this).val();
		// console.log('hello');
      // make an AJAX request to the server
      $.get('/get-data-product', { option: selectedOption }, function(data) {
        // update the field with the response data
        $("#stock").val(data.qty);
      });
    });

	$("#table_field tbody").on("change", "select[name='item[]']", function () {
		var product_id = $(this).val();
		var stock = $(this).closest("tr").find(".stock");
		$.get('/get-data-product', { option: product_id }, function(data) {
        // update the field with the response data
		console.log('Hello');
		if(data.qty == null){
			stock.val(0);
		}else{
			stock.val(data.qty);
		}
			
      });
		// price.val(product_id);
               
    });

	document.querySelector('#paidamount').addEventListener('input', function() {
		$("#dueamount").val("");
 		var paidamount = this.value;
		var grandtotal = document.getElementById("grandtotal").value;
		var duetotal = grandtotal - paidamount;
		$("#dueamount").val(duetotal);
  // Now you can use the inputValue variable to access the value of the input element
	});
	

	// $("select[name='item[]']").each(function() {
	// 	var selectedOption = $(this).val();
	// 	console.log('hello');
		
	// });

	});
</script>

<script>
	$(document).ready(function() {
    $('.select2').select2({
        placeholder: 'Select an option',
        allowClear: true
    });
});
</script>

@endsection