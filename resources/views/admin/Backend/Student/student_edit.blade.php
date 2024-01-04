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
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email Price</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone %</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
											 
										</tr>
									</thead>
									<tbody>
            
 @foreach($students as $item)
 <tr>
  <td>{{ $item->student_name }}</td>
  <td>{{ $item->student_id }}</td>
  <td>{{ $item->email }}</td>
  <td>{{ $item->phone }}</td>
  <td>
<a href="{{ route('student.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
<a href="{{ route('brand.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
 <i class="fa fa-trash"></i></a>
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

{{-- ADD CUSTOMER --}}
<div class="col-lg-4 mb-lg-0 mb-4">
  <div class="card">
    <div class="card-body p-3">
      <div class="row">

<form method="post" action="{{ route('student.update') }}">
@csrf
<input type="hidden" name="id" value="{{$student->id}}">   
<div class="form-group">
<label  class="text-uppercase text-dark text-xs font-weight-bold ">Student Name</label>
<div class="controls">
<input type="text" value="{{$student->student_name}}"  name="student_name" class="form-control" > 
</div>
</div>

<div class="form-group">
<label  class="text-uppercase text-dark text-xs font-weight-bold ">Student ID</label>
<div class="controls">
<input type="text" value="{{$student->student_id}}"  name="student_id" class="form-control" > 
</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Gender</label>
<div class="controls">
<select name="gender" class="form-control" required="" >
	<option value="{{$student->gender}}" selected="">{{$student->gender}}</option>
	<option value="male">Male</option>
	<option value="female" >Female</option>
	
</select>
</div>
</div>

<div class="form-group">
    <label class="text-uppercase text-dark text-xs font-weight-bold">Date Of Birth</label>
    <div class="controls">
        <input type="date" value="{{$student->dob}}" name="dob" class="form-control">
    </div>
</div>


<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Email</label>
<div class="controls">
<input type="text" value="{{$student->email}}" name="email" class="form-control" >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Enrolled In</label>
<div class="controls">
<input type="date" value="{{$student->enrolled_in}}" name="enrolled_in" class="form-control" >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Phone</label>
<div class="controls">
<input type="text" value="{{$student->phone}}" name="phone" class="form-control" >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Address</label>
<div class="controls">
<input type="text" value="{{$student->address}}" name="address" class="form-control" >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">City</label>
<div class="controls">
<input type="text" value="{{$student->city}}" name="city" class="form-control" >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">State</label>
<div class="controls">
<input type="text" value="{{$student->state}}" name="state" class="form-control" >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Zip</label>
<div class="controls">
<input type="text" value="{{$student->zip}}" name="zip" class="form-control" >

</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Country</label>
<div class="controls">
<input type="text" value="{{$student->country}}" name="country" class="form-control" >

</div>
</div>


{{-- <div class="text-xs-right"> --}}
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Student">					 
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