@extends('admin.aDashboard')
@section('admins')

 {{-- TRIAL START --}}
 <div class="container-fluid">
	<div class="row mt-4">
	 

{{-- ADD Student --}}
<div class="col-lg-12 mb-lg-0 mb-4">
  <div class="card">
    <div class="card-body p-3">
      <div class="row">

		<div class="col">

<form method="post" action="{{ route('student.store') }}">
@csrf
   
<div class="form-group">
<label  class="text-uppercase text-dark text-xs font-weight-bold ">Student Name (FN MN LN) <span class="text-danger">*</span></label>
<div class="controls">
<input type="text"  name="student_name" class="form-control" required > 

</div>
</div>

{{-- <div class="form-group">
<label  class="text-uppercase text-dark text-xs font-weight-bold ">Student ID <span class="text-danger">*</span></label>
<div class="controls">
<input type="text"  name="student_id" class="form-control" required > 

</div>
</div> --}}

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Gender <span class="text-danger">*</span></label>
<div class="controls">
	<select name="gender" class="form-control" required="" >
		<option value="" selected="" disabled="">Select an Option</option>
		<option value="male">Male</option>
		<option value="female" >Female</option>
		
	</select>
</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Date of Birth <span class="text-danger">*</span></label>
<div class="controls">
<input type="date"  name="dob" class="form-control" required > 
</div>
</div>

	
<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Email <span class="text-danger">*</span></label>
<div class="controls">
<input type="email" name="email" class="form-control" required >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Enrolled In <span class="text-danger">*</span></label>
<div class="controls">
<input type="date"  name="enrolled_in" class="form-control" required > 
</div>
</div>

</div>
{{-- end column --}}

<div class="col">


<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Phone <span class="text-danger">*</span></label>
<div class="controls">
<input type="text" name="phone" class="form-control" required >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Address <span class="text-danger">*</span></label>
<div class="controls">
<input type="text" name="address" class="form-control" required >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">City <span class="text-danger">*</span></label>
<div class="controls">
<input type="text" name="city" class="form-control" required >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">State <span class="text-danger">*</span></label>
<div class="controls">
<input type="text" name="state" class="form-control" required >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Zip <span class="text-danger">*</span></label>
<div class="controls">
<input type="text" name="zip" class="form-control" pattern="\d{5}" title="Enter a valid 5-digit zip code" required >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Country <span class="text-danger">*</span></label>
<div class="controls">
<input type="text" name="country" class="form-control" required >

</div>
</div>

{{-- <div class="text-xs-right"> --}}
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Student">					 
	{{-- </div> --}}


</div>{{-- end column --}}



       </div>
</form>

</div>

</div>



{{-- TRIAL END --}}

    </div>
    @include('admin.body.footer')
  </div>
@endsection