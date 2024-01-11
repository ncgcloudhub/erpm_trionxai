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

<form method="post" action="{{ route('supplier.store') }}">
@csrf
   
<div class="form-group">
<label  class="text-uppercase text-dark text-xs font-weight-bold ">Vendor Name<span class="text-danger">*</span></label>
<div class="controls">
<input type="text"  name="vendor_name" class="form-control" required > 

</div>
</div>


<div class="form-group">
<label  class="text-uppercase text-dark text-xs font-weight-bold ">Vendor Service Name<span class="text-danger">*</span></label>
<div class="controls">
<input type="text"  name="vendor_s_name" class="form-control" required > 

</div>
</div>


<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Price<span class="text-danger">*</span></label>
	<div class="controls">
		<input type="text"  name="price" class="form-control" id="feesInput" required > 
	</div>
</div>

<div class="form-group">
    <label class="text-uppercase text-dark text-xs font-weight-bold">Email <span class="text-danger">*</span></label>
    <div class="controls">
        <input type="email" name="email" class="form-control" required>
    </div>
</div>


<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Contact<span class="text-danger">*</span> </label>
<div class="controls">
<input type="text"  name="contact" class="form-control" pattern="\d*" title="Please enter only numeric values" required > 
</div>
</div>



</div>
{{-- end column --}}

<div class="col">


	<div class="form-group">
		<label  class="text-uppercase text-dark text-xs font-weight-bold ">Address <span class="text-danger">*</span></label>
	<div class="controls">
	<input type="text" name="address" class="form-control" required>
	
	</div>
	</div>
	
	<div class="form-group">
		<label  class="text-uppercase text-dark text-xs font-weight-bold ">City <span class="text-danger">*</span></label>
	<div class="controls">
	<input type="text" name="city" class="form-control" required>
	
	</div>
	</div>
	
	<div class="form-group">
		<label  class="text-uppercase text-dark text-xs font-weight-bold ">State <span class="text-danger">*</span></label>
	<div class="controls">
	<input type="text" name="state" class="form-control" required>
	
	</div>
	</div>
	
	<div class="form-group">
		<label class="text-uppercase text-dark text-xs font-weight-bold">Zip <span class="text-danger">*</span></label>
		<div class="controls">
			<input type="text" name="zip" class="form-control" pattern="\d{5}" title="Enter a valid 5-digit zip code" required>
		</div>
	</div>
	
	
	<div class="form-group">
		<label  class="text-uppercase text-dark text-xs font-weight-bold ">Country <span class="text-danger">*</span></label>
	<div class="controls">
	<input type="text" name="country" class="form-control" required>
	
	</div>
	</div>



{{-- <div class="text-xs-right"> --}}
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Vendor">					 
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

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
</script>


@endsection