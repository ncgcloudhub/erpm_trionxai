@extends('admin.aDashboard')
@section('admins')

  {{-- TRIAL START --}}
  <div class="container-fluid">
	<div class="row">
	  <div class="col-lg-12 mb-lg-0 mb-4">
		<div class="card">
		  <div class="card-body p-3">
			<div class="row">
				
		
			<input type="hidden" name="id" value="{{$purchase->id}}">
			<div class="row">
				<div class="col">
					<div class="row mb-3">
						<div class="col-3"><label  class="text-uppercase text-dark text-xs font-weight-bold" for="mySelect">Vendor</label></div>
						<div class="col">
							<select id="mySelect" name="vendor_id" class="js-example-basic-single select2 form-control" disabled>
							<option value="{{ $purchase->vendor_id }}" selected="">{{ $purchase->supplier->vendor_name }} ({{ $purchase->supplier->vendor_s_name }})</option>
							@foreach($vendors as $item)
									 <option value="{{ $item->id }}">{{ $item->vendor_name }} ({{ $item->vendor_s_name }})</option>	
							@endforeach
							<!-- More options -->
							</select>
						</div>
						</div>
	
						<div class="row mb-3">
							<div class="col-3"><label class="text-uppercase text-dark text-xs font-weight-bold">Price</label></div>
							<div class="col"><input class="form-control" value="{{ $purchase->supplier->price }}" type="text" id="price" name="price" readonly>
						</div>
							
						</div>
						
						<div class="row mb-3">
							<div class="col-3"><label class="text-uppercase text-dark text-xs font-weight-bold">Phone</label></div>
							<div class="col"><input class="form-control mb-3" value="{{ $purchase->supplier->contact }}" type="text" id="phone" name="phone" readonly></div>
							
						</div>
	
					
				</div>
				<div class="col">
					<div class="row mb-3">
						<div class="col-3"><label class="text-uppercase text-dark text-xs font-weight-bold">Purchase Date</label></div>
						<div class="col"><input class="form-control" value="{{ $purchase->purchase_date }}" type="date" name="purchase_date" readonly></div>
					</div>

					<div class="row mb-3">
						<div class="col-3"><label class="text-uppercase text-dark text-xs font-weight-bold">Expiration Date</label></div>
						<div class="col"><input class="form-control" value="{{ $purchase->expiration_date }}" type="date" name="expiration_date" readonly></div>
					</div>
					
					<div class="row mb-3">
						<div class="col-3"> <label class="text-uppercase text-dark text-xs font-weight-bold" for="details">Details</label></div>
						<div class="col"><input class="form-control" value="{{ $purchase->details }}" type="text" name="details" readonly></div>
					</div>

				
			</div>
			
			<div class="container">
				<div class="row">
				  <div class="col">
				  </div>
				
				  <div class="col">
				  </div>
				</div>
			  </div>
			
	 
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
      $.get('/get-vendor', { option: selectedOption }, function(data) {
        // update the field with the response data
        $("#price").val(data.price);
		$("#phone").val(data.contact);
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
			$("#dueamount").val(parseFloat($("#grandtotal").val()) - ($("#sumPayment").val()));
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
            $("#rate").val(data.fees);
        })
        .fail(function (error) {
            console.error("Error in AJAX request:", error);
        });
    });

	$("#table_field tbody").on("change", "select[name='item[]']", function () {
		var product_id = $(this).val();
		var rate = $(this).closest("tr").find(".rate");
		$.get('/geta-data-product', { option: product_id }, function(data) {
        // update the field with the response data
		
			rate.val(data.fees);
			
      });
		// price.val(product_id);
               
    });
});
</script>


@endsection