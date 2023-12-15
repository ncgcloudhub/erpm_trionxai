@extends('admin.aDashboard')
@section('admins')

  {{-- TRIAL START --}}
  <div class="container-fluid">
	<div class="row">
	  <div class="col-lg-12 mb-lg-0 mb-4">
		<div class="card">
		  <div class="card-body p-3">
			<div class="row">
				
			<form class="insert-form" id="insert_form" method="post" action="{{ route('conveyance.update') }}">
			@csrf
			<input type="hidden" name="id" value="{{ $conveyance->id }}">  
			<div class="row">
				<div class="col">
					<div class="row mb-3">
						<div class="col-3"><label  class="text-uppercase text-dark text-xs font-weight-bold" for="mySelect">Employee</label></div>
						<div class="col">
							<select id="mySelect" name="employee_id" class="js-example-basic-single select2 form-control" required="">
							<option value="{{$conveyance->employee_id}}" selected="" disabled="">{{$conveyance->employee->f_name}} {{$conveyance->employee->l_name}}</option>
							{{-- @foreach($employees as $employee)
									 <option value="{{ $employee->id }}">{{ $employee->f_name }} {{ $employee->l_name }}</option>	
							@endforeach --}}
							<!-- More options -->
							</select>
						</div>
						</div>
	
						<div class="row mb-3">
							<div class="col-3"><label class="text-uppercase text-dark text-xs font-weight-bold">Designation</label></div>
							<div class="col"><input class="form-control" type="text" id="designation" name="designation" value="{{$conveyance->employee->designation->designation}}">
						</div>
							
						</div>

						<div class="row mb-3">
							<div class="col-3"><label class="text-uppercase text-dark text-xs font-weight-bold">Department</label></div>
							<div class="col"><input class="form-control" type="text" id="department" name="department" value="{{$conveyance->employee->department->department}}">
						</div>
							
						</div>
					
				</div>
				<div class="col">
					<div class="row mb-3">
						<div class="col-3"><label class="text-uppercase text-dark text-xs font-weight-bold">Date</label></div>
						<div class="col"><input class="form-control" type="date" id="date" name="date" required="" value="{{$conveyance->date}}"></div>
					</div>
			
					<div class="row mb-3">
						<div class="col-3"> <label class="text-uppercase text-dark text-xs font-weight-bold" for="details">Supporting Employee</label></div>
						<div class="col"><textarea class="form-control" name="s_employee" id="s_employee" rows="2">{{$conveyance->s_employee}}</textarea></div>
					</div>

			</div>
			<div class="table-responsive">
				<table id="table_field" class="table align-items-center mb-0">
				<thead>
					  <tr>
						<th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">From</th>
						<th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">To</th> 
						<th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Transport</th>
					
						<th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Purpose</th>
						<th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Total</th>
						{{-- <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Action</th> --}}
					</tr>
				</thead>
				@foreach ($conveyanceitems as $item)
					<tr>
						  <td>
							<input class="form-control " type="text" id="from" name="from[]" value="{{$item->from}}">
						</td>
						<td>
							<input class="form-control " type="text" id="to" name="to[]" value="{{$item->to}}">
						</td>
						  <td>
							<select id="transport" name="transport[]" class="form-control" required="">
								<option value="{{$item->transport}}" selected="">{{$item->transport}}</option>
								{{-- <option value="Bus">Bus</option>	
								<option value="Rickshaw">Rickshaw</option>	
								<option value="Uber">Uber</option>	
								<option value="Pathao">Pathao</option>	
								<option value="Private Vehicle">Private Vehicle</option>	 --}}
								</select>
						  </td>
						  <td><input class="form-control " type="text" id="purpose" name="purpose[]" value="{{$item->purpose}}"></td>
						  <td><input class="form-control total" type="number" id="amount" name="amount[]" value="{{$item->amount}}"></td>
						  {{-- <td>
							<a name="add" id="add" class="btn bg-gradient-dark mb-0"><i class="fas fa-plus" aria-hidden="true"></i></a>
						
						</td> --}}
					</tr>
					@endforeach
				</table>
				<hr>
					<div class="row">
					<div class="col">
					</div>

					<div class="col-4">
					
						<div class="row mb-2">
							<div class="col-4"><label  class="text-uppercase text-dark text-xs font-weight-bold ">Grand Total</label></div>
							<div class="col"><input class="form-control" type="text" name="grandtotal" id="grandtotal" value="{{$conveyance->grand_total}}" readonly>
							</div>
						</div>


					
					</div>
				</div>
				<div class="row">
					<div class="col">
					<hr>
					<p>Pay From</p>
						<table>
							<tr>
								<td>
								  <select id="bank_item" name="bank_item" class="form-control" required="" >
									  <option value="" selected="" disabled="">Select Account</option>
									  @foreach($banks as $payment)
										   <option value="{{ $payment->id }}">{{ $payment->bank_name }}</option>	
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
			</div>
			
			<div class="container">
				<div class="row">
				  <div class="col">
					{{-- @if ($conveyance->status == "Approved")
			   
					@else
					@if(Auth::guard('admin')->user()->type=="1" || (Auth::guard('admin')->user()->type=="2") || (Auth::guard('admin')->user()->type=="3"))
					<a class="btn bg-outline-primary w-40 text-primary" href="{{ route('conveyance.approve',$conveyance->id) }}"><i class="fa fa-thumbs-up text-primary me-2"></i>Approve</a>
					@else
					@endif
					@endif --}}
				  </div>
				  <div class="col">
					<input type="submit" class="btn bg-gradient-primary w-100" value="Update & Approve Conveyance">
					
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
	function calculateGrandTotal() {
    var grandTotal = 0;

    // Loop through each table row
    $("#table_field tr").each(function() {
      var amount = parseFloat($(this).find(".total").val()) || 0;
      grandTotal += amount;
    });

    $("#grandtotal").val(grandTotal); // Update the grand total input field
  }

	// Update grand total on amount change
	$("#table_field").on('input', '.total', function() {
    calculateGrandTotal();
  });
  </script>
  {{-- <script>
	// Add a search field to the dropdown
	$("#mySearch").on("keyup", function() {
	  var value = $(this).val().toLowerCase();
	  $("#mySelect option").filter(function() {
		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	  });
	});
  </script> --}}
  
  {{-- <script>
	$(document).ready(function(){
		var html='<tr><td><input class="form-control" type="text" id="from" name="from[]"></td><td><input class="form-control " type="text" id="to" name="to[]"></td><td><select id="transport" name="transport[]" class="form-control" required=""><option value="" selected="" disabled="">Select Transport</option><option value="Bus">Bus</option><option value="Rickshaw">Rickshaw</option><option value="Uber">Uber</option><option value="Pathao">Pathao</option><option value="Private Vehicle">Private Vehicle</option></select></td><td><input class="form-control " type="text" id="purpose" name="purpose[]"></td><td><input class="form-control total" type="number" id="amount" name="amount[]" value="0" ></td><td><a name="remove" id="remove" class="btn bg-gradient-danger mb-0"><i class="fas fa-minus" aria-hidden="true"></i></a></td></tr>';


		function calculateGrandTotal() {
    var grandTotal = 0;

    // Loop through each table row
    $("#table_field tr").each(function() {
      var amount = parseFloat($(this).find(".total").val()) || 0;
      grandTotal += amount;
    });

    $("#grandtotal").val(grandTotal); // Update the grand total input field
  }
	
		// var x =1;
	  $("#add").click(function(){
		$("#table_field").append(html);
		$('.js-example-basic-single').select2();
		calculateGrandTotal();
	  });
	  $("#table_field").on('click', '#remove', function () {
    $(this).closest('tr').remove();
	$('.js-example-basic-single').select2();
	calculateGrandTotal();
	});


	  // Update grand total on amount change
	  $("#table_field").on('input', '.total', function() {
    calculateGrandTotal();
  });
	
	
	$("#mySelect").change(function() {
      // get the selected option value
      var selectedOption = $(this).val();

      // make an AJAX request to the server
      $.get('/get-employee-data', { option: selectedOption }, function(data) {
        // update the field with the response data
        $("#designation").val(data.designation.designation);
        // $("#department").val(data.department);
		console.log(data);
      });
    });

	});
</script>

<script>
	$(document).ready(function() {
    $('.select2').select2({
        placeholder: 'Select an option',
        allowClear: true
    });
});
</script> --}}

@endsection