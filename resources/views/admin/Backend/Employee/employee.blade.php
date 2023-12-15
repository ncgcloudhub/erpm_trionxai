@extends('admin.aDashboard')
@section('admins')

	  <div class="container-fluid">
		<!-- Content Header (Page header) -->

		<!-- Main content -->
		<section class="row">

		 <!-- Basic Forms -->
		 <div class="col-lg-12 mb-lg-0 mb-4">
		 <div class="card">
			<div class="card-body p-3">
			  <div class="row">
				<div class="col">

  <form method="post" action="{{ route('employee.store') }}" enctype="multipart/form-data" >
		 	@csrf

<div class="row">
	<div class="col-12">	

		<div class="row"> <!-- start 1st row  -->
			<div class="col-md-6">

	 <div class="form-group">
		<div class="form-group">
			<h6>First Name<span class="text-danger">*</span></h6>
			<div class="controls">
				<input type="text" name="first_name" class="form-control" required="">
	 {{-- @error('product_name') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror --}}
		   </div>
		</div>
		 </div>
				
			</div> <!-- end col md 4 -->

			<div class="col-md-6">	
				<div class="form-group">
					<h6>Last Name<span class="text-danger">*</span></h6>
					<div class="controls">
						<input type="text" name="last_name" class="form-control" required="">
			 {{-- @error('product_name') 
			 <span class="text-danger">{{ $message }}</span>
			 @enderror --}}
				   </div>
				</div>
			</div> 
			<!-- end col md 4 -->
 <!-- end col md 4 -->
			
		</div> <!-- end 1st row  -->

<div class="row"> <!-- start 3RD row  -->
			<div class="col-md-3">

				<div class="form-group">
					<h6>Designation<span class="text-danger">*</span></h6>
					<div class="controls">
						<select name="designation" class="form-control"  >
							<option value="" selected="" disabled="">Select Designation</option>
							@foreach($designations as $designation)
							<option value="{{ $designation->id }}">{{ $designation->designation }}</option>	
							@endforeach
						</select>
						{{-- @error('category_id') 
					 <span class="text-danger">{{ $message }}</span>
					 @enderror  --}}
					 </div>
						 </div>
				
			</div> <!-- end col md 4 -->

			<div class="col-md-3">

				<div class="form-group">
					<h6>Department<span class="text-danger">*</span></h6>
					<div class="controls">
						<select name="department" class="form-control"  >
							<option value="" selected="" disabled="">Select Department</option>
							@foreach($departments as $department)
							<option value="{{ $department->id }}">{{ $department->department }}</option>	
							@endforeach
						</select>
						{{-- @error('category_id') 
					 <span class="text-danger">{{ $message }}</span>
					 @enderror  --}}
					 </div>
						 </div>
				
			</div> <!-- end col md 4 -->

			<div class="col-md-6">	
				<div class="form-group">
					<h6>Phone<span class="text-danger">*</span></h6>
					<div class="controls">
						<input type="number" name="phone" class="form-control" required="">
			 {{-- @error('product_name') 
			 <span class="text-danger">{{ $message }}</span>
			 @enderror --}}
				   </div>
				</div>		
			</div> <!-- end col md 4 -->			
		</div> <!-- end 3RD row  -->
		 
<div class="row"> <!-- start 6th row  -->

	<div class="col-md-4">

		<div class="form-group">
			<h6>Rate Type<span class="text-danger">*</span></h6>
			<div class="controls">
				<select name="rate_type" class="form-control"  >
					<option value="" selected="" disabled="">Select Option</option>		
					<option value="Hourly">Hourly</option>						
					<option value="Salary">Salary</option>	
				</select>
				{{-- @error('category_id') 
			 <span class="text-danger">{{ $message }}</span>
			 @enderror  --}}
			 </div>
		</div>	
	</div> <!-- end col md 4 -->

			<div class="col-md-2">
				<div class="form-group">
					<h6>Basic<span class="text-danger">*</span></h6>
					<div class="controls">
						<input type="number" name="basic" id="basic" class="form-control">

				   </div>
				</div>
				
			</div> <!-- end col md 4 -->
			<div class="col-md-2">
				<div class="form-group">
					<h6>Rent<span class="text-danger">*</span></h6>
					<div class="controls">
						<input type="number" name="rent" id="rent" class="form-control">

				   </div>
				</div>
				
			</div> <!-- end col md 4 -->
			<div class="col-md-2">
				<div class="form-group">
					<h6>Medical<span class="text-danger">*</span></h6>
					<div class="controls">
						<input type="number" name="medical" id="medical" class="form-control">

				   </div>
				</div>
				
			</div> <!-- end col md 4 -->
			<div class="col-md-2">
				<div class="form-group">
					<h6>Conveyance<span class="text-danger">*</span></h6>
					<div class="controls">
						<input type="number" name="conveyance" id="conveyance" class="form-control">

				   </div>
				</div>
				
			</div> <!-- end col md 4 -->
		</div> <!-- end 3th row  -->
		
		<div class="row"> <!-- start 4th row  -->
			<div class="col-md-6">
				
				
			</div> <!-- end col md 4 -->
			<div class="col-md-12">
				<div class="form-group">
					<h6>Total Salary</h6>
					<div class="controls">
						<input type="number" name="salary" id="totalSalary" readonly class="form-control">

				   </div>
				</div>
			</div> <!-- end col md 4 -->
		</div>

		<div class="row"> <!-- start 4th row  -->

			<div class="col-md-6">
				<div class="form-group">
					<h6>Email</h6>
					<div class="controls">
						<input type="text" name="email" class="form-control">
			 {{-- @error('product_name') 
			 <span class="text-danger">{{ $message }}</span>
			 @enderror --}}
				   </div>
				</div>
				
			</div> <!-- end col md 4 -->
		
					<div class="col-md-6">
						<div class="form-group">
							<h6>Blood Group<span class="text-danger">*</span></h6>
							<div class="controls">
								<input type="text" name="b_group" class="form-control">
					 {{-- @error('product_name') 
					 <span class="text-danger">{{ $message }}</span>
					 @enderror --}}
						   </div>
						</div>
						
					</div> <!-- end col md 4 -->
				</div> <!-- end 6th row  -->

		<div class="row"> <!-- start 4th row  -->

			<div class="col-md-6">
				<div class="form-group">
					<h6>Address<span class="text-danger">*</span></h6>
					<div class="controls">
						<input type="text" name="address" class="form-control">
				{{-- @error('product_name') 
				<span class="text-danger">{{ $message }}</span>
				@enderror --}}
					</div>
				</div>
				
			</div> <!-- end col md 4 -->
		
					<div class="col-md-6">
						<div class="form-group">
							<h6>City<span class="text-danger">*</span></h6>
							<div class="controls">
								<select name="city" class="form-control"  >
									<option value="" selected="" disabled="">Select Option</option>		
									<option value="Chittagong">Chittagong</option>	
									<option value="Barishal">Barishal</option>						
									<option value="Dhaka">Dhaka</option>						
									<option value="Khulna">Khulna</option>
									<option value="Rajshahi">Rajshahi</option>	
									<option value="Rongpur">Rongpur</option>						
									<option value="Sylhet">Sylhet</option>	
								</select>
								{{-- @error('category_id') 
								<span class="text-danger">{{ $message }}</span>
								@enderror  --}}
								</div>
						</div>
						
					</div> <!-- end col md 4 -->
				</div> <!-- end 6th row  -->

		<div class="row"> <!-- start last row  -->

			<div class="col-md-6">
				<div class="form-group">
					<h6>Image</h6>
					<div class="controls">
						<input type="file" name="image" class="form-control" >
						{{-- @error('picture') 
						<span class="text-danger">{{ $message }}</span>
						@enderror  --}}
							</div>
				</div>
				
			</div> <!-- end col md 4 -->
		
					<div class="col-md-6">
						<div class="form-group">
							<h6>Country<span class="text-danger">*</span></h6>
							<div class="controls">
								<select name="country" class="form-control"  >
									<option value="" selected="" disabled="">Select Option</option>		
									<option value="Bangladesh">Bangladesh</option>						
								</select>
								{{-- @error('category_id') 
							 <span class="text-danger">{{ $message }}</span>
							 @enderror  --}}
							 </div>
						</div>	
						
					</div> <!-- end col md 4 -->
				</div> <!-- end 6th row  -->
	 <hr>				 
						<div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Employee">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
	  {{-- </div> --}}

	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	  
	  <script>
        $(document).ready(function() {
            // Function to calculate and update Total Salary
            function updateTotalSalary() {
                // Get values from input fields
                var basic = parseFloat($("#basic").val()) || 0;
                var rent = parseFloat($("#rent").val()) || 0;
                var medical = parseFloat($("#medical").val()) || 0;
                var conveyance = parseFloat($("#conveyance").val()) || 0;

                // Calculate total salary
                var totalSalary = basic + rent + medical + conveyance;

                // Update the Total Salary input field
                $("#totalSalary").val(totalSalary);
            }

            // Attach input event listeners to the fields
            $("#basic, #rent, #medical, #conveyance").on("input", updateTotalSalary);

            // Initial calculation
            updateTotalSalary();
        });
    </script>

@endsection