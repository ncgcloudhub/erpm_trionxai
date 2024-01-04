@extends('admin.aDashboard')
@section('admins')

 {{-- TRIAL START --}}
 <div class="container-fluid">
	<div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
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
                                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID </th>
                                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone</th>
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
</div>
</div>

@include('admin.body.footer')

{{-- TRIAL END --}}


@endsection