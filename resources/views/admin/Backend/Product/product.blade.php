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
					<form method="post" action="{{ route('product-store') }}" enctype="multipart/form-data" >
						@csrf
					<div class="form-group">
						<h6>Category<span class="text-danger">*</span></h6>
						<div class="controls">
							<select name="category_id" class="form-control" required="" >
								<option value="" selected="" disabled="">Select Category</option>
								@foreach($categories as $category)
					 <option value="{{ $category->id }}">{{ $category->category_name }}</option>	
								@endforeach
							</select>
							@error('category_id') 
						 <span class="text-danger">{{ $message }}</span>
						 @enderror 
						 </div>
							 </div>

							 <div class="form-group">
								<h6>Product Name<span class="text-danger">*</span></h6>
								<div class="controls">
									<input type="text" name="product_name" class="form-control" required="">
						 @error('product_name') 
						 <span class="text-danger">{{ $message }}</span>
						 @enderror
							   </div>
							</div>

																
			 <div class="form-group">
				<h6>Model<span class="text-danger">*</span></h6>
				<div class="controls">
					<input type="text" name="product_code" class="form-control" required="">
		 @error('product_code') 
		 <span class="text-danger">{{ $message }}</span>
		 @enderror
			   </div>
			</div>

							<div class="form-group">
								<h6>Sale Price<span class="text-danger">*</span></h6>
								<div class="controls">
									<input type="text" name="sale_price" class="form-control" required="">
						 @error('sale_price') 
						 <span class="text-danger">{{ $message }}</span>
						 @enderror
							   </div>
							</div>

							<div class="form-group">
								<h6>Cost Price<span class="text-danger">*</span></h6>
								<div class="controls">
									<input type="text" name="cost_price" class="form-control" >
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
								<input type="text" name="product_details" class="form-control" >
					 {{-- @error('product_details') 
					 <span class="text-danger">{{ $message }}</span>
					 @enderror --}}
						   </div>
						</div>

						<div class="form-group">
							<h6>Product VAT<span class="text-danger">*</span></h6>
							<div class="controls">
								<input type="number" name="p_vat" class="form-control">
					 {{-- @error('p_vat') 
					 <span class="text-danger">{{ $message }}</span>
					 @enderror --}}
						   </div>
						</div>

						
						<div class="form-group">
							<h6>Image<span class="text-danger">*</span></h6>
							<div class="controls">
								<input type="file" name="product_img" class="form-control" >
					 {{-- @error('product_img') 
					 <span class="text-danger">{{ $message }}</span>
					 @enderror --}}
						   </div>
						</div>
						
						</div>
			
			   </div> <!-- end row  -->
			   @if(Auth::guard('admin')->user()->type=="1" || (Auth::guard('admin')->user()->type=="2"))
						<div class="text-xs-right">
	  						 <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Product">
						</div>
				@endif
						   </form>
			  </div>
			</div>
		  </div>
		</div>

	  </div>

	  @include('admin.body.footer')

	  {{-- TRIAL END --}}
@endsection
