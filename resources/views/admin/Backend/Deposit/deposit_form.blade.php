@extends('admin.aDashboard')
@section('admins')

  {{-- TRIAL START --}}
  <div class="container-fluid">
	<div class="row">
	  <div class="col-lg-12 mb-lg-0 mb-4">
		<div class="card">
		  <div class="card-body p-3">
			<div class="row">
				
			<form class="insert-form" id="insert_form" method="post" action="{{ route('deposit.store') }}">
			@csrf
			<div class="row">
				<div class="col">

					<div class="row mb-3">
						<div class="col-3"><label  class="text-uppercase text-dark text-xs font-weight-bold" >Deposit Type</label></div>
						<div class="col">
							<select id="deposit_type" name="deposit_type" class="js-example-basic-single select2 form-control" required="">
							<option value="" selected="" disabled="">Select Type of Deposit</option>
						
									 <option value="deposit">Deposit</option>	
									 <option value="loan">Loan</option>	
									 <option value="return_loan">Return Loan</option>	
					
							<!-- More options -->
							</select>
						</div>
						</div>

					<div class="row mb-3">
						<div class="col-3"><label class="text-uppercase text-dark text-xs font-weight-bold">Date</label></div>
						<div class="col"><input class="form-control" type="date" id="date" name="deposit_date" required=""></div>
					</div>
				
					<div class="row mb-3">
						<div class="col-3"><label  class="text-uppercase text-dark text-xs font-weight-bold" for="balance">From Bank</label></div>
						<div class="col">
							<select id="balance" name="balance" class="js-example-basic-single select2 form-control" required="">
							<option value="" selected="" disabled="">Select Bank</option>
							 @foreach($banks as $bank)
									 <option value="{{$bank->id}}">{{$bank->ac_name}}</option>	
							 @endforeach 
							<!-- More options -->
							</select>
						</div>
						<div class="col">
							<div class="row">
								<div class="col">
									<label  class="text-uppercase text-dark text-xs font-weight-bold">Loan</label>
									<input class="form-control " type="text" id="showLoan" name="showLoan"></div>
								<div class="col"><label  class="text-uppercase text-dark text-xs font-weight-bold">Balance</label>	<input class="form-control " type="text" id="showBalance" name="showBalance"></div>
							</div>
							
						
						</div>
						</div>
	
						<div class="row mb-3">
							<div class="col-3"><label class="text-uppercase text-dark text-xs font-weight-bold">Amount</label></div>
							<div class="col"><input class="form-control" type="number" id="amount" name="amount" required="">
						</div>	
						</div>

						<div class="row mb-3">
							<div class="col-3"><label  class="text-uppercase text-dark text-xs font-weight-bold" for="c_bank">To Bank</label></div>
							<div class="col">
								<select id="c_bank" name="c_bank" class="js-example-basic-single select2 form-control" required="">
								<option value="" selected="" disabled="">Select Bank</option>
								 @foreach($banks as $bank)
										 <option value="{{$bank->id}}">{{$bank->ac_name}}</option>	
								 @endforeach 
								<!-- More options -->
								</select>
							</div>
							<div class="col">
								<div class="row">
									<div class="col">
										<label  class="text-uppercase text-dark text-xs font-weight-bold">Loan</label>
										<input class="form-control" type="text" id="showCLoan" name="showCLoan">
									</div>
									<div class="col">
										<label  class="text-uppercase text-dark text-xs font-weight-bold">Balance</label>
										<input class="form-control " type="text" id="showCBalance" name="showCBalance">
									</div>
								</div>
								
								
							</div>
							</div>

				</div>
				<div class="col">
				
				
					<div class="row mb-2">
						<div class="col-3"> <label for="details">Details</label></div>
						<div class="col"><textarea class="form-control" name="details" id="details" rows="4"></textarea></div>
					</div>
					<div class="row mb-3">
						<div class="col-3"><label  class="text-uppercase text-dark text-xs font-weight-bold" for="mySelect">Employee</label></div>
						<div class="col">
						<select id="mySelect" name="employee_id" class="js-example-basic-single select2 form-control" required="">
							<option value="" selected="" disabled="">Select Employee</option>
							@foreach($employees as $employee )
									 <option value="{{$employee->id}}">{{$employee->f_name}} {{$employee->l_name}}</option>	
							@endforeach
							<!-- More options -->
							</select>
						</div>
					</div>
					
			</div>

			<div class="container">
				<div class="row">
				  <div class="col">
				  </div>
				  @if(Auth::guard('admin')->user()->type=="1")
				  <div class="col">
					<input type="submit" class="btn bg-gradient-primary w-100" value="Add Deposit">
				  </div>
				  @endif
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



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  <script>
  $("#balance").change(function() {
	// get the selected option value
	var selectedOption = $(this).val();

	// make an AJAX request to the server
	$.get('/get-balance', { option: selectedOption }, function(data) {
	  // update the field with the response data
	  $("#showBalance").val(data.balance);
	  $("#showLoan").val(data.loan);
	  console.log(data);
	 
	});
  });


  $("#c_bank").change(function() {
	// get the selected option value
	var selectedOption = $(this).val();

	// make an AJAX request to the server
	$.get('/get-balance', { option: selectedOption }, function(data) {
	  // update the field with the response data
	  $("#showCBalance").val(data.balance);
	  $("#showCLoan").val(data.loan);
	  console.log(data);
	 
	});
  });


//   $("#amount").on("input", function() {
//       var enteredAmount = parseFloat($(this).val());
//       var showBalance = parseFloat($("#showBalance").val());
// 	   var depositType = $("#deposit_type").val();


//       // Check if the entered amount is valid and less than or equal to the balance
//       if (!isNaN(enteredAmount) && !isNaN(showBalance)) {
//         if (enteredAmount <= showBalance) {
//           // Amount is valid, no need for further action
//           // You can provide visual feedback here if needed
//         } else {
//           // Amount exceeds the balance, show an error message
//           alert("Amount exceeds available balance.");
//           // Clear the input field
//           $(this).val("");
//         }
//       } else {
//         // Invalid input, e.g., non-numeric input
//         // You can clear the input or take other actions as needed
//       }
//     });

$("#amount").on("input", function() {
  var enteredAmount = parseFloat($(this).val());
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

</script>

@endsection