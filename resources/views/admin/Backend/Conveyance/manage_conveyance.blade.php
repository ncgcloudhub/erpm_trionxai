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
										<tr class="align-middle text-center">
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sl.</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employee</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Designation</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Supporting Employee</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Grand Total</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Approved By</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
											 
										</tr>
									</thead>
									<tbody>
			@php
				$sl = 1;
			@endphp

	@foreach($conveyances as $item)
	<tr class="align-middle text-center text-sm">
	   <td width="5%"><h6 class="mb-0 text-sm "> {{ $sl++ }}</h6></td>
	   <td><p class="mb-0 text-sm">{{ $item->date }}</p></td>
	   <td><h6 class="badge badge-sm bg-gradient-info">{{ $item->employee->f_name }} {{ $item->employee->l_name }}</h6></td>
	   <td class="text-sm font-weight-bold mb-0">{{ $item->employee->designation->designation }}</td>
	   <td class="text-sm font-weight-bold mb-0">{{ $item->s_employee }}</td>
	   <td class="text-sm font-weight-bold mb-0">TK {{ $item->grand_total }} </td>
	   {{-- <td><h6 class="badge badge-sm bg-gradient-success"> {{ $item->user->name }}</h6></td> --}}
	   
	   @if ($item->status == "Pending")
	   <td><h6 class="badge badge-sm bg-gradient-danger"> {{ $item->status }}</h6></td>
	   <td><h6 class="badge badge-sm bg-gradient-danger">--</h6></td>
	   @else
	   <td><h6 class="badge badge-sm bg-gradient-success"> {{ $item->status }}</h6></td>
	   <td><h6 class="badge badge-sm bg-gradient-primary"> {{ $item->approve->name }}</h6></td>
	   @endif
	   
	   <td width="20%">
		   <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('conveyance.details.view', $item->id) }}"><i class="fa-solid fa-eye text-dark me-2" aria-hidden="true"></i>View</a>
	   
		   @if ($item->status == "Approved")
			   
		   @else
		   @if(Auth::guard('admin')->user()->type=="1" || (Auth::guard('admin')->user()->type=="2") || (Auth::guard('admin')->user()->type=="3"))
		   {{-- <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('conveyance.approve',$item->id) }}"><i class="fa fa-thumbs-up text-dark me-2"></i>Approve</a> --}}
		   <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('conveyance.edit',$item->id) }}"><i class="fa fa-pencil text-dark me-2"></i>Edit</a>
		   <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="{{ route('conveyance.delete',$item->id) }}" onclick="return confirm('Are you sure you want to delete this item')"><i class="fa-solid fa-trash text-dark me-2"></i>Delete</a>
		   @else
		   @endif
		   @endif

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

@include('admin.body.footer')

{{-- TRIAL END --}}


@endsection