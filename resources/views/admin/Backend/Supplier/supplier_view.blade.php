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


<input type="hidden" name="id" value="{{$supplier->id}}">   
<div class="form-group">
<label  class="text-uppercase text-dark text-xs font-weight-bold ">Vendor Name<span class="text-danger">*</span></label>
<div class="controls">
<input type="text" value="{{$supplier->vendor_name}}"  name="vendor_name" class="form-control" readonly > 
</div>
</div>

<div class="form-group">
<label  class="text-uppercase text-dark text-xs font-weight-bold ">Vendor Service Name <span class="text-danger">*</span></label>
<div class="controls">
<input type="text" value="{{$supplier->vendor_s_name}}"  name="vendor_s_name" class="form-control" readonly > 
</div>
</div>


<div class="form-group">
    <label class="text-uppercase text-dark text-xs font-weight-bold">Price <span class="text-danger">*</span></label>
    <div class="controls">
        <input type="text" value="{{$supplier->price}}" name="price" class="form-control" readonly>
    </div>
</div>


<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Email <span class="text-danger">*</span></label>
<div class="controls">
<input type="email" value="{{$supplier->email}}" name="email" class="form-control" readonly >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Contact <span class="text-danger">*</span></label>
<div class="controls">
<input type="text" value="{{$supplier->contact}}" name="contact" class="form-control" readonly >

</div>
</div>

</div>
{{-- End Col --}}

<div class="col">



<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Address <span class="text-danger">*</span></label>
<div class="controls">
<input type="text" value="{{$supplier->address}}" name="address" class="form-control" readonly >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">City <span class="text-danger">*</span></label>
<div class="controls">
<input type="text" value="{{$supplier->city}}" name="city" class="form-control" readonly >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">State <span class="text-danger">*</span></label>
<div class="controls">
<input type="text" value="{{$supplier->state}}" name="state" class="form-control" readonly >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Zip <span class="text-danger">*</span></label>
<div class="controls">
<input type="text" value="{{$supplier->zip}}" name="zip" class="form-control" pattern="\d{5}" title="Enter a valid 5-digit zip code" readonly >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Country <span class="text-danger">*</span></label>
<div class="controls">
<input type="text" value="{{$supplier->country}}" name="country" class="form-control" readonly >

</div>
</div>


		</div>
		{{-- End Col --}}

       </div>


</div>

</div>



{{-- TRIAL END --}}

    </div>
    @include('admin.body.footer')
  </div>
@endsection