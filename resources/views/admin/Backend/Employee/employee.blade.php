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

		   </div>
		</div>
		 </div>
				
			</div> <!-- end col md 4 -->

			<div class="col-md-6">	
				<div class="form-group">
					<h6>Last Name<span class="text-danger">*</span></h6>
					<div class="controls">
						<input type="text" name="last_name" class="form-control" required="">
			
				   </div>
				</div>
			</div> 
			<!-- end col md 4 -->
 <!-- end col md 4 -->
			
		</div> <!-- end 1st row  -->

<div class="row"> <!-- start 2nd row  -->
			<div class="col-md-3">

				<div class="form-group">
					<h6>Employee Title<span class="text-danger">*</span></h6>
					<div class="controls">
						<select name="designation" class="form-control" required >
							<option value="" selected="" disabled="">Select Employee Title</option>
							@foreach($designations as $designation)
							<option value="{{ $designation->id }}">{{ $designation->designation }}</option>	
							@endforeach
						</select>
				
					 </div>
						 </div>
				
			</div> <!-- end col md 4 -->

			<div class="col-md-3">

				<div class="form-group">
					<h6>Department<span class="text-danger">*</span></h6>
					<div class="controls">
						<select name="department" class="form-control" required >
							<option value="" selected="" disabled="">Select Department</option>
							@foreach($departments as $department)
							<option value="{{ $department->id }}">{{ $department->department }}</option>	
							@endforeach
						</select>
					
					 </div>
						 </div>
				
			</div> <!-- end col md 4 -->

			<div class="col-md-6">	
				<div class="form-group">
					<h6>Phone<span class="text-danger">*</span></h6>
					<div class="controls">
						<input type="number" name="phone" class="form-control" required="">
		
				   </div>
				</div>		
			</div> <!-- end col md 4 -->			
		</div> <!-- end 2nd row  -->
		 
<div class="row"> <!-- start 3rd row  -->

	<div class="col-md-6">

		<div class="form-group">
			<h6>Rate Type<span class="text-danger">*</span></h6>
			<div class="controls">
				<select name="rate_type" class="form-control" required >
					<option value="" selected="" disabled="">Select Option</option>		
					<option value="Hourly">Hourly</option>						
					<option value="Salary">Salary</option>	
				</select>
				
			 </div>
		</div>	
	</div> <!-- end col md 4 -->

	<div class="col-md-6">
		<div class="form-group">
			<h6>Total Salary<span class="text-danger">*</span></h6>
			<div class="controls">
				<input type="number" name="salary" id="totalSalary" class="form-control" required>

		   </div>
		</div>
	</div> <!-- end col md 4 -->

			
		
		</div> <!-- end 3th row  -->
		
	
		<div class="row"> <!-- start 4th row  -->

			<div class="col-md-6">
				<div class="form-group">
					<h6>Email<span class="text-danger">*</span></h6>
					<div class="controls">
						<input type="text" name="email" class="form-control" required>
		
				   </div>
				</div>
				
			</div> <!-- end col md 4 -->
		
			<div class="col-md-6">		
		<div class="form-group">
			<h6>Employe Type<span class="text-danger">*</span></h6>
			<div class="controls">
				<select name="employee_type" class="form-control" required  >
					<option value="" selected="" disabled="">Select Option</option>		
					<option value="Permanent">Permanent</option>						
					<option value="Part Time">Part Time</option>	
					<option value="Contractor">Contractor</option>	
					<option value="Seasonal">Seasonal</option>	
					<option value="Internship">Internship</option>	
				</select>
				
			 </div>
		</div>	
				</div> 
				</div> <!-- end 4th row  -->

		<div class="row"> <!-- start 5th row  -->

			<div class="col-md-6">
				<div class="form-group">
					<h6>Address<span class="text-danger">*</span></h6>
					<div class="controls">
						<input type="text" name="address" class="form-control" required>
			
					</div>
				</div>
				
			</div> <!-- end col md 4 -->
		
			<div class="col-md-6">
				<div class="form-group">
					<h6>City<span class="text-danger">*</span></h6>
					<div class="controls">
						<input type="text" name="city" class="form-control" required>
			
					</div>
				</div>
				
			</div> <!-- end col md 4 -->
				</div> <!-- end 5th row  -->



				<div class="row"> <!-- start 6th row  -->

					<div class="col-md-6">
						<div class="form-group">
							<h6>State<span class="text-danger">*</span></h6>
							<div class="controls">
								<input type="text" name="state" class="form-control" required>
					
							</div>
						</div>
						
					</div> <!-- end col md 4 -->
				
					<div class="col-md-6">
						<div class="form-group">
							<h6>ZIP<span class="text-danger">*</span></h6>
							<div class="controls">
								<input type="text" name="zip" class="form-control" required>
					
							</div>
						</div>
						
					</div> <!-- end col md 4 -->
						</div> <!-- end 6th row  -->



		<div class="row"> <!-- start last row  -->

		
		
					<div class="col-md-6">
						<div class="form-group">
							<h6>Country<span class="text-danger">*</span></h6>
							<div class="controls">
								<select name="country" class="form-control" required  >
									<option value="" selected="" disabled="">Select Option</option>		
									<option value="Bangladesh">Bangladesh</option>						
									<option value="USA">United States</option>						
								</select>
							
							 </div>
						</div>	
						
					</div> <!-- end col md 4 -->

					<div class="col-md-6">
						<div class="form-group">
							<h6>Image</h6>
							<div class="controls">
								<input type="file" name="image" class="form-control" >
							
									</div>
						</div>
						
					</div> <!-- end col md 4 -->
					
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="1" id="fcustomCheck1" name="status">
						<label class="custom-control-label" for="customCheck1">Consent to reveive SMS</label>
					  </div>

				</div> <!-- end last row  -->
				 
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

	 

@endsection