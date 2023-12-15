@extends('admin.aDashboard')
@section('admins')


 <div class="container-fluid">
	<div class="row mt-4">
	  <div class="col-lg-12 mb-lg-0 mb-4">
		<div class="card">
		  <div class="card-body p-3">
			<div class="row">
							<!-- /.box-header -->
							 <div class="box-body">
								<div class="table-responsive">
								  <table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr class="align-middle text-center">
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sl.</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">From</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">To</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Amount</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Details</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employee</th>
											{{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Approved By</th> --}}
											{{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th> --}}
											 
										</tr>
									</thead>
									<tbody>
			@php
				$sl = 1;
				$amount = 0;
			@endphp
	 @foreach($deposits as $item)
	 <tr class="align-middle text-center text-sm">
		<td width="5%"><h6 class="mb-0 text-sm "> {{ $sl++ }}</h6></td>
		<td class="text-sm font-weight-bold mb-0">{{ $item->deposit_date }}</td>
		<td class="text-sm font-weight-bold mb-0">{{ $item->frombank->ac_name }}</td>
		<td class="text-sm font-weight-bold mb-0">{{ $item->tobank->ac_name }}</td>
		<td class="text-sm font-weight-bold mb-0">{{ $item->amount }}</td>
		{{-- <td style="display:none;">{{$amount += $item->amount}}</td> --}}
		<td class="text-sm font-weight-bold mb-0">{{ $item->type_of_deposit }} </td>
		<td class="text-sm font-weight-bold mb-0">{{ $item->details }} </td>
		<td><h6 class="badge badge-sm bg-gradient-primary">{{ $item->user->name }}</h6> </td>

		{{-- @if ($item->status == "Pending")
	   <td><h6 class="badge badge-sm bg-gradient-danger"> {{ $item->status }}</h6></td>
	   <td><h6 class="badge badge-sm bg-gradient-danger">--</h6></td>
	   @else
	   <td><h6 class="badge badge-sm bg-gradient-success"> {{ $item->status }}</h6></td>
	   <td><h6 class="badge badge-sm bg-gradient-primary"> {{ $item->approve->name }}</h6></td>
	   @endif --}}


		{{-- <td>
		
			@if ($item->status == "Approved")
			@if(Auth::guard('admin')->user()->type=="1" || (Auth::guard('admin')->user()->type=="2") || (Auth::guard('admin')->user()->type=="3"))
			<a class="btn btn-link text-dark px-3 mb-0" href="{{ route('expense.edit',$item->id) }}"><i class="fa fa-thumbs-down text-dark me-2"></i>Edit</a>
			@endif
		   @else
		   @if(Auth::guard('admin')->user()->type=="1" || (Auth::guard('admin')->user()->type=="2") || (Auth::guard('admin')->user()->type=="3"))
		   <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('expense.approve',$item->id) }}"><i class="fa fa-thumbs-up text-dark me-2"></i>Approve</a>
		   <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('expense.edit',$item->id) }}"><i class="fa fa-thumbs-down text-dark me-2"></i>Edit</a>
		   @else
		  
		   @endif
		   @endif

		</td>				  --}}
	 </tr>
	  @endforeach
	  {{-- <tr class="align-middle text-center text-sm">
		<td width="5%"><h6 class="mb-0 text-sm "></h6></td>
        <td><p class="mb-0 text-sm"></p></td>
		<td class="text-sm font-weight-bold mb-0"></td>
		<td class="text-sm font-weight-bolder mb-0">{{ $amount }}</td>
		<td style="display: none"> </td>
		<td class="text-sm font-weight-bold mb-0"> </td>
		<td class="text-sm font-weight-bold mb-0"></td>
		<td class="text-sm font-weight-bold mb-0"></td>
		<td class="text-sm font-weight-bold mb-0"></td>
		<td class="text-sm font-weight-bold mb-0"></td>
		<td class="text-sm font-weight-bold mb-0"></td>
			 
	 </tr> --}}
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