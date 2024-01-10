@extends('admin.aDashboard')
@php
use Illuminate\Support\Facades\Auth;
@endphp
@section('admins')

<style>
    .hidden-button {
        display: none;
    }
</style>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
		
			<li class="breadcrumb-item text-sm">
				<a class="opacity-5 text-dark" href="javascript:;">Site Settings</a>
			</li>
		
		
			<li class="breadcrumb-item text-sm text-dark">Manage</li>

	</ol>
	<h6 class="font-weight-bolder mb-0">Site Settings</h6>

  </nav>


  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

			<div class="col-6">

			 <div class="card">
				<div class="card-body p-3">
					<div class="box">
									
									<!-- /.box-header -->
					
										<div class="box-body">
											<div class="table-responsive">
											  <table id="example1" class="table table-bordered table-striped">
												<thead>
													<tr>
														{{-- <th>Category Icon </th> --}}
														<th>Logo</th>
														<th>Favicon</th>
														<th>Title</th>
														<th>Footer</th>
														<th>Login Image</th>
														<th>Action</th>
					
													</tr>
												</thead>
												<tbody>
											
											 <tr>
												{{-- <td> <span><i class="{{ $item->category_icon }}"></i></span>  </td> --}}
												<td><img width="50px" height="50px" src="{{ asset($site->logo) }}" alt="{{ $site->title }}"></td>
												<td><img width="50px" height="50px" src="{{ asset($site->favicon) }}" alt="{{ $site->title }}"></td>
												<td>{{$site->title}}</td>
												<td>{{$site->footer}}</td>
												<td><img width="50px" height="50px" src="{{ asset($site->login_img) }}" alt="{{ $site->title }}"></td>
												<td>  <a id="loadSectionLink" class="btn btn-link text-dark px-3 mb-0" href="{{ route('student.edit', $site->id) }}">
													<i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit
												</a>
												</td>
					
											 </tr>
											
												</tbody>
					
											  </table>
											</div>
										</div>
					
									<!-- /.box-body -->
					 </div>
					 <!-- /.box -->
				</div>
			 </div>

			          
			</div>
			<!-- /.col -->


<!--   ------------ Add Category Page -------- -->


          <div class="col-5">

			 <div class="card">
				<div class="card-body p-3">
					<div class="box">
									<div class="box-header with-border">
									  <h6 class="box-title">Update Site </h6>
									</div>
									<!-- /.box-header -->
									<div class="box-body">
										<div class="table-responsive">
					
					
					 <form method="post" action="{{ route('site.store') }}" enctype="multipart/form-data">
							@csrf
					
						 <div class="form-group">
							<h6>Logo<span class="text-danger">*</span></h6>
							<div class="controls">
						 <input type="file"  name="logo" class="form-control" >
						 <img width="50px" height="50px" src="{{ asset($site->logo) }}" alt="{{ $site->title }}">
						
						</div>
						</div>


						 <div class="form-group">
							<h6>Favicon<span class="text-danger">*</span></h6>
							<div class="controls">
								<input type="file"  name="favicon" class="form-control" >
								<img width="50px" height="50px" src="{{ asset($site->favicon) }}" alt="{{ $site->title }}">
						
						</div>
						</div>


						 <div class="form-group">
							<h6>Title</h6>
							<div class="controls">
						 <input type="text"  name="title" value="{{$site->title}}" class="form-control" >
						
						</div>
						</div>

						 <div class="form-group">
							<h6>Link</h6>
							<div class="controls">
						 <input type="text"  value="{{$site->link}}" name="link" class="form-control" >
						
						</div>
						</div>

						
						<div class="form-group">
							<h6>Footer</h6>
							<div class="controls">
						 <input type="text"  value="{{$site->footer}}" name="footer" class="form-control" >
						
						</div>
						</div>


                        <div class="form-group">
							<h6>Login Image</h6>
							<input type="file"  name="login_img" class="form-control" >
							<img width="50px" height="50px" src="{{ asset($site->login_img) }}" alt="{{ $site->title }}">
                          </div>


					<div class="text-xs-right">
						<input type="submit" id="updateButton" class="btn btn-rounded btn-primary mb-5 hidden-button" value="Update Site">
											</div>
										</form>
									</div>
									</div>
									<!-- /.box-body -->
					 </div>
					 <!-- /.box -->
				</div>
			 </div>
			</div>

 


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  
	  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Handle click event on the "Edit" link
        $("#loadSectionLink").click(function (e) {
            e.preventDefault(); // Prevent the default link behavior (e.g., navigating to a new page)

            // Show the submit button
            $("#updateButton").removeClass("hidden-button");
        });
    });
</script>

	  


@endsection