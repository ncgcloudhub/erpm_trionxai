@extends('admin.aDashboard')
@section('admins')

	  {{-- TRIAL START --}}
	  <div class="container-fluid">
	  <div class="row">
		<div class="col-lg-12 mb-lg-0 mb-4">
		  <div class="card">
			<div class="card-body p-3">
			  <div class="row">
			
				<div class="col">
					<form method="post" action="{{ route('product-update') }}" enctype="multipart/form-data" >
						@csrf
					<div class="form-group">
						<h6>Category<span class="text-danger">*</span></h6>
						<div class="controls">
							<select name="category_id" class="form-control" required="" >
								<option value="{{$product->category_id}}" selected="">{{$product->category->category_name}}</option>
								@foreach($categories as $category)
					 <option value="{{ $category->id }}">{{ $category->category_name }}</option>	
								@endforeach
							</select>
							@error('category_id') 
						 <span class="text-danger">{{ $message }}</span>
						 @enderror 
						 </div>
							 </div>
							 <input hidden type="text" name="id" id="id" value="{{$product->id}}">
							 <input type="hidden" name="old_image" value="{{ $product->product_img }}">	
							 <div class="form-group">
								<h6>Product Name<span class="text-danger">*</span></h6>
								<div class="controls">
									<input value="{{$product->product_name}}" type="text" name="product_name" class="form-control" required="">
						 @error('product_name') 
						 <span class="text-danger">{{ $message }}</span>
						 @enderror
							   </div>
							</div>

																
			 <div class="form-group">
				<h6>Model<span class="text-danger">*</span></h6>
				<div class="controls">
					<input type="text" value="{{$product->product_code}}" name="product_code" class="form-control" required="">
		 @error('product_code') 
		 <span class="text-danger">{{ $message }}</span>
		 @enderror
			   </div>
			</div>

							<div class="form-group">
								<h6>Sale Price<span class="text-danger">*</span></h6>
								<div class="controls">
									<input type="text" value="{{$product->sale_price}}" name="sale_price" class="form-control" required="">
						 @error('sale_price') 
						 <span class="text-danger">{{ $message }}</span>
						 @enderror
							   </div>
							</div>

							<div class="form-group">
								<h6>Cost Price<span class="text-danger">*</span></h6>
								<div class="controls">
									<input type="text" value="{{$product->cost_price}}" name="cost_price" class="form-control" >
						 {{-- @error('cost_price') 
						 <span class="text-danger">{{ $message }}</span>
						 @enderror --}}
							   </div>
							</div>


				</div>

				{{-- 2nd Col --}}
				<div class="col">
						{{-- <div class="form-group">
					<h6>Supplier<span class="text-danger">*</span></h6>
					<div class="controls">
						<select name="supplier_id" class="form-control" required="" >
							<option value="" selected="" disabled="">Select Supplier</option>
							@foreach($categories as $category)
				 <option value="{{ $category->id }}">{{ $category->category_name }}</option>	
							@endforeach
						</select>
						@error('supplier_id') 
					 <span class="text-danger">{{ $message }}</span>
					 @enderror 
					 </div>
						 </div> --}}
						

						 <div class="form-group">
							<h6>Product Details<span class="text-danger">*</span></h6>
							<div class="controls">
								<input type="text" value="{{$product->product_details}}" name="product_details" class="form-control" >
					 {{-- @error('product_details') 
					 <span class="text-danger">{{ $message }}</span>
					 @enderror --}}
						   </div>
						</div>

						@if(Auth::guard('admin')->user()->type=="1" || (Auth::guard('admin')->user()->type=="2"))
						<div class="form-group">
							<h6>Quantity Inventory<span class="text-danger">*</span></h6>
							<div class="controls">
								<input type="number" value="{{$product->qty}}" name="qty" class="form-control">
					 {{-- @error('p_vat') 
					 <span class="text-danger">{{ $message }}</span>
					 @enderror --}}
						   </div>
						</div>
						@endif

						@if(Auth::guard('admin')->user()->type=="1" || (Auth::guard('admin')->user()->type=="2"))
						<div class="form-group">
							<h6>Quantity Telephone Booth<span class="text-danger">*</span></h6>
							<div class="controls">
								<input type="number" value="{{$product->stock_b}}" name="stock_b" class="form-control">
					 {{-- @error('p_vat') 
					 <span class="text-danger">{{ $message }}</span>
					 @enderror --}}
						   </div>
						</div>
						@endif

						
						<div class="form-group">
							<h6>Image<span class="text-danger">*</span></h6>
							<div class="controls">
								<input type="file" name="product_img" class="form-control" >
								<br>
								<p>Current Image</p>
								<img src="{{ asset($product->product_img) }}" style="width: 70px; height: 60px;"> 
					 {{-- @error('product_img') 
					 <span class="text-danger">{{ $message }}</span>
					 @enderror --}}
						   </div>
						</div>
						
						</div>
			

			   </div> <!-- end row  -->
	   	 
							   <div class="text-xs-right">
	   <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Product">
							   </div>
						   </form>
			  </div>
			</div>
		  </div>
		</div>

	  </div>

	  @include('admin.body.footer')

	  {{-- TRIAL END --}}
@endsection
