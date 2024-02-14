@extends('admin.aDashboard')
@section('admins')


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


 {{-- TRIAL START --}}
 <div class="container-fluid">
	<a href="{{route('import.tax.customers')}}" class="btn bg-gradient-warning">Import</a>
	<a href="{{ route('export.tax.customers') }}" class="btn bg-gradient-info">Export</a>
	<a href="{{ route('taxproject.manage.task') }}" class="btn bg-gradient-primary">Customer Task Manage</a>
	<a href="{{ route('customer.add') }}" class="btn bg-gradient-success">Customer Add</a>
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
										<tr style="background-color: rgba(37, 163, 20, 0.863)" class="align-middle text-center ">
											<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">Customer ID </th>
											<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-start text-white">Name</th>
											<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">Company Name </th>
											
											<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">Email</th>
											<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">Personal Phone</th>
											<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">SSN</th>
											<th width=15% class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">Action</th>
											 
										</tr>
									</thead>
									<tbody>
            
 @foreach($customers as $item)
 <tr class="align-middle text-center text-sm">
	<td><a style="color: rgb(16, 71, 189)" href="{{ route('customer.view',$item->id) }}">{{ $item->customer_id }}</a></td>
  <td class="text-start"><a style="color: rgb(16, 71, 189)" href="{{ route('customer.view',$item->id) }}">{{ $item->user_name }}</a></td>
  <td>{{ $item->company_name }}</td>
 
  <td>{{ $item->email }}</td>
  <td>{{ $item->personal_phone }}</td>
  <td>{{ $item->ssn }}</td>
  <td>


<a class="btn btn-link text-dark px-0 mb-0" href="{{ route('customer.view',$item->id) }}"><i class="fa-solid fa-eye text-dark me-2" aria-hidden="true"></i></a>	
			 
<a class="btn btn-link text-dark px-0 mb-0" href="{{ route('customer.edit',$item->id) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i></a>

<a class="btn btn-link text-danger text-gradient px-0 mb-0" href="{{ route('customer.delete',$item->id) }}" onclick="return confirm('Are you sure you want to delete this Customer')"><i class="fa-solid fa-trash text-dark me-2"></i></a>
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

<script>
    $(document).ready(function () {
        var table = $('#example1').DataTable({
            "lengthMenu": [[50, 100, 500], [50, 100, 500]],
          
        });
    });
</script>

@endsection