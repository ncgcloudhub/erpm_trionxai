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
										<tr style="background-color: rgba(37, 163, 20, 0.863)" class="align-middle text-center">
											<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">Sl.</th>
											<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">Date</th>
											<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">Student</th>
											<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">Invoice No.</th>
											<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">Grand Total</th>
											<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">Paid</th>
											<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">Sold By</th>
											<th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 text-white">Action</th>
											 
										</tr>
									</thead>
									<tbody>
			@php
				$sl = 1;
			@endphp
	 @foreach($sales as $item)
	 <tr class="align-middle text-center text-sm">
		<td width="5%"><h6 class="mb-0 text-sm "> {{ $sl++ }}</h6></td>
        <td><p class="mb-0 text-sm">{{ $item->sale_date }}</p></td>
		<td class="text-sm font-weight-bold mb-0"><a style="color: rgb(16, 71, 189)" href="{{ route('sales.details.view', $item->id) }}">{{ $item->student->student_name }}</a></td>
		<td class="text-sm font-weight-bold mb-0">{{ $item->invoice }}</td>
		<td class="text-sm font-weight-bold mb-0">TK {{ $item->grand_total }} </td>
		<td class="text-sm font-weight-bold mb-0">TK {{ $item->p_paid_amount }} </td>
		<td><h6 class="badge badge-sm bg-gradient-success"> {{ $item->user->name }}</h6></td>
		<td width="30%">
			<a class="btn btn-link text-dark px-2 mb-0" href="{{ route('sales.details.view', $item->id) }}"><i class="fa-solid fa-eye text-dark me-2" aria-hidden="true"></i>View</a>
		
			<a class="btn btn-link text-dark px-2 mb-0" href="{{ route('sale.download.view',$item->id) }}"><i class="fa-solid fa-file-arrow-down text-dark me-2"></i>Download</a>
			
				{{-- <a class="btn btn-link text-dark px-2 mb-0" href="{{ route('sales.chalan.make', $item->id) }}"><i class="fa fa-exchange text-dark me-2" aria-hidden="true"></i>Chalan</a> --}}
				{{-- @if(Auth::guard('admin')->user()->type=="1" || (Auth::guard('admin')->user()->type=="2") || (Auth::guard('admin')->user()->type=="3"))
				<a class="btn btn-link text-dark px-2 mb-0" href="{{ route('sales.edit.view', $item->id) }}"><i class="fa fa-pencil text-dark me-2" aria-hidden="true"></i>Edit</a> --}}

				{{-- <a id="fullPaidLink{{ $item->id }}" class="btn btn-link text-dark px-2 mb-0" href="{{ route('sale.full.paid', $item->id) }}" onclick="return confirm('Are you sure you want to full pay for this sale?')">
					<i class="fa-solid fa-file-arrow-down text-dark me-2"></i>Full Paid
				</a> --}}
				{{-- @if (!($item->grand_total == $item->p_paid_amount))
				<a id="fullPaidLink{{ $item->id }}" class="btn btn-link text-dark px-2 mb-0" href="{{ route('sale.full.paid', $item->id) }}" onclick="return confirm('Are you sure you want to full pay for this sale?')">
					<i class="fa-solid fa-file-arrow-down text-dark me-2"></i>Full Paid
				</a>
				@endif --}}
		
				@if ($item->active_inactive == 1)
					<a class="btn btn-link text-danger text-gradient px-2 mb-0" href="{{ route('sale.inactive',$item->id) }}"><i class="fa fa-thumbs-o-down text-dark me-2"></i>In Active</a>
				@else
					<a class="btn btn-link text-info text-gradient px-2 mb-0" href="{{ route('sale.active',$item->id) }}"><i class="fa fa-thumbs-o-up text-dark me-2"></i>Active</a>
				@endif
				
			{{-- @endif --}}

			@if ($item->grand_total == $item->p_paid_amount)
			@if(Auth::guard('admin')->user()->type=="1")
				<a class="btn btn-link text-danger text-gradient px-3 mb-0" href="{{ route('sale.delete',$item->id) }}" onclick="return confirm('Are you sure you want to delete this item')"><i class="fa-solid fa-trash text-dark me-2"></i>Delete</a>
			@endif
			@endif
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

@include('admin.body.footer')

{{-- TRIAL END --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $("a[id^='fullPaidLink']").on("click", function (e) {
            e.preventDefault(); // Prevent the default behavior of the link

            var linkId = $(this).attr('id'); // Get the ID of the clicked link
            var itemId = linkId.replace("fullPaidLink", ""); // Extract the item ID from the link's ID

            // Send a POST request using JavaScript
            $.post("{{ route('sale.full.paid', '') }}/" + itemId, { _token: "{{ csrf_token() }}" }, function (data) {
                // Handle the response if needed
                window.location.href = "{{ route('sales.manage') }}";
            });
        });
    });
</script>



@endsection