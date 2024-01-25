@extends('admin.aDashboard')
@section('admins')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">

	 <section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit Admin User </h4>

			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
	 <form method="post" action="{{ route('admin.user.update') }}" enctype="multipart/form-data" >
	 	@csrf

	 	<input type="hidden" name="id" value="{{ $adminuser->id }}">	
	 <input type="hidden" name="old_image" value="{{ $adminuser->profile_photo_path }}">



					  <div class="row">
						<div class="col-12">

			<div class="row">
				<div class="col-md-6">

	 <div class="form-group">
		<h5>Admin User Name  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="name" class="form-control" value="{{ $adminuser->name }}" > </div>
	</div>

				</div> <!-- end cold md 6 -->



				<div class="col-md-6">

	  <div class="form-group">
		<h5>Admin Email  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="email" name="email" class="form-control" value="{{ $adminuser->email }}" > </div>
	</div>

				</div> <!-- end cold md 6 --> 

			</div>	<!-- end row 	 -->	




	<div class="row">
				<div class="col-md-6">

	 <div class="form-group">
		<h5>Admin User Phone  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="phone" class="form-control" value="{{ $adminuser->phone }}" > </div>
	</div>

				</div> <!-- end cold md 6 -->


				<div class="col-md-3 ">
					<div class="form-group">
						<h5>Type</h5>	
							<select id="type" value="{{ $adminuser->type }}" name="type" class="form-control" >
								<option value="1" selected="">Super Admin</option>
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


			</div>	<!-- end row 	 -->	







	 <div class="row">

				<div class="col-md-6">
		<div class="form-group">
		<h5>Admin User Image <span class="text-danger">*</span></h5>
		<div class="controls">
 <input type="file" name="profile_photo_path" class="form-control" id="image"> </div>
	</div>
				</div><!-- end cold md 6 --> 

				<div class="col-md-6">
	<img id="showImage" src="{{ url('upload/no_image.jpg') }}" style="width: 100px; height: 100px;">				

				</div><!-- end cold md 6 -->  

			</div><!-- end row 	 -->	



	 <hr>



	<div class="row">

<div class="col-md-4">
			<div class="form-group">

		<div class="controls">
			
			<fieldset>
				<input type="checkbox" id="checkbox_3" name="category" value="1" {{ $adminuser->category == 1 ? 'checked' : '' }}>
				<label for="checkbox_3">Category</label>
			</fieldset>

			<fieldset>
				<input type="checkbox" id="checkbox_4" name="product" value="1" {{ $adminuser->product == 1 ? 'checked' : '' }}>
				<label for="checkbox_4">Product</label>
			</fieldset>

			<fieldset>
				<input type="checkbox" id="checkbox_5" name="customer" value="1" {{ $adminuser->customer == 1 ? 'checked' : '' }}>
				<label for="checkbox_5">Customer</label>
			</fieldset>

			<fieldset>
				<input type="checkbox" id="checkbox_6" name="report" value="1" {{ $adminuser->report == 1 ? 'checked' : '' }}>
				<label for="checkbox_6">Report</label>
			</fieldset>
		</div>
	</div>
</div>



<div class="col-md-4">
			<div class="form-group">

		<div class="controls">
			<fieldset>
				<input type="checkbox" id="checkbox_7" name="sale" value="1" {{ $adminuser->sale == 1 ? 'checked' : '' }}>
				<label for="checkbox_7">Sale</label>
			</fieldset>
			<fieldset>
				<input type="checkbox" id="checkbox_8" name="chalan" value="1" {{ $adminuser->chalan == 1 ? 'checked' : '' }}>
				<label for="checkbox_8">Chalan</label>
			</fieldset>

			<fieldset>
				<input type="checkbox" id="checkbox_9" name="l_c" value="1" {{ $adminuser->l_c == 1 ? 'checked' : '' }}>
				<label for="checkbox_9">Purchase</label>
			</fieldset>


			<fieldset>
				<input type="checkbox" id="checkbox_10" name="hr" value="1" {{ $adminuser->hr == 1 ? 'checked' : '' }}>
				<label for="checkbox_10">HR</label>
			</fieldset>

			<fieldset>
				<input type="checkbox" id="checkbox_11" name="expense" value="1" {{ $adminuser->expense == 1 ? 'checked' : '' }}>
				<label for="checkbox_11">Expense</label>
			</fieldset>
		</div>
	</div>
</div>




<div class="col-md-4">
	<div class="form-group">

		<div class="controls">
			<fieldset>
				<input type="checkbox" id="checkbox_12" name="supplier" value="1" {{ $adminuser->supplier == 1 ? 'checked' : '' }}>
				<label for="checkbox_12">Supplier</label>
			</fieldset>

			<fieldset>
				<input type="checkbox" id="checkbox_16" name="adminuserrole" value="1" {{ $adminuser->adminuserrole == 1 ? 'checked' : '' }}>
				<label for="checkbox_16">Adminuserrole</label>
			</fieldset>

			<fieldset>
				<input type="checkbox" id="checkbox_17" name="bank" value="1" {{ $adminuser->bank == 1 ? 'checked' : '' }}>
				<label for="checkbox_17">Bank</label>
			</fieldset>
		</div>
			</div>
		</div>
						</div>





			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Admin User">					 
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>



	  </div>


<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
			 $('#showImage').attr('src',e.target.result);	
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>


@endsection 