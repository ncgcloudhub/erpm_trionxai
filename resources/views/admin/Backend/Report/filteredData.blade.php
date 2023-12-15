@extends('admin.aDashboard')
@section('admins')

	  {{-- TRIAL START --}}
	  <div class="container-fluid">
		<div class="row">
			<div class="col-md-5">
				<div class="card">
					<div class="card-body p-3">
						<div class="form-filter">
							<form method="post" action="{{ route('report.filter') }}">
								@csrf
								<div class="card-body p-2">
									<div class="row">
										<div class="col-md-4 mb-md-0 mb-4">
											<div class="">
												<input class="form-control date mb-3" value="" type="date" id="sdate" name="sdate" required="">
											</div>
										</div>
										<div class="col-md-4">
											<div class="">
												<input class="form-control date mb-3" value="" type="date" id="edate" name="edate" required="">
												<input class="form-control date mb-3" value="{{$option}}" type="hidden" id="" name="option">
											
											</div>
										</div>
										<div class="col-md-4 mb-md-0 mb-4">
											<div>
												<select name="option" class="form-control" id="option">
													<option value="" selected="" disabled>Select Report Type</option>
													<option value="expense">Expense</option>
													<option value="requisition">Requisition</option>
											
													<option value="L/C">L/C</option>
													<option value="sale">Sale</option>
												</select>
											</div>
										</div>
										<div class="col-md-12">
											<div class="">
												<input class="btn bg-gradient-dark mb-0" type="submit" name="save" id="save" value="Filter Report">
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-body p-3">
						<div class="form-filter">
							<form method="post" action="{{ route('report.department.filter') }}">
								@csrf
								<div class="card-body p-2">
									<div class="row">
										<div class="col-md-3 mb-md-0 mb-4">
											<div class="">
												<input class="form-control date mb-3" value="" type="date" id="sdate" name="sdate" required="">
											</div>
										</div>
										<div class="col-md-3">
											<div class="">
												<input class="form-control date mb-3" value="" type="date" id="edate" name="edate" required="">
											</div>
										</div>
										<div class="col-md-3 mb-md-0 mb-4">
											<div>
												<select class="form-control" name="option" id="option">
													<option value="" selected="" disabled>Select Report Type</option>
													<option value="conveyance">Conveyance</option>
													<option value="sale">Sale</option>
													{{-- <option value="requisition">Requisition</option>
													
													<option value="L/C">L/C</option>
													<option value="sale">Sale</option> --}}
												</select>
											</div>
										</div>
										<div class="col-md-3 mb-md-0 mb-4">
											<div>
												<select class="form-control" name="doption" id="doption">
													<option value="" selected="" disabled>Select Department</option>
													<option value="1">Super Admin</option>
													<option value="2" >Admin</option>
													<option value="3" >HR</option>
													<option value="4" >B2B</option>
													<option value="5" >Dealership</option>
													<option value="6" >B2C</option>
													<option value="7" >Digital Marketing</option>
													<option value="8" >Support Team</option>
												</select>
											</div>
										</div>
										<div class="col-md-12">
											<div class="">
												<input class="btn bg-gradient-dark mb-0" type="submit" name="save" id="save" value="Filter Data">
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-1">
				<div class="card">
					<div class="card-body p-3">
						<div class="form-download">
							<form action="{{ route('download.pdf.filter') }}" method="POST">
								@csrf
								<input type="hidden" name="type" value="pdf">
								<input type="hidden" name="filter" value="{{ $filtered->toJson() }}">
								<input type="hidden" name="soption" value="{{$option}}">
								{{-- <input type="hidden" name="doption" value="{{$doption}}"> --}}
								<input value="{{$sdate}}" type="hidden" name="sdate">
								<input value="{{$edate}}" type="hidden" name="edate">
								<div class="">
									<input class="btn bg-gradient-dark mb-0" type="submit" name="save" id="save" value="PDF">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

	
	

		
	<div class="row mt-4">
		<div class="col-lg-12 mb-lg-0 mb-4">
		  <div class="card">
			<div class="card-body">
			  <div class="row">
							  <!-- /.box-header -->
							  {{-- <div class="box-body"> --}}
								  <div class="table-responsive">
									<table id="example1" class="table table-bordered table-striped">
									  <thead>
										@if ($option == "expense")
										<tr>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Amount</th>
											{{-- <th style="display:none;"></th> --}}
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Details</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Location</th>
											
																					 
										</tr>
										@elseif ($option == "requisition")
										<tr>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Location</th>
											{{-- <th style="display:none;"></th> --}}
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quantity</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Procurement</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Amount</th>
																					 
										</tr>

										@elseif ($option == "conveyance")
										<tr>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
											
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employee</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Designation</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Supporting Employee</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Grand Total</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Approved By</th>	 
										</tr>
										
										@elseif ($option == "L/C")
										<tr>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Purchase Number</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Supplier</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Amount</th>
											{{-- <th style="display:none;"></th> --}}
																					 
										</tr>
										@elseif ($option == "sale")
										<tr>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Customer</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sold By</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Grand Total</th>
											<th style="display:none;"></th>
										
																					 
										</tr>
										@endif
										 
									  </thead>
									  <tbody>
					@php
					$amount = 0;
					$totalCost = 0;	
					$totalSale = 0;		
					@endphp
					
					@foreach($filtered as $item)
				   @if ($option == "expense")
				   <tr>
					  <td><h6 class="mb-0 text-sm">{{ $item->date }}</h6></td>
					  <td><h6 class="mb-0 text-sm">{{ $item->expenseType->expenseType }}</h6></td>
					  <td><h6 class="mb-0 text-sm">{{ $item->amount }}</h6></td>
					  <td style="display:none;">{{$amount += $item->amount}}</td>
					  <td><h6 class="mb-0 text-sm">{{ $item->details }}</h6></td>
					  <td><h6 class="mb-0 text-sm">{{ $item->location }}</h6></td>			   
				   </tr>

				   @elseif ($option == "requisition")
				 
				   <tr>
					<td><h6 class="mb-0 text-sm">{{ $item->date }}</h6></td>
					<td><h6 class="mb-0 text-sm">{{ $item->location }}</h6></td>
					<td style="display:none;">{{$amount += $item->amount}}</td>
					<td><h6 class="mb-0 text-sm">{{ $item->qty }}</h6></td>
					<td><h6 class="mb-0 text-sm">{{ $item->lo }}</h6></td>	
					<td><h6 class="mb-0 text-sm">{{ $item->amount }}</h6></td>			   
				 </tr>

				 @elseif ($option == "conveyance")
				 
				   <tr>
					<td><h6 class="mb-0 text-sm">{{ $item->date }}</h6></td>
					<td style="display:none;">{{$amount += $item->grand_total}}</td>
					<td><h6 class="mb-0 text-sm">{{ $item->employee->f_name }} {{ $item->employee->l_name }}</h6></td>
					<td><h6 class="mb-0 text-sm">{{ $item->employee->designation->designation }}</h6></td>
					<td><h6 class="mb-0 text-sm">{{ $item->s_employee }}</h6></td>	
					<td><h6 class="mb-0 text-sm">TK {{ $item->grand_total }} </h6></td>	
					@if ($item->status == "Pending")		   
					<td><h6 class="mb-0 text-sm"> {{ $item->status }}</h6></td>			   
					<td><h6 class="mb-0 text-sm">--</h6></td>
					@else
					<td><h6 class="mb-0 text-sm"> {{ $item->status }}</h6></td>			   
					<td><h6 class="mb-0 text-sm"> {{ $item->approve->name }}</h6></td>
					@endif			   
				 </tr>

				 @elseif ($option == "sale")
				 
				
				 <tr>
					 <td><h6 class="mb-0 text-sm">{{ $item->sale_date }}</h6></td>
					 <td><h6 class="mb-0 text-sm">{{ $item->customer->customer_name }}</h6></td>
					 <td><h6 class="badge badge-sm bg-gradient-success">{{ $item->user->name }}</h6></td>
					 <td><h6 class="mb-0 text-sm">{{ $item->grand_total }}</h6></td>
					 <td style="display:none;">{{$amount += $item->grand_total}}</td>
				 </tr>

				
				 @elseif ($option == "L/C")
				 
			
					<tr>
						<td><h6 class="mb-0 text-sm">{{ $item->purchase_date }}</h6></td>
						<td><h6 class="mb-0 text-sm">{{ $item->chalan_no }}</h6></td>
						<td><h6 class="mb-0 text-sm">{{ $item->supplier->supplier_name }}</h6></td>
						<td><h6 class="mb-0 text-sm">{{ $item->grand_total }}</h6></td>
						<td style="display:none;">{{$amount += $item->grand_total}}</td>
					</tr>
			

				   @endif
					@endforeach


					@if ($option == "expense")
					<tr>
						<td></td>
						<td></td>
						<td>Total: <b>{{$amount}}</b></td>
						<td></td>	
						<td></td>
						<td></td>			   
					 </tr>
					 @elseif ($option == "requisition")
					 <tr>
						<td></td>
						<td></td>
							
						<td></td>
						<td></td>
						<td>Total: <b>{{$amount}}</b></td>
						<td></td>	
								   
					 </tr>
					 @elseif ($option == "conveyance")
					 <tr>
						<td></td>
					
						<td></td>
						<td></td>
						<td></td>
						<td>Total: <b>{{$amount}}</b></td>	
						<td></td>
						<td></td>	
						<td></td>	
								   
					 </tr>
					 @elseif (($option == "L/C"))
					 <tr>
						<td></td>
						<td></td>
						<td></td>
					
						<td>TOtal: <b>{{$amount}}</b></td>
					 </tr>
					
					 @elseif (($option == "sale"))
					 <tr>
						<td></td>
						<td></td>
						<td></td>
						{{-- <td></td> --}}
						<td>Total: <b>{{$amount}}</b></td>
					 </tr>
					 @endif
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
