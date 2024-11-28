@extends('admin.aDashboard')
@section('admins')

  {{-- TRIAL START --}}
  <div class="container-fluid">
	<div class="row">
	  <div class="col-lg-12 mb-lg-0 mb-4">
		<div class="card">
		  <div class="card-body p-3">
			<div class="row">
				
			<form class="insert-form" id="insert_form" method="post" action="{{ route('sales.store') }}">
			@csrf
			<div class="row">
				<div class="col">
					<div class="row mb-3">
						<div class="col-3"><label  class="text-uppercase text-dark text-xs font-weight-bold" for="mySelect">Customer</label></div>
						<div class="col">
							<select id="mySelect" name="customer_id" class="js-example-basic-single select2 form-control" required="">
							<option value="" selected="" disabled="">Select Customer</option>
							@foreach($customers as $customer)
									 <option value="{{ $customer->id }}">{{ $customer->user_name }}</option>	
							@endforeach
							<!-- More options -->
							</select>
						</div>
						</div>
	
						<div class="row mb-3">
							<div class="col-3"><label class="text-uppercase text-dark text-xs font-weight-bold">Customer Id</label></div>
							<div class="col"><input class="form-control " type="text" id="address" name="address">
						</div>
							
						</div>
						
						<div class="row mb-3">
							<div class="col-3"><label class="text-uppercase text-dark text-xs font-weight-bold">Phone</label></div>
							<div class="col"><input class="form-control mb-3" type="text" id="phone" name="phone"></div>
							
						</div>
	
						{{-- <div class="row mb-3">
							<div class="col-2"><label>Address</label></div>
							<div class="col"><input class="form-control mb-3" type="text" id="address" name="address" readonly></div>
						</div> --}}
				</div>
				<div class="col">
					<div class="row mb-3">
						<div class="col-3"><label class="text-uppercase text-dark text-xs font-weight-bold">Sale Date</label></div>
						<div class="col"><input class="form-control" type="date" id="saleDate" name="saleDate" required=""></div>
					</div>
					{{-- <div class="row mb-3">
						<div class="col-2"><label>Details</label></div>
						<div class="col"><input class="form-control mb-3" type="text" id="details" name="details"></div>
					</div> --}}
					<div class="row mb-3">
						<div class="col-3"> <label class="text-uppercase text-dark text-xs font-weight-bold" for="details">Additional Info</label></div>
						<div class="col"><textarea class="form-control" name="details" id="details" rows="1"></textarea></div>
					</div>

					{{-- <div class="row mb-3">
						<div class="col-3"><label class="text-uppercase text-dark text-xs font-weight-bold">Previous Invoice</label></div>
						<div class="col"><input class="form-control mb-3" type="text" id="pInvoice" name="pInvoice">
							
			</div>
						
					</div> --}}
					{{-- <div class="row mb-3">
						<div class="col"><input class="form-control mb-3" type="hidden" id="auth_id" name="auth_id"  value="{{ Auth::id()}}">
					</div>
			
				</div> --}}
			</div>
			<div class="table-responsive">
				<table id="table_field" class="table align-items-center mb-0">
				<thead>
					  <tr>
						<th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Ticket Information</th>
						<th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Description</th>
					
						<th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Qty/Unit</th>
					
						<th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Rate</th>
						{{-- <th>Dis. Value</th>
						<th>Vat %</th>
						<th>VAT Value</th> --}}
						<th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Total</th>
						<th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Action</th>
					</tr>
				</thead>
					<tr>
						  {{-- <td>
							<select id="item" name="item[]" class="form-control" required="" >
								<option value="{{$acidProducts->id}}" selected="" disabled="">{{$acidProducts->product_name}}</option>
							</select>

						</td> --}}
						<td>
							<select id="item" name="item[]" class="js-example-basic-single select2 form-control" required="" >
								<option value="" selected="" disabled="">Select Course</option>
								@foreach($taxTaskProjects as $task)<option value="{{ $task->id }}">{{ $task->task_id }}({{ $task->customer->user_name }})</option>@endforeach
							</select>
						</td>
						  <td><input class="form-control descrip" type="text" id="descrip" name="descrip[]" required=""></td>
						  <td><input class="form-control qnty" type="number" id="qnty" name="qnty[]" required=""></td>
						  <td><input class="form-control rate" type="number" id="rate" name="rate[]" required=""></td>
						  <td><input class="form-control total" type="number" id="amount" name="amount[]" value="0" readonly></td>
						  <td>
							<a name="add" id="add" class="btn bg-gradient-dark mb-0"><i class="fas fa-plus" aria-hidden="true"></i></a>
							{{-- <i class="fa-solid fa-circle-plus display-4 text-success" type="button" name="add" id="add" ></i> --}}
						</td>
					</tr>
				</table>
				<hr>
					<div class="row">
					<div class="col">
					</div>

					<div class="col-4">
						<div class="row mb-2">
							<div class="col-4"><label  class="text-uppercase text-dark text-xs font-weight-bold">Sub Total</label></div>
							<div class="col"><span><input class="form-control" type="text" name="subtotal" id="subtotal" readonly></span>
							</div>
						</div>
						
						<div class="row mb-2">
							<div class="col-4"><label  class="text-uppercase text-dark text-xs font-weight-bold ">Discount(%)</label></div>
							<div class="col"><input class="dper form-control" type="number" id="discount-percentage" name="dper">
							</div>
						</div>
						{{-- <div class="row mb-2">
							<div class="col-4"><label  class="text-uppercase text-dark text-xs font-weight-bold ">VAT (%)</label></div>
							<div class="col"><input class="vper form-control" type="number" id="vat-percentage" name="vper" readonly>
							</div>
						</div> --}}
						<div class="row mb-2">
							<div class="col-4"><label  class="text-uppercase text-dark text-xs font-weight-bold ">Discount($)</label></div>
							<div class="col"><input class="dflat form-control" name="dflat" type="number" id="discount-flat">
							</div>
						</div>
						<div class="row mb-2">
							<div class="col-4"><label  class="text-uppercase text-dark text-xs font-weight-bold">Tax</label></div>
							<div class="col"><span><input class="form-control" type="text" name="tax" id="tax"></span>
							</div>
						</div>
						<div class="row mb-2">
							<div class="col-4"><label  class="text-uppercase text-dark text-xs font-weight-bold ">Grand Total</label></div>
							<div class="col"><input class="form-control" type="text" name="grandtotal" id="grandtotal" readonly>
							</div>
						</div>
						<div class="row mb-2">
							<div class="col-4"><label class="text-uppercase text-dark text-xs font-weight-bold ">Paid Amount</label></div>
							<div class="col"><input readonly class="form-control" type="number" name="paidamount" id="paidamount">
							</div>
						</div>
						{{-- <div class="row mb-2">
							<div class="col-4"><label class="text-uppercase text-dark text-xs font-weight-bold ">Prev Due Amount</label></div>
							<div class="col"><input class="form-control" type="text" name="pdueamount" id="pdueamount" readonly>
							</div>
						</div> --}}
						<div class="row mb-2">
							<div class="col-4"><label class="text-uppercase text-dark text-xs font-weight-bold ">Due Amount</label></div>
							<div class="col"><input class="form-control" type="text" name="dueamount" id="dueamount" readonly>
							</div>
						</div>

					
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div class="table-responsive">
							<table id="table_fieldpayment" class="table align-items-center mb-0">
							<thead>
							<tr>
							  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Payment Type</th>
							  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Paid Amount</th>
							  <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Action</th>
						  </tr>

							</thead>
						  <tr>
								<td>
								  <select id="payitem" name="payitem[]" class="form-control" required="" >
									  <option value="" selected="" disabled="">Select Payment</option>
									  @foreach($banks as $payment)
										   <option value="{{ $payment->id }}">{{ $payment->ac_name }}</option>	
									  @endforeach
								  </select>	  
							  </td>
								<td><input class="form-control pay_amount" type="number" id="pay_amount" name="pay_amount[]" required=""></td>
								<td><a name="addpay" id="addpay" class="btn bg-gradient-dark mb-0"><i class="fas fa-plus" aria-hidden="true"></i></a>
								</td>
								<input class="form-control sumPayment" type="text" name="sumPayment" id="sumPayment" hidden readonly>
						  </tr>
					  </table>
					</div>
					</div>
					<div class="col">				
					</div>
				</div>
				
				{{-- <input class="btn bg-gradient-dark mb-0" type="submit" name="save" id="save" value="
				Save Purchase"> --}}
			</div>
			<div class="container">
				<div class="row">
				  <div class="col">
				  </div>
				  <div class="col">
					<input type="submit" class="btn bg-gradient-primary w-100" value="Add Sale">
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

  {{-- <script>
	// Add a search field to the dropdown
	$("#mySearch").on("keyup", function() {
	  var value = $(this).val().toLowerCase();
	  $("#mySelect option").filter(function() {
		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	  });
	});
  </script> --}}
  
  <script>
	$(document).ready(function(){
		var html='<tr><td><select id="item" name="item[]" class="js-example-basic-single select2 form-control" required="" ><option value="" selected="" disabled="">Select Task</option>@foreach($taxTaskProjects as $task)<option value="{{ $task->id }}">{{ $task->task_id }}({{ $task->customer->user_name }})</option>@endforeach</select></td><td><input class="form-control descrip" type="text" id="descrip" name="descrip[]" required=""></td><td><input class="form-control qnty" type="number" id="qnty" name="qnty[]" required=""></td><td><input class="form-control rate" type="number" id="rate" name="rate[]" required=""></td><td><input class="form-control total" type="number" id="amount" name="amount[]" value="0" readonly></td><td><a name="remove" id="remove" class="btn bg-gradient-danger mb-0"><i class="fas fa-minus" aria-hidden="true"></i></a></td></tr>';
	
		// var x =1;
	  $("#add").click(function(){
		$("#table_field").append(html);
		$('.js-example-basic-single').select2();
	  });
	  $("#table_field").on('click', '#remove', function () {
    $(this).closest('tr').remove();
	$('.js-example-basic-single').select2();
	totalPrice();
	duePrice();
	});

	var htmlpay='<tr><td><select id="payitem" name="payitem[]" class="form-control" required="" ><option value="" selected="" disabled="">Select Payment</option>@foreach($banks as $payment)<option value="{{ $payment->id }}">{{ $payment->ac_name }}</option>@endforeach</select></td><td><input class="form-control pay_amount" type="number" id="pay_amount" name="pay_amount[]" required=""></td><td><a name="payremove" id="payremove" class="btn bg-gradient-danger mb-0"><i class="fas fa-minus" aria-hidden="true"></i></a></td></tr>';

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
        $("#address").val(data.customer_id);
		$("#phone").val(data.personal_phone);
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

function updateGrandTotal() {
    var subtotal = parseFloat(document.getElementById("subtotal").value) || 0;
    var discountPercentage = parseFloat(document.getElementById("discount-percentage").value) || 0;
    var discountFlat = parseFloat(document.getElementById("discount-flat").value) || 0;
    var taxPercentage = parseFloat(document.getElementById("tax").value) || 0;

    // Step 1: Calculate the discounted total
    var discount = discountPercentage > 0 ? (discountPercentage / 100) * subtotal : discountFlat;
    var discountedTotal = subtotal - discount;

    // Step 2: Calculate the tax on the discounted total
    var taxAmount = (taxPercentage / 100) * discountedTotal;

    // Step 3: Calculate the grand total
    var grandTotal = discountedTotal + taxAmount;

    // Update the grand total in the field
    $("#grandtotal").val(grandTotal.toFixed(2));

    // Update due amount
    duePrice();

}

		  // Event listener for tax percentage
document.querySelector('#tax').addEventListener('input', function () {
    updateGrandTotal();
});

function duePrice() {
    var paidAmount = parseFloat($("#paidamount").val()) || 0; // Use the updated paid amount
    var grandTotal = parseFloat($("#grandtotal").val()) || 0;
    var dueAmount = grandTotal - paidAmount;

    $("#dueamount").val(dueAmount.toFixed(2)); // Update the due amount
}


	function totalPrice(){
		var sum = 0;
	
		$(".total").each(function(){
		sum += parseFloat($(this).val());
		});
		$("#grandtotal").val(sum);
		$("#subtotal").val(sum);	
	}

	function totalPayment() {
    var sum = 0;

    // Sum up all `.pay_amount` values
    $(".pay_amount").each(function () {
        var value = parseFloat($(this).val()) || 0; // Default to 0 if empty or invalid
        sum += value;
    });

    // Update the #sumPayment field (if used) and #paidamount field
    $("#sumPayment").val(sum.toFixed(2)); // Keep consistency with decimals
    $("#paidamount").val(sum.toFixed(2)); // Update the #paidamount field
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
        $("#address").val(data.student_id);
		$("#phone").val(data.phone);
		console.log(data);
      });
    });

	// $("#item").change(function() {
    //   // get the selected option value
    //   var selectedOption = $(this).val();
	// 	// console.log('hello');
    //   // make an AJAX request to the server
    //   $.get('/geta-data-product', { option: selectedOption }, function(data) {
    //     // update the field with the response data

	// 	$("#rate").val(data.fees);
    //   });
    // });


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

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
   $(document).ready(function () {
    $("#item").change(function () {
        var selectedOption = $(this).val();
        $.get('/geta-data-product', { option: selectedOption }, function (data) {
            $("#rate").val(data.total_pay);
            $("#descrip").val(data.subject);
        })
        .fail(function (error) {
            console.error("Error in AJAX request:", error);
        });
    });

	$("#table_field tbody").on("change", "select[name='item[]']", function () {
		var product_id = $(this).val();
		var rate = $(this).closest("tr").find(".rate");
		var descrip = $(this).closest("tr").find(".descrip");
		$.get('/geta-data-product', { option: product_id }, function(data) {
        // update the field with the response data
		
			rate.val(data.total_pay);
			descrip.val(data.subject);
			
      });
		// price.val(product_id);
               
    });
});
</script>


@endsection