@extends('admin.aDashboard')
@section('admins')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

	  {{-- TRIAL START --}}
	  <div class="container-fluid">
	  <div class="row">
		<div class="col-lg-12 mb-lg-0 mb-4">
		  <div class="card">
			<div class="card-body p-3">
			  <div class="row">
			
				<div class="col">
					<form method="post" action="{{ route('project.update') }}" enctype="multipart/form-data" >
						@csrf
					
						<input type="hidden" name="id" value="{{$project->id}}">
							 <div class="form-group">
								<h6>Project Name<span class="text-danger">*</span></h6>
								<div class="controls">
									<input type="text" value="{{$project->project_name}}" name="project_name" class="form-control" required="">
						 
							   </div>
							</div>

																
			 <div class="form-group">
				<h6>Description<span class="text-danger">*</span></h6>
				<div class="controls">
					
					<textarea name="description" value="{{$project->description}}" class="form-control" id="tinymceExample" rows="10">{{$project->description}}</textarea>
			   </div>
			</div>


			 <div class="form-group">
				<h6>Comment</h6>
				<div class="controls">
					
					<textarea name="comment" class="form-control" value="{{$project->comment}}" id="tinymceExample" rows="10">{{$project->comment}}</textarea>
		
			   </div>
			</div>

				</div>

				{{-- 2nd Col --}}
				<div class="col">


					<div class="form-group">
						<h6>Assign Date<span class="text-danger">*</span></h6>
						<div class="controls">
							<input type="date" value="{{$project->assign_date}}" name="assign_date" class="form-control" required="">
				
					   </div>
					</div>
		
					<div class="form-group">
						<h6>Date to be Completed</h6>
						<div class="controls">
							<input type="date" value="{{$project->completion_date}}" name="completion_date" class="form-control" >
			
					   </div>
					</div>
		

						
					<div class="form-group">
						<h6>Assigned By<span class="text-danger">*</span></h6>
						<div class="controls">
							<select name="assigned_by" class="js-example-basic-single select2 form-control" required="" >
								<option value="{{$project->assigned_by}}" selected="">{{$project->user->name}}</option>
								@foreach($assignedby as $item)
					 <option value="{{ $item->id }}">{{ $item->name }}</option>	
								@endforeach
							</select>
							
						 </div>
					</div>
		
		
					<div class="form-group">
						<h6>Assign To<span class="text-danger">*</span></h6>
						<div class="controls">
							<select name="assign_to" class="js-example-basic-single select2 form-control" required="" >
								<option value="{{$project->assign_to}}" selected="">{{$project->admin->name}}</option>
								@foreach($assignedby as $item)
					 <option value="{{ $item->id }}">{{ $item->name }}</option>	
								@endforeach
							</select>
							
						 </div>
					</div>

						{{-- <div class="form-group">
							<h6>Bug<span class="text-danger">*</span></h6>
							<div class="controls">
								<input type="text" name="bug" class="form-control">
					
						   </div>
						</div>

						
						<div class="form-group">
							<h6>Issue<span class="text-danger">*</span></h6>
							<div class="controls">
								<input type="text" name="issue" class="form-control" required="">
					
						   </div>
						</div> --}}

						<div class="form-group">
							<h6>Hyperlinks</h6>
							<div class="controls">
								<input type="text" value="{{$project->hyperlinks}}" name="hyperlinks" class="form-control" >
				
						   </div>
						</div>


						<div class="form-group">
							<h6>Priority<span class="text-danger">*</span></h6>
							<div class="controls">
								<select name="priority" class="form-control" >
									<option value="{{$project->priority}}" selected="" >{{$project->priority}}</option>
									<option value="normal">Normal</option>
									<option value="critical" >Critical</option>
									<option value="major">Major</option>
									<option value="minor">Minor</option>
								</select>
								
							 </div>
								 </div>

								 <div class="form-group">
									<h6>Bug</h6>
									<div class="controls">
										<input type="text" value="{{$project->bug}}" name="bug" class="form-control" >
						
								   </div>
								</div>
								<div class="form-group">
									<h6>Issue</h6>
									<div class="controls">
										<input type="text" value="{{$project->issue}}" name="issue" class="form-control" >
						
								   </div>
								</div>
						
						{{-- <div class="form-group">
							<h6>Image<span class="text-danger">*</span></h6>
							<div class="controls">
								<input type="file" name="product_img" class="form-control" >
					
						   </div>
						</div> --}}
						
						</div>
			
			   </div> <!-- end row  -->
			   
						<div class="text-xs-right">
	  						 <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Project">
						</div>
				
						   </form>
			  </div>
			</div>
		  </div>
		</div>

	  </div>

	  @include('admin.body.footer')


	 


		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

		 <script>
			$(document).ready(function() {
			$('.select2').select2({
				placeholder: 'Select an option',
				allowClear: true
			});
		});
		</script>


	  

	  {{-- TRIAL END --}}
@endsection
