@extends('admin.aDashboard')
@section('admins')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <div class="container-fluid">

	<a href="{{ route('project.add.task') }}" class="btn bg-gradient-success">Add Project Task</a>

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
											<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">Project Ticket ID</th>
											<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white text-start">Task Name</th>
											<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">Project Name
												<select id="projectFilter">
													<option value="">All Projects</option>
													@php
														$uniqueProjects = [];
													@endphp
													@foreach($products as $item)
														@if (!in_array($item->category->project_name, $uniqueProjects))
															<option value="{{ $item->category->project_name }}">{{ $item->category->project_name }}</option>
															@php
																$uniqueProjects[] = $item->category->project_name;
															@endphp
														@endif
													@endforeach
												</select>
											</th>
											<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">Assign To
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
											<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">Status
												<select id="statusFilter">
													<option value="">All</option>
													<option value="On Progress">On Progress</option>
													<option value="Done">Done</option>
													<option value="Not Started">Not Started</option>
												</select>
											</th>
											<th width=15% class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">Action</th>
																	 
										</tr>
									</thead>
									<tbody>

			

				 @foreach($products as $item)
				 <tr class="align-middle text-center text-sm">
					
					<td><a style="color: rgb(16, 71, 189)" href="{{ route('project.task.view',$item->id) }}">{{ $item->project_task_id }}</a></td>

					<td><a style="color: rgb(16, 71, 189)" href="{{ route('project.task.view',$item->id) }}"><p class="mb-0 text-sm text-start">{{ $item->task_name }}</p></a></td>
					<td><h6 class="mb-0 text-sm">{{ $item->project->project_name }}</h6></td>
					<td><h6 class="mb-0 text-sm">{{ $item->admin->name }}</h6></td>
					
					<td><h6 class="mb-0 text-sm">{{ $item->assign_date }}</h6></td>
					
					@if ($item->made_by == NULL)
					<td><h6 class="mb-0 text-sm">--</h6></td>
					@else
					<td><h6 class="mb-0 text-sm">{{ $item->made_by->name }}</h6></td>
					@endif

					@if ($item->status == 'Done')
						<td class="align-middle text-center text-sm">
						  <span class="badge badge-sm bg-gradient-success">{{$item->status}}</span>
						</td>
						@elseif($item->status == 'On Progress')
						<td class="align-middle text-center text-sm">
						  <span class="badge badge-sm bg-gradient-info">{{$item->status}}</span>
						</td>
						@else
						<td class="align-middle text-center text-sm">
						  <span class="badge badge-sm bg-gradient-danger">{{$item->status}}</span>
						</td>
					@endif

					{{-- <td><h6 class="mb-0 text-sm">{{ $item->status }}</h6></td> --}}
					
					<td>
						<a class="btn btn-link text-dark px-0 mb-0" href="{{ route('project.task.view',$item->id) }}"><i class="fa-solid fa-eye text-dark me-2" aria-hidden="true"></i></a>
						
			 <a class="btn btn-link text-dark px-0 mb-0" href="{{ route('project.task.edit',$item->id) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i></a>		
			
			 <a class="btn btn-link text-danger text-gradient px-0 mb-0" href="{{ route('projects.tasks.deletes',$item->id) }}" onclick="return confirm('Are you sure you want to delete this Student')"><i class="fa-solid fa-trash text-dark me-2"></i></a>

			
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

	<script>
		$(document).ready(function () {
			var table = $('#example1').DataTable({
				"lengthMenu": [[50, 100, 500], [50, 100, 500]],
			});
	
			$('#statusFilter').on('change', function () {
				table.column(6).search($(this).val()).draw();
			});
	
			$('#projectFilter').on('change', function () {
				console.log('Selected Project: ' + $(this).val());
				table.column(2).search($(this).val()).draw();
			});

			$('#projectNames').on('change', function () {
				table.column(3).search($(this).val()).draw();
			});
		});
	</script>


@endsection