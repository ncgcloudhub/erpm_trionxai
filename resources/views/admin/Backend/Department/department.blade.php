@extends('admin.aDashboard')
@section('admins')

  <!-- Content Wrapper. Contains page content -->
  
  <div class="container-fluid">
	<div class="row mt-4">
	  <div class="col-lg-8 mb-lg-0 mb-4">
		<div class="card">
		  <div class="card-body p-3">
			<div class="row">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								{{-- <th>Category Icon </th> --}}
								<th>Department Name</th>
								<th>Action</th>
								 
							</tr>
						</thead>
						<tbody>
	 @foreach($departments as $item)
	 <tr>
		{{-- <td> <span><i class="{{ $item->category_icon }}"></i></span>  </td> --}}
		<td>{{ $item->department }}</td>
		<td>
 <a href="{{ route('category.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
 <a href="{{ route('category.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
 	<i class="fa fa-trash"></i></a>
		</td>
							 
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
			<!-- /.col -->


<!--   ------------ Add Category Page -------- -->


<div class="col-lg-4 mb-lg-0 mb-4">
	<div class="card">
	  <div class="card-body p-3">
		<div class="row">


 <form method="post" action="{{ route('department.store') }}">
	 	@csrf
					   
	 <div class="form-group">
		<h6>Department Name<span class="text-danger">*</span></h6>
		<div class="controls">
	 <input type="text"  name="department" class="form-control" required=""> 
	 {{-- @error('category_name') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror  --}}
	</div>
	</div> 
				 
			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Department">					 
						</div>
					</form>
				</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box --> 
			</div>

 
		  </div>
		  <!-- /.row -->
	
	  
	  </div>
 
@endsection