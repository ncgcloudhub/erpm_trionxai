@extends('admin.aDashboard')
@php
use Illuminate\Support\Facades\Auth;
@endphp
@section('admins')



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
									<div class="box-header with-border">
										<h3 class="box-title">Category List <span class="badge badge-pill badge-danger"> {{ count($notices) }} </span></h3>
									</div>
									<!-- /.box-header -->
					
										<div class="box-body">
											<div class="table-responsive">
											  <table id="example1" class="table table-bordered table-striped">
												<thead>
													<tr>
														{{-- <th>Category Icon </th> --}}
														<th>Notice Date</th>
														<th>Notice Details</th>
					
													</tr>
												</thead>
												<tbody>
											 @foreach($notices as $notice)
											 <tr>
												{{-- <td> <span><i class="{{ $item->category_icon }}"></i></span>  </td> --}}
												<td>{{$notice->assign_date}}</td>
												<td>{{$notice->description}}</td>
					
											 </tr>
											@endforeach
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


          <div class="col-6">

			 <div class="card">
				<div class="card-body p-3">
					<div class="box">
									<div class="box-header with-border">
									  <h6 class="box-title">Add Category </h6>
									</div>
									<!-- /.box-header -->
									<div class="box-body">
										<div class="table-responsive">
					
					
					 <form method="post" action="{{ route('notice.add') }}">
							@csrf
					
						 <div class="form-group">
							<h6>Notice Date <span class="text-danger">*</span></h6>
							<div class="controls">
						 <input type="date"  name="assign_date" class="form-control" >
						
						</div>
						</div>


						 <div class="form-group">
							<h6>Notice Details<span class="text-danger">*</span></h6>
							<div class="controls">
						<textarea name="description" class="form-control" id="" rows="10"></textarea>
						
						</div>
						</div>


						 <div class="form-group">
							<h6>Notice Deadline</h6>
							<div class="controls">
						 <input type="date"  name="deadline" class="form-control" >
						
						</div>
						</div>


                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="fcustomCheck1" checked="" name="status">
                            <label class="custom-control-label" for="customCheck1">Add to Dashboard</label>
                          </div>


					<div class="text-xs-right">
						<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Notice">
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
  



@endsection