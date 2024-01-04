@extends('admin.aDashboard')
@section('admins')

 {{-- TRIAL START --}}
 <div class="container-fluid">
	<div class="row mt-4">
	  <div class="col-lg-8 mb-lg-0 mb-4">
		<div class="card">
		  <div class="card-body p-3">
			<div class="row">
							<!-- /.box-header -->
							{{-- <div class="box-body"> --}}
								<div class="table-responsive">
								  <table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
										
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address </th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
											 
										</tr>
									</thead>
									<tbody>
            
 @foreach($students as $item)
 <tr>
  <td>{{ $item->user_name }}</td>
  <td>{{ $item->address }}</td>
  <td>{{ $item->email }}</td>
  <td>{{ $item->phone }}</td>
  <td>
<a href="{{ route('customer.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
{{-- <a href="{{ route('brand.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
 <i class="fa fa-trash"></i></a> --}}
  </td>
             
 </tr>
  @endforeach
</tbody>
									 
</table>
</div>
{{-- </div> --}}
</div>
</div>
</div>
</div>

{{-- ADD Student --}}
<div class="col-lg-4 mb-lg-0 mb-4">
  <div class="card">
    <div class="card-body p-3">
      <div class="row">

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

       </div>
</form>

</div>

</div>



{{-- TRIAL END --}}

    </div>
    @include('admin.body.footer')
  </div>
@endsection