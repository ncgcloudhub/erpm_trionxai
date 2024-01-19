@extends('admin.aDashboard')
@section('admins')

 {{-- TRIAL START --}}
 <div class="container-fluid">
	<a href="{{route('import.tax.customers')}}" class="btn bg-gradient-warning">Import</a>
	<a href="{{ route('export.tax.customers') }}" class="btn bg-gradient-info">Export</a>
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
										<tr class="align-middle text-center">
										
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-start">Name</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Company Name </th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Personal Phone</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">SSN</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
											 
										</tr>
									</thead>
									<tbody>
            
 @foreach($customers as $item)
 <tr class="align-middle text-center text-sm">
  <td class="text-start"><a href="{{ route('customer.view',$item->id) }}">{{ $item->user_name }}</a></td>
  <td>{{ $item->company_name }}</td>
  <td>{{ $item->email }}</td>
  <td>{{ $item->personal_phone }}</td>
  <td>{{ $item->ssn }}</td>
  <td>


<a class="btn btn-link text-dark px-3 mb-0" href="{{ route('customer.view',$item->id) }}"><i class="fa-solid fa-eye text-dark me-2" aria-hidden="true"></i>View</a>	
			 
<a class="btn btn-link text-dark px-3 mb-0" href="{{ route('customer.edit',$item->id) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>

<a class="btn btn-link text-danger text-gradient px-3 mb-0" href="{{ route('customer.delete',$item->id) }}" onclick="return confirm('Are you sure you want to delete this Customer')"><i class="fa-solid fa-trash text-dark me-2"></i>Delete</a>
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