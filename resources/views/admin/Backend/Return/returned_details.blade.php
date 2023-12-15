@extends('admin.aDashboard')
@section('admins')

  {{-- TRIAL START --}}
  <div class="container-fluid">
	<div class="row">
	  <div class="col-lg-12 mb-lg-0 mb-4">
		<div class="card">
		  <div class="card-body p-3">
			<div class="row">
				
			<form class="insert-form" id="insert_form" method="post" action="{{ route('return.store') }}">
			@csrf
			<div class="row">
				<div class="col">
					<div class="row mb-3">
						<div class="col-3"><label  class="text-uppercase text-dark text-xs font-weight-bold" for="mySelect">Customer</label></div>
						<div class="col">
							<select id="mySelect" name="customer_id" class="js-example-basic-single select2 form-control">
							<option value="{{$chalan->customer->id}}" selected="">{{$chalan->customer->customer_name}}</option>
							{{-- @foreach($customers as $customer)
									 <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>	
							@endforeach --}}
							<!-- More options -->
							</select>
						</div>
						</div>

						<input class="form-control" value="{{$chalan->id
						}}" type="text" id="chalan_id" name="chalan_id" hidden>
	
						<div class="row mb-3">
							<div class="col-3"><label class="text-uppercase text-dark text-xs font-weight-bold">Address</label></div>
							<div class="col"><input class="form-control" value="{{$chalan->customer->address
							}}" type="text" id="address" name="address" required="">
						</div>
							
						</div>
						<div class="row mb-3">
							<div class="col-3"><label class="text-uppercase text-dark text-xs font-weight-bold">Phone</label></div>
							<div class="col"><input value="{{$chalan->customer->phone
							}}" class="form-control mb-3" type="text" id="phone" name="phone"></div>
							
						</div>
	
						{{-- <div class="row mb-3">
							<div class="col-2"><label>Address</label></div>
							<div class="col"><input class="form-control mb-3" type="text" id="address" name="address" readonly></div>
						</div> --}}
				</div>
				<div class="col">
					<div class="row mb-3">
						<div class="col-3"><label class="text-uppercase text-dark text-xs font-weight-bold">Sale Date</label></div>
						<div class="col"><input class="form-control" value="{{$chalan->chalan_date}}" type="date" id="returnDate" name="returnDate" required=""></div>
					</div>
					{{-- <div class="row mb-3">
						<div class="col-2"><label>Details</label></div>
						<div class="col"><input class="form-control mb-3" type="text" id="details" name="details"></div>
					</div> --}}
					<div class="row mb-3">
						<div class="col-3"> <label class="text-uppercase text-dark text-xs font-weight-bold" for="details">Details</label></div>
						<div class="col"><textarea class="form-control" name="details" id="details" rows="1">{{$chalan->details}}</textarea></div>
					</div>

					{{-- <div class="row mb-3">
						<div class="col-3"><label class="text-uppercase text-dark text-xs font-weight-bold">Previous Invoice</label></div>
						<div class="col"><input value="{{$sale->pInvoice}}" class="form-control mb-3" type="text" id="pInvoice" name="pInvoice"></div>
						
					</div> --}}
					{{-- <div class="row mb-3">
						<div class="col"><input class="form-control mb-3" type="hidden" id="auth_id" name="auth_id"  value="{{ Auth::id()}}">
					</div>
			
				</div> --}}
			</div>
			<div class="table-responsive">
				<table id="table_field" class="table align-items-center mb-0">
				<thead>
					  <tr>
						<th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Item Information</th>
						<th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Stock/Unit</th> 
						<th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Sold Qty/Unit</th>
					
						<th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Return Qty/Unit</th>
						<th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Inventory</th>
						{{-- <th>Dis. Value</th>
						<th>Vat %</th>
						<th>VAT Value</th> --}}
						{{-- <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Total</th> --}}
						{{-- <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Action</th> --}}
					</tr>
				</thead>
				@foreach ($chalanItem as $item)
				<tr>
					<td>
						<select id="item" name="item[]" class="form-control" required="" >
							<option value="{{$item->product_id}}" selected="">{{$item->product->product_name}}</option>
							{{-- @foreach($products as $product)
								 <option value="{{ $product->id }}">{{ $product->product_name }}</option>	
							@endforeach --}}
						</select>
					</td>
					  <td><input class="form-control stock" type="text" value="{{$item->product->qty}}" id="stock" name="stock[]" required="" readonly></td>
					  <td><input class="form-control qnty" value="{{$item->qty}}" type="number" id="qnty" name="qnty[]" required=""></td>
					  <td><input class="form-control rqnty" value="" type="number" id="rqnty" name="rqnty[]"></td>
					  <td>
						<select class="form-control inventory-select"  id="inventory-select" name="inventory-select[]">
							<option value="{{$item->inventory}}" selected="" disabled>{{$item->inventory}}</option>
							<option value="qty">Inventory</option>
							<option value="stock_b">Telephone Booth</option>
						</select>
					</td>
					  {{-- <td><input class="form-control total" value="{{$item->amount}}" type="number" id="amount" name="amount[]" value="0" readonly></td> --}}
					  <td>
						{{-- <a name="add" id="add" class="btn bg-gradient-dark mb-0"><i class="fas fa-plus" aria-hidden="true"></i></a> --}}
						{{-- <i class="fa-solid fa-circle-plus display-4 text-success" type="button" name="add" id="add" ></i> --}}
					</td>
				</tr>
				@endforeach

				</table>
				<hr>
				
				<input class="btn bg-gradient-dark mb-0" type="submit" name="save" id="save" value="
				Make Return">
			</div>
			
	  </form>
	</div>
</div>
</div>
</div>

</div>

@include('admin.body.footer')



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


@endsection