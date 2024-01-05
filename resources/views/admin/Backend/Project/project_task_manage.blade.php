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
											
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-start">Task Name</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Assign To</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Assign Date</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
																	 
										</tr>
									</thead>
									<tbody>

			

				 @foreach($products as $item)
				 <tr class="align-middle text-center text-sm">
					
					<td><p class="mb-0 text-sm text-start">{{ $item->task_name }}</p></td>
					<td><h6 class="mb-0 text-sm">{{ $item->admin->name }}</h6></td>
					
					<td><h6 class="mb-0 text-sm">{{ $item->assign_date }}</h6></td>
					
					
					
					<td>
						<a class="btn btn-link text-dark px-3 mb-0" href="{{ route('project.task.view',$item->id) }}"><i class="fa-solid fa-eye text-dark me-2" aria-hidden="true"></i>View</a>
						
			 <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('project.task.edit',$item->id) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>		
			 {{-- @if(Auth::guard('admin')->user()->type=="1" || (Auth::guard('admin')->user()->type=="2"))
			 <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="{{ route('product.delete',$item->id) }}"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Delete</a>
			 @endif --}}
					</td>
					
										 
				 </tr>
				  @endforeach
				  <tr>
					
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
	</div>

	@include('admin.body.footer')

	{{-- TRIAL END --}}


@endsection