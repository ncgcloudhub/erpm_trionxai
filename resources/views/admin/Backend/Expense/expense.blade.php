@extends('admin.aDashboard')
@section('admins')

  {{-- TRIAL START --}}
  <div class="container-fluid">
	<div class="row">
	  <div class="col-lg-12 mb-lg-0 mb-4">
		<div class="card">
		  <div class="card-body p-3">
			<div class="row">
				
			<form class="insert-form" id="insert_form" method="post" action="{{ route('expense.store') }}" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col">

					<div class="row mb-5">
						<div class="col-3"><label class="text-uppercase text-dark text-xs font-weight-bold">Date</label><span class="text-danger">*</span></div>
						<div class="col"><input class="form-control" type="date" id="date" name="date" required=""></div>
					</div>

					<div class="row mb-5">
						<div class="col-3"><label  class="text-uppercase text-dark text-xs font-weight-bold" for="mySelect">Employee</label><span class="text-danger">*</span></div>
						<div class="col">
						<select id="mySelect" name="employee_id" class="js-example-basic-single select2 form-control" required="">
							<option value="" selected="" disabled="">Select Customer</option>
							@foreach($employees as $employee)
									 <option value="{{ $employee->id }}">{{ $employee->f_name }} {{ $employee->l_name }}</option>	
							@endforeach
							<!-- More options -->
							</select>
						</div>
					</div>

					<div class="row mb-5">
						<div class="col-3"><label  class="text-uppercase text-dark text-xs font-weight-bold" for="mySelect1">Expense Type</label><span class="text-danger">*</span></div>
						<div class="col">
							<select id="mySelect1" name="expenseType" class="js-example-basic-single select2 form-control" required="">
							<option value="" selected="" disabled="">Select Expense Type</option>
							@foreach($expenseTypes as $expenseType)
									 <option value="{{ $expenseType->id }}">{{ $expenseType->expenseType }}</option>	
							@endforeach
							<!-- More options -->
							</select>
						</div>
					</div>
	
					<div class="row mb-5">
							<div class="col-3"><label class="text-uppercase text-dark text-xs font-weight-bold">Amount</label><span class="text-danger">*</span></div>
							<div class="col"><input class="form-control" type="number" id="amount" name="amount" required="">
							</div>	
					</div>

					<div class="row mb-5">
							<div class="col-3"><label class="text-uppercase text-dark text-xs font-weight-bold">Recurring Expense</label></div>
							<div class="col form-check mb-3">
								<input class="form-check-input" type="radio" value="Daily" name="recurring_expense" id="customRadio1">
								<label class="custom-control-label" for="customRadio1">Daily</label>
							</div>
							<div class="col form-check">
								<input class="form-check-input" type="radio" value="Weekly" name="recurring_expense" id="customRadio2">
								<label class="custom-control-label" for="customRadio2">Weekly</label>
							</div>
							<div class="col form-check">
								<input class="form-check-input" type="radio" value="Monthly" name="recurring_expense" id="customRadio3">
								<label class="custom-control-label" for="customRadio2">Monthly</label>
							</div>
							<div class="col">
								<button type="button" class="btn btn-secondary" onclick="clearRadio()">Clear</button>
							</div>
					</div>

					<div class="row mb-5">
							<div class="col-3"><label class="text-uppercase text-dark text-xs font-weight-bold">Merchant/Vendor</label></div>
							<div class="col"><input class="form-control" type="text" id="merchant_vendor" name="merchant_vendor">
							</div>	
					</div>
						

					<div class="row mb-5">
							<div class="col-3">
								<label class="text-uppercase text-dark text-xs font-weight-bold">Payment Method</label>
							</div>
							<div class="col">
								<select id="payment_method" name="payment_method" class="js-example-basic-single select2 form-control">
									<option value="credit-card">Credit Card</option>
									<option value="debit-card">Debit Card</option>
									<option value="paypal">PayPal</option>
									<option value="bank-transfer">Bank Transfer</option>
									<option value="cash">Cash</option>
									<option value="check">Check</option>
									<option value="mobile-payment">Mobile Payment</option>
									<option value="crypto">Cryptocurrency</option>
									<option value="apple-pay">Apple Pay</option>
									<option value="google-pay">Google Pay</option>
								</select>
							</div>
					</div>
				</div>

				<div class="col">
				
					<div class="row mb-5">
						<div class="col-3"><label for="receipt">Attach Receipt</label></div>
						<div class="col"><input type="file" class="form-control" name="receipt" id="receipt"></div>
					</div>

					<div class="row mb-5">
						<div class="col-3"> <label for="details">Details</label></div>
						<div class="col"><textarea class="form-control" name="details" id="details" rows="3"></textarea></div>
					</div>

					<div class="row mb-5">
						<div class="col-3">
							<label class="text-uppercase text-dark text-xs font-weight-bold">Location</label><span class="text-danger">*</span>
						</div>
						<div class="col">
							<select id="location" name="location" class="js-example-basic-single select2 form-control" required>
								<option value="" selected="" disabled="">Select Location</option>
								<option value="Bangladesh Office">Bangladesh Office</option>
								<option value="USA Office">USA Office</option>
								<!-- More options -->
							</select>
						</div>
					</div>
					

					<div class="row mb-5">
						<div class="col-3"><label class="text-uppercase text-dark text-xs font-weight-bold">Tax Information</label></div>
						<div class="col"><input class="form-control" type="text" id="tax_information" name="tax_information">
						</div>	
					</div>

					<div class="row mb-5">
						<div class="col-3"><label class="text-uppercase text-dark text-xs font-weight-bold">Refundable</label></div>
						<div class="col form-check">
							<input class="form-check-input" type="checkbox" name="refundable" value="Yes" id="fcustomCheck1" checked="">
							<label class="custom-control-label" for="customCheck1">Yes</label>
						  </div>
					</div>

					<div class="row mb-5">
						<div class="col-3"> <label for="details">Notes</label></div>
						<div class="col"><textarea class="form-control" name="notes" id="notes" rows="2"></textarea></div>
					</div>

					<div class="row mb-5">
						<div class="col-3"><label for="attachment">Attachment</label></div>
						<div class="col"><input type="file" class="form-control" name="attachment" id="attachment"></div>
					</div>
					
				</div>

				<div class="container">
					<div class="row">
						<div class="col"></div>
							<div class="col">
								<input type="submit" class="btn bg-gradient-primary w-100" value="Add Expense">
							</div>
						<div class="col"></div>
					</div>
				</div>
			</div>
			
	  		</form>
	</div>
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