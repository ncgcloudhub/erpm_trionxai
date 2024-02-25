@extends('admin.aDashboard')
@section('admins')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

	  {{-- TRIAL START --}}
	  <div class="container-fluid">

		<div style="float: right">
			<a class="btn btn-link text-dark px-0 mb-0" href="{{ route('project.task.edit',$task->id) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i></a>		
				
			<a class="btn btn-link text-danger text-gradient px-0 mb-0" href="{{ route('projects.tasks.deletes',$task->id) }}" onclick="return confirm('Are you sure you want to delete this Task')"><i class="fa-solid fa-trash text-dark me-2"></i></a>
		</div>

	  <div class="row">
		<div class="col-lg-12 mb-lg-0 mb-4">
		  <div class="card">
			<div class="card-body p-3">
			  <div class="row">
			
				<div class="col">

					@php
						$previousTaskId = App\Models\Product::where('id', '<', $task->id)->max('id');
						$nextTaskId = App\Models\Product::where('id', '>', $task->id)->min('id');
					@endphp

				@if($previousTaskId)
					<a href="{{ route('project.task.view', ['id' => $previousTaskId]) }}"> <span class="badge bg-gradient-primary">Previous</span></a>
				@endif

				@if($nextTaskId)
					<a href="{{ route('project.task.view', ['id' => $nextTaskId]) }}"> <span class="badge bg-gradient-secondary">Next</span></a>
				@endif
					
						<input type="hidden" name="id" value="{{$task->id}}">
							 <div class="form-group">
								<h6>Task Name<span class="text-danger">*</span></h6>
								<div class="controls">
									<input type="text" value="{{$task->task_name}}" name="task_name" class="form-control" readonly>
						 
							   </div>
							</div>

																
                            <div class="form-group">
                                <h6>Description<span class="text-danger">*</span></h6>
                                <div class="controls">
                                    <textarea name="description" class="form-control" id="tinymceExample" rows="10" readonly>{{$task->description}}</textarea>
                                </div>
                            </div>
                            


			 <div class="form-group">
				<h6>Comment</h6>
				<div class="controls">
					
					<textarea name="comment" class="form-control" id="tinymceExample" rows="10">{{ $task->comment }}</textarea>

		
			   </div>
			</div>


				</div>

				{{-- 2nd Col --}}
				<div class="col">


					<div class="form-group">
						<h6>Assign Date<span class="text-danger">*</span></h6>
						<div class="controls">
							<input type="date" value="{{$task->assign_date}}" name="assign_date" class="form-control" readonly>
				
					   </div>
					</div>
		
					<div class="form-group">
						<h6>Date to be Completed</h6>
						<div class="controls">
							<input type="date" value="{{$task->completion_date}}" name="completion_date" class="form-control" readonly>
			
					   </div>
					</div>
		
		
					<div class="form-group">
                        <h6>Assigned By<span class="text-danger">*</span></h6>
                        <div class="controls">
                            <select name="assigned_by" class="js-example-basic-single select2 form-control" disabled>
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
                            <select name="assign_to" class="js-example-basic-single select2 form-control" disabled>
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
                            <select name="project_list" class="js-example-basic-single select2 form-control" disabled>
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
								<input type="text" value="{{$task->sub_task}}" name="sub_task" class="form-control" readonly >
				
						   </div>
						</div>

						<div class="form-group">
							<h6>Bug</h6>
							<div class="controls">
								<input type="text" value="{{$task->bug}}" name="bug" class="form-control" readonly>
					
						   </div>
						</div>

						
						<div class="form-group">
							<h6>Issue</h6>
							<div class="controls">
								<input type="text" value="{{$task->issue}}" name="issue" class="form-control" readonly>
					
						   </div>
						</div>

						<div class="form-group">
							<h6>Hyperlinks</h6>
							<div class="controls">
								<input type="text" value="{{$task->hyperlinks}}" name="hyperlinks" class="form-control" readonly >
				
						   </div>
						</div>


						<div class="form-group">
							<h6>Priority<span class="text-danger">*</span></h6>
							<div class="controls">
								<select name="priority" class="form-control" @readonly(true) >
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
										<select name="status" class="form-control" @readonly(true) >
											<option value="{{$task->status}}" selected="">{{$task->status}}</option>
											<option value="normal">Normal</option>
											<option value="critical" >Critical</option>
											<option value="major">Major</option>
											<option value="minor">Minor</option>
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
			   
						{{-- <div class="text-xs-right">
	  						 <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Task">
						</div> --}}
				
						
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


<script>
    document.addEventListener('DOMContentLoaded', function () {
        tinymce.init({
            selector: '#tinymceExample',
            readonly: true,
            // height: 300, // Set the desired height
            plugins: 'autoresize',
            toolbar: 'undo redo',
            menubar: true,
            autoresize_bottom_margin: 16
        });
    });
</script>


	  

	  {{-- TRIAL END --}}
@endsection
