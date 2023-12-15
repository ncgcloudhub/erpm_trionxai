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
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Designation</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Department</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Blood Group</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone No.</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
										
										</tr>
									</thead>
									<tbody>

				 @foreach($employees as $item)
				 <tr class="align-middle text-center text-sm">
					<td><img src="{{ asset($item->image) }}" style="width: 50px; height: 60px;"> </td>
					<td><p class="mb-0 text-sm">{{ $item->f_name }} {{$item->l_name}}</p></td>
					<td><h6 class="mb-0 text-sm">{{ $item->designation->designation }}</h6></td>
					<td><h6 class="mb-0 text-sm">{{ $item->department->department }}</h6></td>
					<td><h6 class="mb-0 text-sm">{{ $item->b_group }}</h6></td>
					<td><h6 class="mb-0 text-sm">{{ $item->phone }}</h6></td>
										
					<td>
						@if(Auth::guard('admin')->user()->type=="1")
			 <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('employee.edit',$item->id) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
			 
			 {{-- <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="{{ route('conveyance.delete',$item->id) }}" onclick="return confirm('Are you sure you want to delete this item')"><i class="fa-solid fa-trash text-dark me-2"></i>Delete</a> --}}
			 @endif	
					</td>
							 
				 </tr>
				  @endforeach
				  <tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				  </tr>

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