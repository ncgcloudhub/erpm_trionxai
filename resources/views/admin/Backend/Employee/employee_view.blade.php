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



			<input type="hidden" name="id" value="{{$employee->id}}">

<div class="row">
	<div class="col-12">	

		<div class="row"> <!-- start 1st row  -->
			<div class="col-md-6">

	 <div class="form-group">
		<div class="form-group">
			<h6>First Name<span class="text-danger">*</span></h6>
			<div class="controls">
				<input type="text" value="{{$employee->f_name}}" name="first_name" class="form-control" readonly>

		   </div>
		</div>
		 </div>
				
			</div> <!-- end col md 4 -->

			<div class="col-md-6">	
				<div class="form-group">
					<h6>Last Name<span class="text-danger">*</span></h6>
					<div class="controls">
						<input type="text" value="{{$employee->l_name}}" name="last_name" class="form-control" readonly>
			
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
						<select name="designation" class="form-control" @readonly(true) >
							<option value="{{$employee->designation_id}}" selected="" >{{$employee->designation->designation}}</option>
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
						<select name="department" class="form-control" @readonly(true) >
							<option value="{{$employee->department_id}}" selected="">{{$employee->department->department}}</option>
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
						<input type="number" value="{{$employee->phone}}" name="phone" class="form-control" readonly>
		
				   </div>
				</div>		
			</div> <!-- end col md 4 -->			
		</div> <!-- end 2nd row  -->
		 
<div class="row"> <!-- start 3rd row  -->

	<div class="col-md-6">

		<div class="form-group">
			<h6>Rate Type<span class="text-danger">*</span></h6>
			<div class="controls">
				<select name="rate_type" class="form-control" @readonly(true) >
					<option value="{{$employee->rate_type}}" selected="" >{{$employee->rate_type}}</option>		
					<option value="Hourly">Hourly</option>						
					<option value="Salary">Salary</option>	
				</select>
				
			 </div>
		</div>	
	</div> <!-- end col md 4 -->

	<div class="col-md-6">
		<div class="form-group">
			<h6>Total Salary</h6>
			<div class="controls">
				<input type="number" value="{{$employee->salary}}" name="salary" id="totalSalary" class="form-control" readonly>

		   </div>
		</div>
	</div> <!-- end col md 4 -->

			
		
		</div> <!-- end 3th row  -->
		
	
		<div class="row"> <!-- start 4th row  -->

			<div class="col-md-6">
				<div class="form-group">
					<h6>Email</h6>
					<div class="controls">
						<input type="text" value="{{$employee->email}}" name="email" class="form-control" readonly>
		
				   </div>
				</div>
				
			</div> <!-- end col md 4 -->
		
			<div class="col-md-6">		
		<div class="form-group">
			<h6>Employe Type<span class="text-danger">*</span></h6>
			<div class="controls">
				<select name="employee_type" class="form-control" @readonly(true) >
					<option value="{{$employee->employee_type}}" selected="">{{$employee->employee_type}}</option>		
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
						<input type="text" value="{{$employee->address}}" name="address" class="form-control" readonly>
			
					</div>
				</div>
				
			</div> <!-- end col md 4 -->
		
			<div class="col-md-6">
				<div class="form-group">
					<h6>City<span class="text-danger">*</span></h6>
					<div class="controls">
						<input type="text" value="{{$employee->city}}" name="city" class="form-control" readonly>
			
					</div>
				</div>
				
			</div> <!-- end col md 4 -->
				</div> <!-- end 5th row  -->



				<div class="row"> <!-- start 6th row  -->

					<div class="col-md-6">
						<div class="form-group">
							<h6>State<span class="text-danger">*</span></h6>
							<div class="controls">
								<input type="text" value="{{$employee->state}}" name="state" class="form-control" readonly>
					
							</div>
						</div>
						
					</div> <!-- end col md 4 -->
				
					<div class="col-md-6">
						<div class="form-group">
							<h6>ZIP<span class="text-danger">*</span></h6>
							<div class="controls">
								<input type="text" value="{{$employee->zip}}" name="zip" class="form-control" readonly>
					
							</div>
						</div>
						
					</div> <!-- end col md 4 -->
						</div> <!-- end 6th row  -->



		<div class="row"> <!-- start last row  -->

		
		
					<div class="col-md-6">
						<div class="form-group">
							<h6>Country<span class="text-danger">*</span></h6>
							<div class="controls">
								<select name="country" class="form-control" @readonly(true) >
									<option value="{{$employee->country}}" selected="" >{{$employee->country}}</option>		
									<option value="Bangladesh">Bangladesh</option>						
								</select>
							
							 </div>
						</div>	
						
					</div> <!-- end col md 4 -->

					<div class="col-md-6">
						<div class="form-group">
							<h6>Image</h6>
							<div class="controls">
								<input type="file" name="image" class="form-control" disabled >
								<img width="50px" height="50px" src="{{ asset($employee->image) }}" alt="{{ $employee->name }}">
							</div>
						</div>
						
					</div> <!-- end col md 4 -->

					@if ($employee->consent == 1)
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="1" checked id="fcustomCheck1" name="status" disabled>
						<label class="custom-control-label" for="customCheck1">Consent to reveive SMS</label>
					  </div>
					@else
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="1" id="fcustomCheck1" name="status" disabled>
						<label class="custom-control-label" for="customCheck1">Consent to reveive SMS</label>
					  </div>
						
					@endif
					


				</div> <!-- end last row  -->
				 
						{{-- <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Employee">
						</div>
					 --}}

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