@extends('admin.aDashboard')
@section('admins')


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 {{-- TRIAL START --}}
 <div class="container-fluid">
	{{-- <a href="{{route('import.tasks.customers')}}" class="btn bg-gradient-warning">Import</a> --}}
	<a href="{{ route('export.tasks.customers') }}" class="btn bg-gradient-info">Export</a>

	<a href="{{ route('customer.manage') }}" class="btn bg-gradient-primary">Customer Manage</a>
	<a href="{{ route('taxproject.add.task') }}" class="btn bg-gradient-success">Add Ticket</a>
	<div class="row mt-4">
	  <div class="col-lg-12 mb-lg-0 mb-4">
		<div class="card">
		
		  <div class="card-body p-3">
			<div class="row">
				<!-- /.box-header -->
				{{-- <div class="box-body"> --}}
				<div class="table-responsive">
					<table id="example1" class="table table-responsive table-bordered table-striped">
						<thead>
							<tr style="background-color: rgba(37, 163, 20, 0.863)" class="align-middle text-center">
								
								<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white text-start">Ticket ID</th>
								<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white text-start">Customer Name</th>
								<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">Subject</th>
								<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white text-start">Company Name</th>
								<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white" style="width: 100px; max-width: 100%;">Project Name
									<select id="projectFilter">
										<option value="">All Projects</option>
										@php
											$uniqueProjects = [];
										@endphp
										@foreach($products as $item)
											@if (!in_array($item->project->project_name, $uniqueProjects))
												<option value="{{ $item->project->project_name }}">{{ $item->project->project_name }}</option>
												@php
													$uniqueProjects[] = $item->project->project_name;
												@endphp
											@endif
										@endforeach
									</select>
								</th>
								
								<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">SSN</th>
								<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">Phone No.</th>
								<th style="width: 50px;" class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">E-Mail</th>
								
								<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">Status
									<select id="statusFilter" style="width: 100px; max-width: 100%;">
										<option value="">All</option>
										<option value="Not started">Not started</option>
										<option value="In Progress" >In Progress</option>
										<option value="In-Progress - Missing Docs" >In-Progress - Missing Docs</option>
										<option value="Not-In-Drake">Not-In-Drake</option>
										<option value="Folder Created Only">Folder Created Only</option>
										<option value="Data Entry Completed">Data Entry Completed</option>
										<option value="Get Extension">Get Extension</option>
										<option value="Estimates">Estimates</option>
										<option value="Done">Done</option>
									</select>
								</th>
								<th style="width: 50px;" class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">Payment Status</th>
								
								<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">eSignature
									<select id="eSignatureFilter" style="width: 100px; max-width: 100%;">
										<option value="">All</option>
										<option value="Not Started">Not Started</option>
										<option value="SENT">SENT</option>
										<option value="READY FOR eSIG">READY FOR eSIG</option>
										<option value="SIGNED">SIGNED</option>
										<option value="PENDING">PENDING</option>
										<option value="In Person Sign">In Person Sign</option>
									</select>
								</th>
								<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">EF STATUS
									<select id="efstatusFilter" style="width: 100px; max-width: 100%;">
										<option value="">All</option>
										<option value="DONE">DONE</option>
										<option value="READY 2 EFILE">READY 2 EFILE</option>
										<option value="IN PROGRESS">IN PROGRESS</option>
										<option value="HOLD">HOLD</option>
										<option value="ESTIMATES">ESTIMATES</option>
										<option value="NOT STARTED">NOT STARTED</option>
										<option value="REJECTED">REJECTED</option>
									</select>
								</th>
							
								
								<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">Action</th>
															
							</tr>
						</thead>

						<tbody>

							@foreach($products as $item)
							<tr class="align-middle text-center text-sm">
								
								<td><a style="color: rgb(16, 71, 189)" href="{{ route('taxproject.task.view',$item->id) }}">{{ $item->task_id }}</a></td>
								<td><a style="color: rgb(16, 71, 189)" href="{{ route('customer.view',$item->customer_id) }}">{{ $item->customer->user_name }}</a></td>
								<td class="text-sm text-truncate">
									<h6 class="mb-0 text-sm">{{ $item->subject }}</h6>
								</td>
								<td><a style="color: rgb(16, 71, 189)" href="{{ route('customer.view',$item->customer_id) }}">{{ $item->customer->company_name }}</a></td>
								<td ><h6 class="mb-0 text-sm">{{ $item->project->project_name }}</h6></td>
								<td><h6 class="mb-0 text-sm">{{ $item->customer->ssn }}</h6></td>
								<td>
									<h6 class="mb-0 text-sm">
										{{ substr($item->customer->personal_phone, 0, 3) . '-' . substr($item->customer->personal_phone, 3, 3) . '-' . substr($item->customer->personal_phone, 6) }}
									</h6>
								</td>
								
								<!-- Email Column Data -->
								<td class="text-sm text-truncate" style="width: 50px;">
									<h6 class="mb-0 text-sm">{{ $item->customer->email }}</h6>
								</td>
								
								

								@php
									// Determine the badge class based on the status
									$statusClass = match ($item->status) {
										'Done' => 'success',
										'In Progress' => 'info',
										'In-Progress - Missing Docs' => 'secondary',
										'Not-In-Drake' => 'warning',
										'Folder Created Only' => 'dark',
										'Data Entry Completed' => 'primary',
										'Get Extension' => 'light',
										default => 'danger',
									};
								@endphp

								<!-- Status Column Data with Badge -->
								<td class="align-middle text-center text-sm text-truncate">
									<span class="badge badge-sm bg-gradient-{{ $statusClass }}">
										{{ $item->status }}
									</span>
								</td>
								<td class="text-sm text-truncate" style="width: 50px;">
									<h6 class="mb-0 text-sm">{{ $item->paymentStatus }}</h6>
								</td>

								<td><h6 class="mb-0 text-sm">{{ $item->eSignature }}</h6></td>
								
								<td><h6 class="mb-0 text-sm">{{ $item->ef_status }}</h6></td>
				
								<td>
									<a class="btn btn-link text-dark px-0 mb-0" href="{{ route('taxproject.task.view',$item->id) }}"><i class="fa-solid fa-eye text-dark me-2" aria-hidden="true"></i></a>
									
									<a class="btn btn-link text-dark px-0 mb-0" href="{{ route('taxproject.task.edit',$item->id) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i></a>		
									
									<a class="btn btn-link text-danger text-gradient px-0 mb-0" href="{{ route('taxprojects.tasks.deletes',$item->id) }}" onclick="return confirm('Are you sure you want to delete this Task')"><i class="fa-solid fa-trash text-dark me-2"></i></a>

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
		
		// Update the index based on your table structure
		$('#statusFilter').on('change', function () {
			// Column index for Status is 5 (zero-based)
			table.column(8).search($(this).val()).draw();
		});
		
		$('#eSignatureFilter').on('change', function () {
			// Column index for eSignature is 6 (zero-based)
			table.column(10).search($(this).val()).draw();
		});
		
		$('#efstatusFilter').on('change', function () {
			// Column index for EF STATUS is 7 (zero-based)
			table.column(11).search($(this).val()).draw();
		});
		
		$('#projectFilter').on('change', function () {
			// Column index for Project Name is 3 (zero-based)
			table.column(4).search($(this).val()).draw();
		});
	});
</script>


@endsection