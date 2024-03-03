@extends('admin.aDashboard')
@section('admins')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

	  {{-- TRIAL START --}}
	  <div class="container-fluid">
		<a href="{{ route('taxproject.manage.task') }}" class="btn bg-gradient-success">Manage Ticket</a>
	  <div class="row">
		<div class="col-lg-12 mb-lg-0 mb-4">
		  <div class="card">
			<div class="card-body p-3">
			  <div class="row">
			
				<div class="col">
					<form method="post" action="{{ route('taxproject.store.tasks') }}" enctype="multipart/form-data" >
						@csrf
					
						<div class="row mb-3">
							<h6 class="col-5">Customer Name<span class="text-danger">*</span></h6>
							<div class="col-5">
								<select id="mySelect" name="customer_id" class="js-example-basic-single select2 form-control" required="">
								<option value="" selected="" disabled="">Select Customer</option>
								@foreach($customers as $customer)
								@if ($customer->company_name == NULL)
									<option value="{{ $customer->id }}">{{ $customer->user_name }} </option>
								@else
								<option value="{{ $customer->id }}">{{ $customer->user_name }} ({{ $customer->company_name }})</option>
								@endif
											
								@endforeach
								
								</select>
							</div>
							</div>

							<div class="form-group">
								<h6>Tax Return Type</h6>
								<div class="controls">
									<input type="text" name="taxreturntype" id="taxreturntype" class="form-control" readonly>					
							   </div>
							</div>

							<div class="form-group">
								<h6>Business Type</h6>
								<div class="controls">
									<input type="text" name="businesstype" id="businesstype" class="form-control" readonly>					
							   </div>
							</div>

							<div class="form-group">
								<h6>Phone Number</h6>
								<div class="controls">
									<input type="text" name="phonenumber" id="phonenumber" class="form-control" readonly>					
							   </div>
							</div>

							<div class="form-group">
								<h6>SSN</h6>
								<div class="controls">
									<input type="text" name="ssn" id="ssn" class="form-control" readonly>					
							   </div>
							</div>

																
			 <div class="form-group">
				<h6>Description<span class="text-danger">*</span></h6>
				<div class="controls">
					
					<textarea name="description" class="form-control" id="tinymceExample" rows="10"></textarea>
			   </div>
			</div>


			 <div class="form-group">
				<h6>Comment</h6>
				<div class="controls">
					
					<textarea name="comment" class="form-control" id="tinymceExample" rows="10"></textarea>
		
			   </div>
			</div>

				</div>

				{{-- 2nd Col --}}
				<div class="col">


					<div class="form-group">
						<h6>Assign Date<span class="text-danger">*</span></h6>
						<div class="controls">
							<input type="date" name="assign_date" class="form-control" required="">
				
					   </div>
					</div>
		
					<div class="form-group">
						<h6>Date to be Completed</h6>
						<div class="controls">
							<input type="date" name="completion_date" class="form-control" >
			
					   </div>
					</div>
		
		
					<div class="form-group">
						<h6>Assigned By<span class="text-danger">*</span></h6>
						<div class="controls">
							<select name="assigned_by" class="js-example-basic-single select2 form-control" required="" >
								<option value="" selected="" disabled="">Select Employee</option>
								@foreach($assignedby as $item)
					 <option value="{{ $item->id }}">{{ $item->name }}</option>	
								@endforeach
							</select>
							
						 </div>
					</div>
		
		
					<div class="form-group">
						<h6>Assign To<span class="text-danger">*</span></h6>
						<div class="controls">
							<select name="assign_to" class="js-example-basic-single select2 form-control" required="" >
								<option value="" selected="" disabled="">Select Employee</option>
								@foreach($assignedby as $item)
					 <option value="{{ $item->id }}">{{ $item->name }}</option>	
								@endforeach
							</select>
							
						 </div>
					</div>
		


						<div class="form-group">
					<h6>Tax Project List<span class="text-danger">*</span></h6>
					<div class="controls">
						<select name="project_list" class="js-example-basic-single select2 form-control" required="" >
							<option value="" selected="" disabled="">Tax Project List</option>
							@foreach($categories as $category)
				 <option value="{{ $category->id }}">{{ $category->project_name }}</option>	
							@endforeach
						</select>
						
					 </div>
						 </div>
				

						<div class="form-group">
							<h6>Folder Location</h6>
							<div class="controls">
								<input type="text" name="hyperlinks" class="form-control" >
				
						   </div>
						</div>


						<div class="form-group">
							<h6>Priority<span class="text-danger">*</span></h6>
							<div class="controls">
								<select name="priority" class="form-control" required="" >
									<option value="" selected="" disabled="">Select an Option</option>
									<option value="Normal">Normal</option>
									<option value="Critical" >Critical</option>
									<option value="Major">Major</option>
									<option value="Minor">Minor</option>
								</select>
								
							 </div>
						</div>

						<div class="form-group">
							<h6>Status<span class="text-danger">*</span></h6>
							<div class="controls">
								<select name="status" class="form-control" required="" >
									<option value="" selected="" disabled="">Select an Option</option>
									<option value="Not started">Not started</option>
									<option value="In Progress" >In Progress</option>
									<option value="In-Progress - Missing Docs" >In-Progress - Missing Docs</option>
									<option value="Not-In-Drake">Not-In-Drake</option>
									<option value="Folder Created Only">Folder Created Only</option>
									<option value="Data Entry Completed">Data Entry Completed</option>
									<option value="Done">Done</option>
								</select>								
							 </div>
						</div>


						<div class="form-group">
							<h6>Tax Year<span class="text-danger">*</span></h6>
							<div class="controls">
								<select name="tax_year" class="form-control" required="" >
									<option value="" selected="" disabled="">Select an Option</option>
									<option value="TAX YEAR 2019">TAX YEAR 2019</option>
									<option value="TAX YEAR 2020">TAX YEAR 2020</option>
									<option value="TAX YEAR 2021">TAX YEAR 2021</option>
									<option value="TAX YEAR 2022">TAX YEAR 2022</option>
									<option value="TAX YEAR 2023">TAX YEAR 2023</option>
									<option value="TAX YEAR 2024">TAX YEAR 2024</option>								
								</select>								
							 </div>
						</div>


						<div class="form-group">
							<h6>eSignature</h6>
							<div class="controls">
								<select name="eSignature" class="form-control" >
									<option value="" selected="" disabled="">Select an Option</option>
									<option value="Not Started">Not Started</option>
									<option value="SENT">SENT</option>
									<option value="READY FOR eSIG">READY FOR eSIG</option>
									<option value="SIGNED">SIGNED</option>
									<option value="PENDING">PENDING</option>
									<option value="In Person Sign">In Person Sign</option>
								
								</select>								
							 </div>
						</div>


						<div class="form-group">
							<h6>EF Status</h6>
							<div class="controls">
								<select name="ef_status" class="form-control" >
									<option value="" selected="" disabled="">Select an Option</option>
									<option value="DONE">DONE</option>
									<option value="READY 2 EFILE">READY 2 EFILE</option>
									<option value="IN PROGRESS">IN PROGRESS</option>
									<option value="HOLD">HOLD</option>
									<option value="ESTIMATES">ESTIMATES</option>
									<option value="NOT STARTED">NOT STARTED</option>
									<option value="REJECTED">REJECTED</option>
								</select>								
							 </div>
						</div>
						


								 <div class="text-xs-right">
									<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Task">
							 </div>

						</div>
			
			   </div> <!-- end row  -->
			   				
					</form>
			  </div>
			</div>
		  </div>
		</div>

	  </div>

	  @include('admin.body.footer')


		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

		 <script>
			$(document).ready(function() {
			$('.select2').select2({
				placeholder: 'Select an option',
				allowClear: true
			});

			$("#mySelect").change(function() {
      // get the selected option value
      var selectedOption = $(this).val();

      // make an AJAX request to the server
      $.get('/get-customer', { option: selectedOption }, function(data) {
        // update the field with the response data
        $("#taxreturntype").val(data.customer_type);
		$("#businesstype").val(data.business_type);
		$("#phonenumber").val(data.personal_phone);
		$("#ssn").val(data.ssn);
		console.log(data);
		$('.js-example-basic-single').select2();

      });
    });
		});
		</script>

		<script>

		</script>


	  

	  {{-- TRIAL END --}}
@endsection
