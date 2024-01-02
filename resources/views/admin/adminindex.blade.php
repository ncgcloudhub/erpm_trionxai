@extends('admin.aDashboard')
@section('admins')


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
					Total Customer
				  </p>
				  @if ($customerssum)
				  <h5
				  style="font-size: 36px"
				  class="font-weight-bolder mb-0"
				>
				{{$customerssum}}
				  <span class="text-success text-sm font-weight-bolder"
					>Customers</span
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
					Total Product
				  </p>
				  <h5
					style="font-size: 36px"
					class="font-weight-bolder mb-0"
				  >
					{{$productssum}}
					<span class="text-success text-sm font-weight-bolder"
					  >Products</span
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
					Total Sale
				  </p>
				  <h5
					style="font-size: 36px"
					class="font-weight-bolder mb-0"
				  >
					{{ $tsale}}
					<span class="text-danger text-sm font-weight-bolder"
					  >Sales</span
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
			<div class="col-xl-6 col-sm-6 mb-xl-0 mb-6">
			<div class="card">
				<div class="card-body pt-2">
					<span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">Top 4 Sellers of {{ now()->format('F Y') }}</span>
				</div>
				<div class="table-responsive">
				  <table class="table align-items-center mb-0">
			
					<thead>
					  <tr>
						<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sl.</th>
						<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
						<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total BDT</th>
						<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No of Sale</th>
					  </tr>
					</thead>
					<tbody>
						@php
							$sl = 1;
						@endphp
						@foreach($topUsers as $user)
					  <tr>
			
							<td class="align-middle text-center">
								<p class="text-xs font-weight-bold mb-0">{{$sl}}</p>
							</td>
							@php
								$sl++; // Increment $sl
							@endphp
						<td class="align-middle text-center">
							<p class="text-xs font-weight-bold mb-0">{{ $users->where('id', $user->user_id)->first()->name }}</p>
						</td>
						<td class="align-middle text-center">
							<p class="text-xs font-weight-bold mb-0">{{ number_format($user->total_sales, 2) }}</p>
						</td>
						<td class="align-middle text-center">
							<p class="text-xs font-weight-bold mb-0">{{ $user->sale_count }}</p>
						</td>
					  </tr>
					  @endforeach
					</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-xl-6 col-sm-6 mb-xl-0 mb-6">
			<div class="card">
				<div class="card-body pt-2">
					<span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">Trending Top 4 Products of {{ now()->format('F Y') }}</span>
				</div>
				<div class="table-responsive">
				  <table class="table align-items-center mb-0">
			
					<thead>
					  <tr>
						<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sl.</th>
						<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Name</th>
						<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No of Product Sold</th>
					  </tr>
					</thead>
					<tbody>
						@php
							$sl = 1;
						@endphp
						{{-- @foreach($topProducts as $user)
					  <tr>
			
							<td class="align-middle text-center">
								<p class="text-xs font-weight-bold mb-0">{{$sl}}</p>
							</td>
							@php
								$sl++; 
							@endphp
						
						<td class="align-middle text-center">
							<p class="text-xs font-weight-bold mb-0">{{ $user->product_name }}</p>
						</td>
						<td class="align-middle text-center">
							<p class="text-xs font-weight-bold mb-0">{{ $user->sale_count }}</p>
						</td>
					  </tr>
					  @endforeach --}}


{{-- TEST --}}
{{-- @foreach ($topProductsByCategoryGrouped as $categoryName => $categoryProducts)
    <h2>Category: {{ $categoryName }}</h2>
    <ul>
        @foreach ($categoryProducts->take(4) as $product)
            <li>Product: {{ $product->product_name }}, Sales Count: {{ $product->sale_count }}</li>
        @endforeach
    </ul>
@endforeach --}}

{{-- TEST END --}}




					</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	
		{{-- END TEST --}}
	<div class="row mt-4">
	  <div class="col-lg-6 mb-lg-0 mb-4">
		<div class="card">
		  <div class="card-body p-3">
			<div class="row">
			  <div class="col-lg-6">
				<div class="d-flex flex-column h-100">
				  <p class="mb-1 pt-2 text-bold text-lg">Welcome To The World Of DYAZ</p>
				  <h5 class="font-weight-bolder">DYAZ Dashboard</h5>
				  <p class="mb-5">Product of STATA IT LTD</p>
				  {{-- <a
					class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto"
					href="javascript:;"
				  >
					Read More
					<i
					  class="fas fa-arrow-right text-sm ms-1"
					  aria-hidden="true"
					></i>
				  </a> --}}
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
						  {{$item->customer->customer_name}}
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
	  <div class="col-lg-6">
		<div class="card">
			<div class="card-body pt-2">
				<span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">Category Wise Sold Product {{ now()->format('F Y') }}</span>
			</div>
			<div class="table-responsive">
			  <table class="table align-items-center mb-0">
		
				<thead>
				  <tr>
					<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sl.</th>
					<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category</th>
					<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
					<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No. Of Products Sold</th>
				  </tr>
				</thead>
				<tbody>
					@php
						$sl = 1;
					@endphp
			


				</tbody>
				</table>
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
				  <td scope="col">TK <b>{{$totalsale}}</b></td>
				</tr>
				<tr>
				  <th scope="col">Total Purchase</th>
				  <td scope="col">TK <b>{{$totalpurchase}}</b></td>
				</tr>
				<tr>
				  <th scope="col">Last Sale</th>
				  <td scope="col">TK <b>{{$lastSale->grand_total}}</b></td>
				</tr>
			  </thead>
		  
			</table>
  
			{{-- <div class="card-body p-3">
			  <div class="timeline timeline-one-side">
		  
			  @foreach ($schedules as $schedule)
				<div class="timeline-block mb-3">
				  <span class="timeline-step">
					 <i class="ni ni-bell-55 text-success text-gradient"></i>
				  </span>
				  <div class="timeline-content">
					<h6 class="text-dark text-sm font-weight-bold mb-0">
					{{ $schedule->customer->customer_name }}
					</h6>
					<p
					  class="text-secondary font-weight-bold text-xs mt-1 mb-0"
					>
					  {{ $schedule->time }}
					</p>
				  </div>
				</div>
			  @endforeach
			  
		  </div>
			</div> --}}

		</div>
		@endif





	  </div>
	  
	</div>

	@include('admin.body.footer')
  </div>

  @endsection