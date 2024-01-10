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


<input type="hidden" name="id" value="{{$customer->id}}">   
<div class="form-group">
<label  class="text-uppercase text-dark text-xs font-weight-bold ">Company Name</label>
<div class="controls">
<input type="text" value="{{$customer->company_name}}"  name="company_name" class="form-control" readonly > 
</div>
</div>

<div class="form-group">
<label  class="text-uppercase text-dark text-xs font-weight-bold ">User Name <span class="text-danger">*</span></label>
<div class="controls">
<input type="text" value="{{$customer->user_name}}"  name="user_name" class="form-control" readonly> 
</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Email <span class="text-danger">*</span></label>
<div class="controls">
<input type="email" value="{{$customer->email}}" name="email" class="form-control" readonly> 
</div>
</div>

<div class="form-group">
    <label class="text-uppercase text-dark text-xs font-weight-bold">Office Phone <span class="text-danger">*</span></label>
    <div class="controls">
        <input type="text" value="{{$customer->office_phone}}" name="office_phone" class="form-control" pattern="\d*" title="Please enter only numeric values" readonly>
    </div>
</div>

<div class="form-group">
    <label class="text-uppercase text-dark text-xs font-weight-bold">personal Phone <span class="text-danger">*</span></label>
    <div class="controls">
        <input type="text" value="{{$customer->personal_phone}}" name="personal_phone" class="form-control" pattern="\d*" title="Please enter only numeric values" readonly>
    </div>
</div>

</div>
{{-- end col --}}

<div class="col">

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Address <span class="text-danger">*</span></label>
<div class="controls">
<input type="text" value="{{$customer->address}}" name="address" class="form-control" readonly>

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">City <span class="text-danger">*</span></label>
<div class="controls">
<input type="text" value="{{$customer->city}}" name="city" class="form-control" readonly>

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">State <span class="text-danger">*</span></label>
<div class="controls">
<input type="text" value="{{$customer->state}}" name="state" class="form-control" readonly >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Zip <span class="text-danger">*</span></label>
<div class="controls">
<input type="text" value="{{$customer->zip}}" name="zip" class="form-control" pattern="\d{5}" title="Enter a valid 5-digit zip code" readonly >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Country <span class="text-danger">*</span></label>
<div class="controls">
<input type="text" value="{{$customer->country}}" name="country" class="form-control" readonly >

</div>
</div>


{{-- <div class="text-xs-right"> --}}
				 
         {{-- </div> --}}

		</div>
		{{-- end col --}}

       </div>


</div>

</div>



{{-- TRIAL END --}}

    </div>
    @include('admin.body.footer')
  </div>
@endsection