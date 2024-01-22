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
										<tr style="background-color: rgba(37, 163, 20, 0.863)" class="align-middle text-center">
											
											<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white text-start">Name</th>
											<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">Designation</th>
											<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">Department</th>
											<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">Employee Type</th>
											<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">Phone No.</th>
											<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">Action</th>
										
										</tr>
									</thead>
									<tbody>

				 @foreach($employees as $item)
				 <tr class="align-middle text-center text-sm">
				
					<td class="text-start"><a style="color: rgb(16, 71, 189)" href="{{ route('employee.view',$item->id) }}"><p class="mb-0 text-sm">{{ $item->f_name }} {{$item->l_name}}</p></a></td>
					<td><h6 class="mb-0 text-sm">{{ $item->designation->designation }}</h6></td>
					<td><h6 class="mb-0 text-sm">{{ $item->department->department }}</h6></td>
					<td><h6 class="mb-0 text-sm">{{ $item->employee_type }}</h6></td>
					<td><h6 class="mb-0 text-sm">{{ $item->phone }}</h6></td>
										
					<td>
						
						<a class="btn btn-link text-dark px-3 mb-0" href="{{ route('employee.view',$item->id) }}"><i class="fa-solid fa-eye text-dark me-2" aria-hidden="true"></i>View</a>	
			
						<a class="btn btn-link text-dark px-3 mb-0" href="{{ route('employee.edit',$item->id) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>

						<a class="btn btn-link text-danger text-gradient px-3 mb-0" href="{{ route('employees.deletes',$item->id) }}" onclick="return confirm('Are you sure you want to delete this Employee')"><i class="fa-solid fa-trash text-dark me-2"></i>Delete</a>
			
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