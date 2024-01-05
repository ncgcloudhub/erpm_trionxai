@extends('admin.aDashboard')
@section('admins')

 {{-- TRIAL START --}}
 <div class="container-fluid">
	<div class="row mt-4">
	 

{{-- Edit Student --}}
<div class="col-lg-12 mb-lg-0 mb-4">
  <div class="card">
    <div class="card-body p-3">
      <div class="row">

		<div class="col">

<form method="post" action="{{ route('student.update') }}">
@csrf
<input type="hidden" name="id" value="{{$student->id}}">   
<div class="form-group">
<label  class="text-uppercase text-dark text-xs font-weight-bold ">Student Name (FN MN LN) <span class="text-danger">*</span></label>
<div class="controls">
<input type="text" value="{{$student->student_name}}"  name="student_name" class="form-control" required > 
</div>
</div>

<div class="form-group">
<label  class="text-uppercase text-dark text-xs font-weight-bold ">Student ID <span class="text-danger">*</span></label>
<div class="controls">
<input type="text" value="{{$student->student_id}}"  name="student_id" class="form-control" readonly > 
</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Gender <span class="text-danger">*</span></label>
<div class="controls">
<select name="gender" class="form-control" required="" >
	<option value="{{$student->gender}}" selected="">{{$student->gender}}</option>
	<option value="male">Male</option>
	<option value="female" >Female</option>
	
</select>
</div>
</div>

<div class="form-group">
    <label class="text-uppercase text-dark text-xs font-weight-bold">Date Of Birth <span class="text-danger">*</span></label>
    <div class="controls">
        <input type="date" value="{{$student->dob}}" name="dob" class="form-control" required>
    </div>
</div>


<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Email <span class="text-danger">*</span></label>
<div class="controls">
<input type="email" value="{{$student->email}}" name="email" class="form-control" required >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Enrolled In <span class="text-danger">*</span></label>
<div class="controls">
<input type="date" value="{{$student->enrolled_in}}" name="enrolled_in" class="form-control" required >

</div>
</div>

</div>
{{-- End Col --}}

<div class="col">

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Phone <span class="text-danger">*</span></label>
<div class="controls">
<input type="text" value="{{$student->phone}}" name="phone" class="form-control" required >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Address <span class="text-danger">*</span></label>
<div class="controls">
<input type="text" value="{{$student->address}}" name="address" class="form-control" required >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">City <span class="text-danger">*</span></label>
<div class="controls">
<input type="text" value="{{$student->city}}" name="city" class="form-control" required >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">State <span class="text-danger">*</span></label>
<div class="controls">
<input type="text" value="{{$student->state}}" name="state" class="form-control" required >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Zip <span class="text-danger">*</span></label>
<div class="controls">
<input type="text" value="{{$student->zip}}" name="zip" class="form-control" pattern="\d{5}" title="Enter a valid 5-digit zip code" required >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Country <span class="text-danger">*</span></label>
<div class="controls">
<input type="text" value="{{$student->country}}" name="country" class="form-control" required >

</div>
</div>


{{-- <div class="text-xs-right"> --}}
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Student">					 
         {{-- </div> --}}

		</div>
		{{-- End Col --}}

       </div>
</form>

</div>

</div>



{{-- TRIAL END --}}

    </div>
    @include('admin.body.footer')
  </div>
@endsection