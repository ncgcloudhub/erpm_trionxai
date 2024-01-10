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
											
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-start">Project Name</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Assign To</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Assign Date</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
																	 
										</tr>
									</thead>
									<tbody>

			

				 @foreach($products as $item)
				 <tr class="align-middle text-center text-sm">
					
					<td class="text-start"><a href="{{ route('project.view.details',$item->id) }}">{{ $item->project_name }} <span class="badge badge-sm bg-gradient-success"> {{ $item->tasks->count() }}</span></a>
						{{-- <p class="mb-0 text-sm"></p> --}}
						{{-- <p>Number of tasks: {{ $item->tasks->count() }}</p> --}}
						
							@foreach ($item->tasks as $task)
								{{ $task->name }}
							@endforeach
						
					</td>
					
					<td><h6 class="mb-0 text-sm">{{ $item->admin->name }}</h6></td>
					
					<td><h6 class="mb-0 text-sm">{{ $item->assign_date }}</h6></td>
					
					
					
					<td>
					
			 <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('project.view.details',$item->id) }}"><i class="fa-solid fa-eye text-dark me-2" aria-hidden="true"></i>View</a>	
			 
			 <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('project.edit',$item->id) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>

			 <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="{{ route('projects.delete',$item->id) }}" onclick="return confirm('Are you sure you want to delete this Course')"><i class="fa-solid fa-trash text-dark me-2"></i>Delete</a>

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