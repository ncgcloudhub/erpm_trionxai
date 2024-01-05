@extends('admin.aDashboard')
@section('admins')

 {{-- TRIAL START --}}
 <div class="container-fluid">
	<div class="row mt-4">



{{-- ADD CUSTOMER --}}
<div class="col-lg-12 mb-lg-0 mb-4">
  <div class="card">
    <div class="card-body p-3">
      <div class="row">

		<div class="col">

<form method="post" action="{{ route('customer.store') }}">
@csrf
   
<div class="form-group">
<label  class="text-uppercase text-dark text-xs font-weight-bold ">Company Name</label>
<div class="controls">
<input type="text"  name="company_name" class="form-control" > 

</div>
</div>

<div class="form-group">
<label  class="text-uppercase text-dark text-xs font-weight-bold ">User Name <span class="text-danger">*</span></label>
<div class="controls">
<input type="text"  name="user_name" class="form-control" required > 

</div>
</div>

<div class="form-group">
    <label class="text-uppercase text-dark text-xs font-weight-bold">Email <span class="text-danger">*</span></label>
    <div class="controls">
        <input type="email" name="email" class="form-control" required>
    </div>
</div>


<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Office Phone <span class="text-danger">*</span></label>
<div class="controls">
<input type="text"  name="office_phone" class="form-control" pattern="\d*" title="Please enter only numeric values" > 
</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Personal Phone <span class="text-danger">*</span></label>
<div class="controls">
<input type="text"  name="personal_phone" class="form-control" pattern="\d*" title="Please enter only numeric values" required> 
</div>
</div>


</div> 
{{-- end col --}}

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
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Customer">					 
         {{-- </div> --}}

       </div>
</form>

</div>

</div>



{{-- TRIAL END --}}

    </div>
    @include('admin.body.footer')
  </div>
@endsection