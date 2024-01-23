@extends('admin.aDashboard')
@section('admins')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


{{-- @auth
    <p>Hello, {{ Auth::user()->name }}! Your id is {{ Auth::id() }}</p>
@endauth
@guest
    <p>Please login to see your id.</p>
@endguest --}}

<div class="container-fluid py-4">
	<div class="row">
	  <div class="col-xl-4 col-sm-4 mb-xl-0 mb-4">
		<div class="card">
		  <div class="card-body p-3">
			<div class="row">
			  <div class="col-8">
				<div class="numbers">
				  <p
					style="font-size: large"
					class="mb-0 text-capitalize font-weight-bold"
				  >
					Total Projects
				  </p>
				  @if ($customerssum)
				  <h5
				  style="font-size: 36px"
				  class="font-weight-bolder mb-0"
				>
				{{$customerssum}}
				  <span class="text-success text-sm font-weight-bolder"
					>Projects</span
				  >
				</h5>
				  @else
				  <h5
				  style="font-size: 36px"
				  class="font-weight-bolder mb-0"
				>
				0 
				  <span class="text-success text-sm font-weight-bolder"
					>Customers</span
				  >
				</h5>
				  @endif
				  
				</div>
			  </div>
			  <div class="col-4 text-end">
				<div
				  class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md"
				>
				  <i
					class="ni ni-money-coins text-lg opacity-10"
					aria-hidden="true"
				  ></i>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	  <div class="col-xl-4 col-sm-4 mb-xl-0 mb-4">
		<div class="card">
		  <div class="card-body p-3">
			<div class="row">
			  <div class="col-8">
				<div class="numbers">
				  <p
					style="font-size: large"
					class="mb-0 text-capitalize font-weight-bold"
				  >
					Total Project Task
				  </p>
				  <h5
					style="font-size: 36px"
					class="font-weight-bolder mb-0"
				  >
					{{$productssum}}
					<span class="text-success text-sm font-weight-bolder"
					  >Tasks</span
					>
				  </h5>
				</div>
			  </div>
			  <div class="col-4 text-end">
				<div
				  class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md"
				>
				  <i
					class="ni ni-world text-lg opacity-10"
					aria-hidden="true"
				  ></i>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	  <div class="col-xl-4 col-sm-4 mb-xl-0 mb-4">
		<div class="card">
		  <div class="card-body p-3">
			<div class="row">
			  <div class="col-8">
				<div class="numbers">
				  <p
					style="font-size: large"
					class="mb-0 text-capitalize font-weight-bold"
				  >
					Total Customers
				  </p>
				  <h5
					style="font-size: 36px"
					class="font-weight-bolder mb-0"
				  >
					{{ $tcustomer}}
					<span class="text-success text-sm font-weight-bolder"
					  >Customers</span
					>
				  </h5>
				</div>
			  </div>
			  <div class="col-4 text-end">
				<div
				  class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md"
				>
				  <i
					class="ni ni-paper-diploma text-lg opacity-10"
					aria-hidden="true"
				  ></i>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	  <!-- <div class="col-xl-3 col-sm-6">
		<div class="card">
		  <div class="card-body p-3">
			<div class="row">
			  <div class="col-8">
				<div class="numbers">
				  <p class="text-sm mb-0 text-capitalize font-weight-bold">
					Sales
				  </p>
				  <h5 class="font-weight-bolder mb-0">
					$103,430
					<span class="text-success text-sm font-weight-bolder"
					  >+5%</span
					>
				  </h5>
				</div>
			  </div>
			  <div class="col-4 text-end">
				<div
				  class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md"
				>
				  <i
					class="ni ni-cart text-lg opacity-10"
					aria-hidden="true"
				  ></i>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div> -->
	</div>

	<br>
	@if(Auth::guard('admin')->user()->type=="1" || (Auth::guard('admin')->user()->type=="2") || (Auth::guard('admin')->user()->type=="3"))
	<div class="row">
	  <div class="col-xl-3 col-sm-3 mb-xl-0 mb-3">
		<div class="card">
		  <div class="card-body p-3">
			<div class="row">
			  <div class="col-8">
				<div class="numbers">
				  <p
					style="font-size: large"
					class="mb-0 text-capitalize font-weight-bold"
				  >
					Capital Due
				  </p>
				  @if ($capital_due->balance)
				  <h5
				  style="font-size: 36px"
				  class="font-weight-bolder mb-0"
				>
				{{$capital_due->balance}}
				  <span class="text-success text-sm font-weight-bolder"
					>TK</span
				  >
				</h5>
				  @else
				  <h5
				  style="font-size: 36px"
				  class="font-weight-bolder mb-0"
				>
				0 
				  <span class="text-success text-sm font-weight-bolder"
					>TK</span
				  >
				</h5>
				  @endif
				  
				</div>
			  </div>
			  <div class="col-4 text-end">
				<div
				  class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md"
				>
				  <i
					class="ni ni-money-coins text-lg opacity-10"
					aria-hidden="true"
				  ></i>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	  <div class="col-xl-3 col-sm-3 mb-xl-0 mb-3">
		<div class="card">
		  <div class="card-body p-3">
			<div class="row">
			  <div class="col-8">
				<div class="numbers">
				  <p
					style="font-size: large"
					class="mb-0 text-capitalize font-weight-bold"
				  >
					Customer Due
				  </p>
				  <h5
					style="font-size: 36px"
					class="font-weight-bolder mb-0"
				  >
					123
					<span class="text-success text-sm font-weight-bolder"
					  >TK</span
					>
				  </h5>
				</div>
			  </div>
			  <div class="col-4 text-end">
				<div
				  class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md"
				>
				  <i
					class="ni ni-world text-lg opacity-10"
					aria-hidden="true"
				  ></i>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	  <div class="col-xl-3 col-sm-3 mb-xl-0 mb-3">
		<div class="card">
		  <div class="card-body p-3">
			<div class="row">
			  <div class="col-8">
				<div class="numbers">
				  <p
					style="font-size: large"
					class="mb-0 text-capitalize font-weight-bold"
				  >
					Total Balance
				  </p>
				  <h5
					style="font-size: 36px"
					class="font-weight-bolder mb-0"
				  >
					{{ $total_balance - $capital_due->balance}}
					<span class="text-danger text-sm font-weight-bolder"
					  >TK</span
					>
				  </h5>
				</div>
			  </div>
			  <div class="col-4 text-end">
				<div
				  class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md"
				>
				  <i
					class="ni ni-paper-diploma text-lg opacity-10"
					aria-hidden="true"
				  ></i>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	  <div class="col-xl-3 col-sm-3 mb-xl-0 mb-3">
		<div class="card">
		  <div class="card-body p-3">
			<div class="row">
			  <div class="col-8">
				<div class="numbers">
				  <p
					style="font-size: large"
					class="mb-0 text-capitalize font-weight-bold"
				  >
					Service Total
				  </p>
				  <h5
					style="font-size: 36px"
					class="font-weight-bolder mb-0"
				  >
					{{ $servicetotal}}
					<span class="text-danger text-sm font-weight-bolder"
					  >TK</span
					>
				  </h5>
				</div>
			  </div>
			  <div class="col-4 text-end">
				<div
				  class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md"
				>
				  <i
					class="ni ni-paper-diploma text-lg opacity-10"
					aria-hidden="true"
				  ></i>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	  <!-- <div class="col-xl-3 col-sm-6">
		<div class="card">
		  <div class="card-body p-3">
			<div class="row">
			  <div class="col-8">
				<div class="numbers">
				  <p class="text-sm mb-0 text-capitalize font-weight-bold">
					Sales
				  </p>
				  <h5 class="font-weight-bolder mb-0">
					$103,430
					<span class="text-success text-sm font-weight-bolder"
					  >+5%</span
					>
				  </h5>
				</div>
			  </div>
			  <div class="col-4 text-end">
				<div
				  class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md"
				>
				  <i
					class="ni ni-cart text-lg opacity-10"
					aria-hidden="true"
				  ></i>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div> -->
	</div>
	<br>

	@endif

		{{-- TEST --}}

		<div class="row">

		<div class="col-lg-6">
			<div class="card">
				<div class="card-body pt-2">
					<span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">Project Tasks</span>
				</div>
				<div class="table-responsive">
				  <table class="table align-items-center mb-0" id="example1">
			
					<thead>
						<tr>
							<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="background-color: #f2f2f2;">Sl.</th>
							<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="background-color: #f2f2f2;">Task</th>
							<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="background-color: #f2f2f2;">Status
								<select id="statusFilter">
									<option value="">All</option>
									<option value="On Progress">On Progress</option>
									<option value="Done">Done</option>
									<option value="Not Started">Not Started</option>
								</select>
							</th>
							<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="background-color: #f2f2f2;">Project Name
								<select id="projectFilter">
									<option value="">All Projects</option>
									@php
										$uniqueProjects = [];
									@endphp
									@foreach($projecttasks as $item)
										@if (!in_array($item->category->project_name, $uniqueProjects))
											<option value="{{ $item->category->project_name }}">{{ $item->category->project_name }}</option>
											@php
												$uniqueProjects[] = $item->category->project_name;
											@endphp
										@endif
									@endforeach
								</select>
							</th>
							<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="background-color: #f2f2f2;">Assign To</th>
						</tr>
						
					</thead>
					<tbody>
						@php
							$sl = 1;
						@endphp
				@foreach($projecttasks as $item)
				<tr>
	  
					  <td class="align-middle text-center">
						  <p class="text-xs font-weight-bold mb-0">{{$sl}}</p>
					  </td>
					  @php
						  $sl++; 
					  @endphp
				  
				  <td class="align-middle text-center">
					  
						<p class="text-xs font-weight-bold mb-0"><a href="{{ route('project.task.view', ['id' => $item->id]) }}">{{ $item->task_name }} </a></p>
					 
				  </td>
				
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
				  <td class="align-middle text-center">
					  <p class="text-xs font-weight-bold mb-0">{{ $item->category->project_name }}</p>
				  </td>
				  <td class="align-middle text-center">
					  <p class="text-xs font-weight-bold mb-0">{{ $item->admin->name }}</p>
				  </td>
				</tr>
				@endforeach
	
	
					</tbody>
					</table>
				</div>
			</div>

			<br>

			<div class="card">
				<div class="card-header pb-0">
				  <div class="row">
	  
				<div class="card-body px-0 pb-2">
				  <div class="table-responsive">
					<table class="table align-items-center mb-0">
					  <thead>
						<tr>
						  <th
							class="text-center text-uppercase text-primary text-lg font-weight-bolder opacity-7"
						  >
							Invoice
						  </th>
						  <th
							class="text-center text-uppercase text-primary text-lg font-weight-bolder opacity-7"
						  >
							Customer
						  </th>
						  <th
							class="text-center text-uppercase text-primary text-lg font-weight-bolder opacity-7"
						  >
						  Total
						  </th>
	  
						  <th
							class="text-center text-uppercase text-primary text-lg font-weight-bolder opacity-7"
						  >
							Sold By
						  </th>
						  <th
						  class="text-center text-uppercase text-primary text-lg font-weight-bolder opacity-7"
						>
						  Action
						</th>
						  
						</tr>
					  </thead>
					  <tbody>
	  
						  @foreach ($last5Sales as $item)
						<tr>
						  <td>
							<div class="d-flex px-2 py-1">
							  
							  <div
								class="align-middle text-center text-sm"
							  >
								<h6 class="mb-0 text-lg">{{$item->invoice}}</h6>
							  </div>
							</div>
						  </td>
						  <td class="align-middle text-center text-sm">
							<span class="text-lg font-weight-bold">
							  {{$item->id}}
							</span>
						  </td>
						  <td class="align-middle text-center text-sm">
							<span class="text-lg font-weight-bold">
							  {{$item->grand_total}}
							</span>
						  </td>
	  
						  <td class="align-middle text-center text-sm">
							<span class="badge badge-sm bg-gradient-primary">
							  {{$item->user->name}}
							</span>
						  </td>
						  <td class="align-middle text-center text-sm">
							  <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('sales.details.view', $item->id) }}"><i class="fa-solid fa-eye text-dark me-2" aria-hidden="true"></i>View</a>
							  <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('sale.download.view',$item->id) }}"><i class="fa-solid fa-file-arrow-down text-dark me-2"></i>Download</a>
						  </td>
						</tr>
					  </a>
						@endforeach
					  </tbody>
					</table>
				  </div>
				</div>
			  </div>
		  </div>
	  </div>
			
	
		  </div>


		  <div class="col-xl-6 col-sm-6 mb-xl-0 mb-6">
			<div class="card">
				<div class="card-body pt-2">
					<span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">Projects</span>
				</div>
				<div class="table-responsive">
				  <table class="table align-items-center mb-0">
			
					<thead>
					  <tr>
						<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sl.</th>
						<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Project Name</th>
						<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Priority</th>
						<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Assign To</th>
					  </tr>
					</thead>
					<tbody>
						@php
							$sl = 1;
						@endphp
						@foreach($topProducts as $item)
					  <tr>
			
							<td class="align-middle text-center">
								<p class="text-xs font-weight-bold mb-0">{{$sl}}</p>
							</td>
							@php
								$sl++; 
							@endphp
						
						<td class="align-middle text-center">
							<p class="text-xs font-weight-bold mb-0">{{ $item->project_name }}</p>
						</td>
						<td class="align-middle text-center">
							<p class="text-xs font-weight-bold mb-0">{{ $item->priority }}</p>
						</td>
						<td class="align-middle text-center">
							<p class="text-xs font-weight-bold mb-0">{{ $item->admin->name }}</p>
						</td>
					  </tr>
					  @endforeach

					</tbody>
					</table>
				</div>
			</div>

			<br>

				<div class="card">
		  <div class="card-body p-3">
			<div class="row">
			  <div class="col-lg-6">
				<div class="d-flex flex-column h-100">
				
					<h5 class="font-weight-bolder">TrionxAI Notice Board</h5>
					<br>
						@foreach($notices as $notice)
							  <p class="">
								  {{$loop->iteration}}.   {{$notice->description}}
						  </p>
						  <hr>
					  @endforeach
  
				
				  </div>
			  </div>
			  <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
				<div class="bg-gradient-primary border-radius-lg h-100">
				  <img
					src="../assets/img/shapes/waves-white.svg"
					class="position-absolute h-100 w-50 top-0 d-lg-block d-none"
					alt="waves"
				  />
				  <div
					class="position-relative d-flex align-items-center justify-content-center h-100"
				  >
					<img
					  class="w-100 position-relative z-index-2 pt-4"
					  src="../assets/img/illustrations/rocket-white.png"
					  alt="rocket"
					/>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		</div>

			<br>
			@if(Auth::guard('admin')->user()->type=="1" || (Auth::guard('admin')->user()->type=="2"))
	
			  <div class="card">
				<div class="card-header pb-0">
				  <h6>Today's Overview</h6>
				  
				</div>
	  
				<table style="width: 90%; margin-left:5%" class="table table-bordered">
				  <thead>
					<tr>
					  <th scope="col">Total Sale</th>
					  <td scope="col">TK <b>Total Sale</b></td>
					</tr>
					<tr>
					  <th scope="col">Total Purchase</th>
					  <td scope="col">TK <b>Total Purchase</b></td>
					</tr>
					<tr>
					  <th scope="col">Last Sale</th>
					  <td scope="col">TK <b>Grand Total</b></td>
					</tr>
				  </thead>
			  
				</table>
	  
				
			</div>
			@endif

			

		</div>

	</div>
	
		{{-- END TEST --}}


	@include('admin.body.footer')
  </div>

  <script>
    $(document).ready(function () {
        var table = $('#example1').DataTable();

        $('#statusFilter').on('change', function () {
            table.column(2).search($(this).val()).draw();
        });

		$('#projectFilter').on('change', function () {
            table.column(3).search($(this).val()).draw();
        });
    });
</script>

  @endsection