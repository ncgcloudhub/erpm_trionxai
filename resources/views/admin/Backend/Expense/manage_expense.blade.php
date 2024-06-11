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
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Expense ID</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Amount</th>
											<th hidden class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Amount</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Location</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Details</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Approved By</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Receipt</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
											 
										</tr>
									</thead>
									<tbody>
			@php
				$amount = 0;
			@endphp
	 @foreach($expenses as $item)
	 <tr class="align-middle text-center text-sm">
		<td width="5%"><h6 class="mb-0 text-sm "> EXP{{ $item->id }}</h6></td>
        <td><p class="mb-0 text-sm">{{ $item->expenseType->expenseType }}</p></td>
		<td class="text-sm font-weight-bold mb-0">{{ $item->date }}</td>
		<td class="text-sm font-weight-bold mb-0">{{ $item->amount }}</td>
		<td style="display:none;">{{$amount += $item->amount}}</td>
		<td class="text-sm font-weight-bold mb-0">{{ $item->location }} </td>
		<td class="text-sm font-weight-bold mb-0">{{ $item->details }} </td>
		@if ($item->user_id == NULL || $item->user == null)
		<td>--</td>
	@else
	<td><h6 class="badge badge-sm bg-gradient-primary">{{ $item->user->f_name }} {{ $item->user->l_name }}</h6> </td>
	@endif

		@if ($item->status == "Pending")
	   <td><h6 class="badge badge-sm bg-gradient-danger"> {{ $item->status }}</h6></td>
	   <td><h6 class="badge badge-sm bg-gradient-danger">--</h6></td>
	   @else
	   <td><h6 class="badge badge-sm bg-gradient-success"> {{ $item->status }}</h6></td>
	   <td><h6 class="badge badge-sm bg-gradient-primary"> {{ $item->approve->name }}</h6></td>
	   @endif
	   <td class="text-sm font-weight-bold mb-0">
		@if ($item->receipt)
		<a href="{{ asset($item->receipt) }}" download class="btn btn-link text-dark"><i class="fa fa-download me-2"></i>Download</a>
		@else
		No Receipt
		@endif
	</td>

		<td>
		
			@if ($item->status == "Approved")
			@if(Auth::guard('admin')->user()->type=="1" || (Auth::guard('admin')->user()->type=="2") || (Auth::guard('admin')->user()->type=="3"))
			<a class="btn btn-link text-dark px-3 mb-0" href="{{ route('expense.edit',$item->id) }}"><i class="fa fa-pencil text-dark me-2"></i>Edit</a>
			@endif
		   @else
		   @if(Auth::guard('admin')->user()->type=="1" || (Auth::guard('admin')->user()->type=="2") || (Auth::guard('admin')->user()->type=="3"))
		   {{-- <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('expense.approve',$item->id) }}"><i class="fa fa-thumbs-up text-dark me-2"></i>Approve</a> --}}
		   <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('expense.edit',$item->id) }}"><i class="fa fa-pencil text-dark me-2"></i>Edit</a>
		   @else
		  
		   @endif
		   @endif

		</td>				 
	 </tr>
	  @endforeach
	  <tr class="align-middle text-center text-sm">
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
		<td class="text-sm font-weight-bold mb-0"></td>
			 
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

@include('admin.body.footer')

{{-- TRIAL END --}}


@endsection