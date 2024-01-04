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
<label  class="text-uppercase text-dark text-xs font-weight-bold ">Student Name</label>
<div class="controls">
<input type="text"  name="student_name" class="form-control" > 

</div>
</div>

<div class="form-group">
<label  class="text-uppercase text-dark text-xs font-weight-bold ">Student ID</label>
<div class="controls">
<input type="text"  name="student_id" class="form-control" required > 

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Gender</label>
<div class="controls">
	<select name="gender" class="form-control" required="" >
		<option value="" selected="" disabled="">Select an Option</option>
		<option value="male">Male</option>
		<option value="female" >Female</option>
		
	</select>
</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Date of Birth</label>
<div class="controls">
<input type="date"  name="dob" class="form-control"> 
</div>
</div>

	
<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Email</label>
<div class="controls">
<input type="text" name="email" class="form-control" >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Enrolled In</label>
<div class="controls">
<input type="date"  name="enrolled_in" class="form-control"> 
</div>
</div>

</div>
{{-- end column --}}

<div class="col">


<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Phone</label>
<div class="controls">
<input type="text" name="phone" class="form-control" >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Address</label>
<div class="controls">
<input type="text" name="address" class="form-control" >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">City</label>
<div class="controls">
<input type="text" name="city" class="form-control" >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">State</label>
<div class="controls">
<input type="text" name="state" class="form-control" >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Zip</label>
<div class="controls">
<input type="text" name="zip" class="form-control" >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Country</label>
<div class="controls">
<input type="text" name="country" class="form-control" >

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