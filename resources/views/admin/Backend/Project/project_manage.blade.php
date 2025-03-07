@extends('admin.aDashboard')
@section('admins')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 {{-- TRIAL START --}}
 <div class="container-fluid">

	<a href="{{ route('project.view') }}" class="btn bg-gradient-success">Add Project</a>

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
											<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">Project ID</th>
											<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white text-start">Project Name</th>
											<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">Assigned To
												<select id="projectNames">
													<option value="">All Employees</option>
													@php
														$uniqueNames = [];
													@endphp
													@foreach($products as $item)
														@if (!in_array($item->admin->name, $uniqueNames))
															<option value="{{ $item->admin->name }}">{{ $item->admin->name }}</option>
															@php
																$uniqueNames[] = $item->admin->name;
															@endphp
														@endif
													@endforeach
												</select>
											</th>
											<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">Assign Date</th>
											<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">Made By</th>
											<th width=15% class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">Action</th>
																	 
										</tr>
									</thead>
									<tbody>

			

				 @foreach($products as $item)
				 <tr class="align-middle text-center text-sm">
					
					<td><a style="color: rgb(16, 71, 189)" href="{{ route('project.view.details',$item->id) }}">{{ $item->project_id }}</a></td>

					<td class="text-start"><a style="color: rgb(16, 71, 189)" href="{{ route('project.view.details',$item->id) }}">{{ $item->project_name }} <span class="badge badge-sm bg-gradient-success"> {{ $item->tasks->count() }}</span></a>
						{{-- <p class="mb-0 text-sm"></p> --}}
						{{-- <p>Number of tasks: {{ $item->tasks->count() }}</p> --}}
						
							@foreach ($item->tasks as $task)
								{{ $task->name }}
							@endforeach
						
					</td>
					
					<td><h6 class="mb-0 text-sm">{{ $item->admin->name }}</h6></td>
					
					<td><h6 class="mb-0 text-sm">{{ date('m/d/Y', strtotime($item->assign_date)) }}</h6></td>

					@if ($item->made_by == NULL)
					<td><h6 class="mb-0 text-sm">--</h6></td>
					@else
					<td><h6 class="mb-0 text-sm">{{ $item->made_by->name }}</h6></td>
					@endif
					
					
					
					
					<td>
					
			 <a class="btn btn-link text-dark px-0 mb-0" href="{{ route('project.view.details',$item->id) }}"><i class="fa-solid fa-eye text-dark me-2" aria-hidden="true"></i></a>	
			 
			 <a class="btn btn-link text-dark px-0 mb-0" href="{{ route('project.edit',$item->id) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i></a>

			 <a class="btn btn-link text-danger text-gradient px-0 mb-0" href="{{ route('projects.delete',$item->id) }}" onclick="return confirm('Are you sure you want to delete this Course')"><i class="fa-solid fa-trash text-dark me-2"></i></a>

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
				"lengthMenu": [[10, 25, 50, 100, 500], [10, 25, 50, 100, 500]],
			});

			$('#projectNames').on('change', function () {
				table.column(2).search($(this).val()).draw();
			});
		});
	</script>

@endsection