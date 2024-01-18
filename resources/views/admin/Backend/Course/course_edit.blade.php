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

<form method="post" action="{{ route('course.update') }}">
@csrf
<input type="hidden" name="id" value="{{$course->id}}">  

<div class="form-group">
<label  class="text-uppercase text-dark text-xs font-weight-bold ">Course Name<span class="text-danger">*</span></label>
<div class="controls">
<input type="text" value="{{$course->course_name}}" name="course_name" class="form-control" required > 

</div>
</div>


<div class="form-group">
<label  class="text-uppercase text-dark text-xs font-weight-bold ">Course Code<span class="text-danger">*</span></label>
<div class="controls">
<input type="text" value="{{$course->code}}" name="code" class="form-control" required > 

</div>
</div>


<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Course Description</label>
	<div class="controls">
		<textarea value="{{$course->description}}" name="description" class="form-control" id="tinymceExample" rows="10">{{$course->description}}</textarea>	
	</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Course Type<span class="text-danger">*</span></label>
<div class="controls">
<input type="text" value="{{$course->type}}" name="type" class="form-control" required > 
</div>
</div>

	
<div class="form-group">
	<label class="text-uppercase text-dark text-xs font-weight-bold">Course Fees <span class="text-danger">*</span></label>
	<div class="controls">
	  <input type="text" value="{{$course->fees}}" name="fees" class="form-control" required>
	</div>
  </div>
  

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Course Discounted Fees </label>
<div class="controls">
	<input type="text" value="{{$course->discounted_fees}}" name="discounted_fees" class="form-control" > 
</div>
</div>

</div>
{{-- end column --}}

<div class="col">


<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Course Difficulty <span class="text-danger">*</span></label>
<div class="controls">
<input type="text" value="{{$course->difficulty}}" name="difficulty" class="form-control" required >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Course Duration<span class="text-danger">*</span></label>
<div class="controls">
<input type="text" value="{{$course->duration}}" name="duration" class="form-control" required >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Prerequisites </label>
<div class="controls">
<input type="text" value="{{$course->prerequisites}}" name="prerequisites" class="form-control"  >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Learning Objectives/Outcomes </label>
<div class="controls">
<input type="text" value="{{$course->objectives}}" name="objectives" class="form-control"  >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Additional Notes/Comments </label>
<div class="controls">
<input type="text" value="{{$course->comments}}" name="comments" class="form-control"  >

</div>
</div>


{{-- <div class="text-xs-right"> --}}
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Course">					 
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