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
					<form method="post" action="{{ route('project.update.task') }}" enctype="multipart/form-data" >
						@csrf
						
						<input type="hidden" name="id" value="{{$task->id}}">
							 <div class="form-group">
								<h6>Task Name<span class="text-danger">*</span></h6>
								<div class="controls">
									<input type="text" value="{{$task->task_name}}" name="task_name" class="form-control" required="">
						 
							   </div>
							</div>

																
			 <div class="form-group">
				<h6>Description<span class="text-danger">*</span></h6>
				<div class="controls">
					
					<textarea name="description" value="{{$task->description}}" class="form-control" id="tinymceExample" rows="10">{{$task->description}}</textarea>

			   </div>
			</div>


			 <div class="form-group">
				<h6>Comment</h6>
				<div class="controls">
					
					<textarea name="comment" class="form-control" value="{{$task->comment}}" id="tinymceExample" rows="10">{{$task->comment}}</textarea>
		
			   </div>
			</div>


				</div>

				{{-- 2nd Col --}}
				<div class="col">


					<div class="form-group">
						<h6>Assign Date<span class="text-danger">*</span></h6>
						<div class="controls">
							<input type="date" value="{{$task->assign_date}}" name="assign_date" class="form-control" required="">
				
					   </div>
					</div>
		
					<div class="form-group">
						<h6>Date to be Completed</h6>
						<div class="controls">
							<input type="date" value="{{$task->completion_date}}" name="completion_date" class="form-control" >
			
					   </div>
					</div>
		
		
					<div class="form-group">
						<h6>Assigned By<span class="text-danger">*</span></h6>
						<div class="controls">
							<select name="assigned_by" class="js-example-basic-single select2 form-control" required="">
								<option value="{{$task->assigned_by}}" selected="">{{$task->user->name}}</option>
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
								<option value="{{$task->assign_to}}" selected="">{{$task->admin->name}}</option>
								@foreach($assignedby as $item)
					 <option value="{{ $item->id }}">{{ $item->name }}</option>	
								@endforeach
							</select>
							
						 </div>
					</div>


						<div class="form-group">
					<h6>Project List<span class="text-danger">*</span></h6>
					<div class="controls">
						<select name="project_list" class="js-example-basic-single select2 form-control" required="" >
							<option value="{{$task->project_list}}" selected="">{{$task->project->project_name}}</option>
							@foreach($categories as $category)
				 <option value="{{ $category->id }}">{{ $category->project_name }}</option>	
							@endforeach
						</select>
						
					 </div>
						 </div>
						

						 <div class="form-group">
							<h6>Sub Task</h6>
							<div class="controls">
								<input type="text" value="{{$task->sub_task}}" name="sub_task" class="form-control" >
				
						   </div>
						</div>

						<div class="form-group">
							<h6>Bug</h6>
							<div class="controls">
								<input type="text" value="{{$task->bug}}" name="bug" class="form-control">
					
						   </div>
						</div>

						
						<div class="form-group">
							<h6>Issue</h6>
							<div class="controls">
								<input type="text" value="{{$task->issue}}" name="issue" class="form-control">
					
						   </div>
						</div>

						<div class="form-group">
							<h6>Hyperlinks</h6>
							<div class="controls">
								<input type="text" value="{{$task->hyperlinks}}" name="hyperlinks" class="form-control" >
				
						   </div>
						</div>


						<div class="form-group">
							<h6>Priority<span class="text-danger">*</span></h6>
							<div class="controls">
								<select name="priority" class="form-control" required="" >
									<option value="{{$task->priority}}" selected="">{{$task->priority}}</option>
									<option value="normal">Normal</option>
									<option value="critical" >Critical</option>
									<option value="major">Major</option>
									<option value="minor">Minor</option>
								</select>
								
							 </div>
								 </div>

						<div class="form-group">
							<h6>Status<span class="text-danger">*</span></h6>
								<div class="controls">
										<select name="status" class="form-control" required="" >
											<option value="{{$task->status}}" selected="">{{$task->status}}</option>
											<option value="Not Started">Not Started</option>
											<option value="On Progress" >On Progress</option>
											<option value="Done">Done</option>
										</select>
										
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
	  						 <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Task">
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
