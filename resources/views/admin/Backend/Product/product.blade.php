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
								<h6>Short Description<span class="text-danger">*</span></h6>
								<div class="controls">
									<input type="text" name="short_description" class="form-control" required="">
						 
							   </div>
							</div>

																
			 <div class="form-group">
				<h6>Long Description<span class="text-danger">*</span></h6>
				<div class="controls">
					<textarea name="long_description" id="" cols="60" rows="5"></textarea>
		
			   </div>
			</div>


			<div class="form-group">
				<h6>Assign To<span class="text-danger">*</span></h6>
				<div class="controls">
					<select name="category_id" class="form-control" required="" >
						<option value="" selected="" disabled="">Select Employee</option>
						@foreach($categories as $category)
			 <option value="{{ $category->id }}">{{ $category->category_name }}</option>	
						@endforeach
					</select>
					
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
						

						 {{-- <div class="form-group">
							<h6>Product Details<span class="text-danger">*</span></h6>
							<div class="controls">
								<input type="text" name="product_details" class="form-control" >
				
						   </div>
						</div> --}}

						{{-- <div class="form-group">
							<h6>Product VAT<span class="text-danger">*</span></h6>
							<div class="controls">
								<input type="number" name="p_vat" class="form-control">
					
						   </div>
						</div> --}}

						
						<div class="form-group">
							<h6>Assign Date<span class="text-danger">*</span></h6>
							<div class="controls">
								<input type="date" name="assign_date" class="form-control" required="">
					
						   </div>
						</div>

						<div class="form-group">
							<h6>Time Period<span class="text-danger">*</span></h6>
							<div class="controls">
								<input type="text" name="time_period" class="form-control" >
				
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
