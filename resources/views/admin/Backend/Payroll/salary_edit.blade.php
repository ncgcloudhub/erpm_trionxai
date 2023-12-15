@extends('admin.aDashboard')
@section('admins')

  {{-- TRIAL START --}}
  <div class="container-fluid">
	<div class="row">
	  <div class="col-lg-12 mb-lg-0 mb-4">
		<div class="card">
		  <div class="card-body p-3">
			<div class="row">
				
			<form class="insert-form" id="insert_form" method="post" action="{{ route('store.salary') }}">
			@csrf
			<div class="row">
				<div class="col">
					<div class="row mb-3">
						<div class="col-3"><label class="text-uppercase text-dark text-xs font-weight-bold">Date</label></div>
						<div class="col"><input class="form-control" type="date" id="date" name="date" required=""></div>
					</div>
					<div class="row mb-3">
						<div class="col-3"><label  class="text-uppercase text-dark text-xs font-weight-bold" for="mySelect">Employee</label></div>
						<div class="col">
							<input class="form-control" type="text" value="{{$employee->f_name}}" readonly>
						</div>
						<input type="hidden" name="employee_id" value="{{$employee->id}}">
						
						</div>
	
						<div class="row mb-3">
							<div class="col-3"><label class="text-uppercase text-dark text-xs font-weight-bold">Advance/Net Pay</label></div>
							<div class="col">
								<input class="form-control" value="{{$employee->advance}}" type="number" id="advance" name="advance" readonly>
							</div>	
							<div class="col">
								<input class="form-control" value="{{$employee->net_pay}}" type="number" id="net_pay" name="net_pay" readonly>
							</div>	
						</div>

				</div>
				<div class="col">
				
				
					<div class="row mb-2">
						<div class="col-3"> <label for="details">Details</label></div>
						<div class="col"><textarea class="form-control" name="details" id="details" rows="4"></textarea></div>
					</div>
					<div class="row mb-3">
						<div class="col-3"> <label class="text-uppercase text-dark text-xs font-weight-bold">Month/Year</label></div>
						<div class="col"><select name="month" id="month" class="form-control" required="">
							<option value="" selected>Select Month</option>
							<option value="January">January</option>
							<option value="February">February</option>
							<option value="April">April</option>
							<option value="May">May</option>
							<option value="June">June</option>
							<option value="July">July</option>
							<option value="August">August</option>
							<option value="September">September</option>
							<option value="October">October</option>
							<option value="November">November</option>
							<option value="December">December</option>
						</select></div>

						<div class="col"><select name="year" id="year" class="form-control" required="">
							<option value="" selected>Select Year</option>
							<option value="2023">2023</option>
							<option value="2024">2024</option>
							
						</select></div>
					</div>
					
			</div>

			<div class="row">
				<div class="col">
				<hr>
				<p>Pay From</p>
					<table class="table">
						<tr>
							<td>
							  <select id="bank_id" name="bank_id" class="form-control" required="" >
								  <option value="" selected="" disabled="">Select Account</option>
								  @foreach($banks as $payment)
									   <option value="{{ $payment->id }}">{{ $payment->ac_name }}</option>	
								  @endforeach
							  </select>	  
						  </td>
							
							<td><input class="form-control balance" type="number" id="balance" name="balance" readonly></td>
							<td>
								<select id="salary_type" name="salary_type" class="form-control" required="">
									<option value="" selected="" disabled="">Select Type</option>
									<option value="Advance">Advance</option>
									<option value="Salary">Salary</option>
								  
								</select>	  
							</td>
							<td><input class="form-control amount" type="number" id="amount" name="amount" required=""></td>
							
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
					<input type="submit" class="btn bg-gradient-primary w-100" value="Update & Approve Salary">
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
	$("#bank_id").change(function() {
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


{{-- <script>
    $("#salary_type").on("change", function() {
  var salaryType = parseFloat($(this).val());
  var showBalance = parseFloat($("#showBalance").val());
  var depositType = $("#deposit_type").val();

  // Check if the entered amount is valid
  if (!isNaN(enteredAmount)) {
    // If the deposit type is "loan," no need for balance check
    if (depositType === "loan") {
      // Amount is valid, no need for further action
      // You can provide visual feedback here if needed
    } else {
      // Check if the entered amount is less than or equal to the balance
      if (!isNaN(showBalance) && enteredAmount > showBalance) {
        // Amount exceeds the balance, show an error message
        alert("Amount exceeds available balance.");
        // Clear the input field
        $(this).val("");
      }
    }
  } else {
    // Invalid input, e.g., non-numeric input
    // You can clear the input or take other actions as needed
  }
});
  </script> --}}

@endsection