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

<form method="post" action="{{ route('course.store') }}">
@csrf
   
<div class="form-group">
<label  class="text-uppercase text-dark text-xs font-weight-bold ">Course Name<span class="text-danger">*</span></label>
<div class="controls">
<input type="text"  name="course_name" class="form-control" required > 

</div>
</div>


<div class="form-group">
<label  class="text-uppercase text-dark text-xs font-weight-bold ">Course Code<span class="text-danger">*</span></label>
<div class="controls">
<input type="text"  name="code" class="form-control" required > 

</div>
</div>


<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Course Description</label>
	<div class="controls">
		<textarea name="description" class="form-control"  id="tinymceExample" rows="10"></textarea>	
	</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Course Type<span class="text-danger">*</span></label>
<div class="controls">
<input type="text"  name="type" class="form-control" required > 
</div>
</div>

	
<div class="form-group">
	<label class="text-uppercase text-dark text-xs font-weight-bold">Course Fees <span class="text-danger">*</span></label>
	<div class="controls">
	  <input type="text" name="fees" class="form-control" id="feesInput" required>
	</div>
  </div>
  

  <div class="form-group">
	<label class="text-uppercase text-dark text-xs font-weight-bold">Course Discounted Fees </label>
	<div class="controls">
	  <input type="text" name="discounted_fees" class="form-control" id="discountedFeesInput">
	</div>
  </div>
  

</div>
{{-- end column --}}

<div class="col">


<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Course Difficulty <span class="text-danger">*</span></label>
<div class="controls">
<input type="text" name="difficulty" class="form-control" required >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Course Duration<span class="text-danger">*</span></label>
<div class="controls">
<input type="text" name="duration" class="form-control" required >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Prerequisites </label>
<div class="controls">
<input type="text" name="prerequisites" class="form-control"  >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Learning Objectives/Outcomes </label>
<div class="controls">
<input type="text" name="objectives" class="form-control"  >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Additional Notes/Comments </label>
<div class="controls">
<input type="text" name="comments" class="form-control"  >

</div>
</div>



{{-- <div class="text-xs-right"> --}}
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Course">					 
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

  {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
  $(document).ready(function() {
    // Attach an event listener to the input field
    $('#feesInput').on('input', function() {
      // Get the current value of the input field
      let currentValue = $(this).val();

      // Remove any existing dollar signs
      currentValue = currentValue.replace(/\$/g, '');

      // Add a dollar sign at the beginning of the input value
      $(this).val('$' + currentValue);
    });
  });
</script> --}}

<script>
  $(document).ready(function() {
    // Attach an event listener to the discounted fees input field
    $('#discountedFeesInput').on('input', function() {
      // Get the current value of the input field
      let currentValue = $(this).val();

      // Remove any existing dollar signs
      currentValue = currentValue.replace(/\$/g, '');

      // Add a dollar sign at the beginning of the input value if it is not empty
      if (currentValue.trim() !== '') {
        $(this).val('$' + currentValue);
      } else {
        $(this).val('');
      }
    });
  });
</script>


@endsection