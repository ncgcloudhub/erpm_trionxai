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
											@if(Auth::guard('admin')->user()->type=="1" || (Auth::guard('admin')->user()->type=="2"))
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
											@endif
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employee</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Amount</th>
											
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Month</th>
											
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Year</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
											 
										</tr>
									</thead>
									<tbody>

				@php
					$tCost = 0;
					$tSale = 0;	
				@endphp

				 @foreach($salaries as $item)
				 <tr class="align-middle text-center text-sm">
					
					<td><p class="mb-0 text-sm">{{ $item->date }}</td>
					
					<td><p class="mb-0 text-sm">{{ $item->employee->f_name }}</p></td>
					<td><h6 class="mb-0 text-sm">{{ $item->amount }}</h6></td>
					
					<td><h6 class="mb-0 text-sm">{{ $item->month }}</h6></td>
					
					<td><h6 class="mb-0 text-sm">{{ $item->year }}</h6></td>
					
					@if(Auth::guard('admin')->user()->type=="1" || (Auth::guard('admin')->user()->type=="2"))
					<td>
			 <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('product.edit',$item->id) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>		
			 {{-- @if(Auth::guard('admin')->user()->type=="1" || (Auth::guard('admin')->user()->type=="2"))
			 <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="{{ route('product.delete',$item->id) }}"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Delete</a>
			 @endif --}}
					</td>
					@endif					 
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