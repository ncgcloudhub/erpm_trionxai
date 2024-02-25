@extends('admin.aDashboard')
@section('admins')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>



	  {{-- TRIAL START --}}
	  <div class="container-fluid">

		<div style="float: right">
		<a class="btn btn-link text-dark px-0 mb-0" href="{{ route('taxproject.task.edit',$task->id) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i></a>		
			
<a class="btn btn-link text-danger text-gradient px-0 mb-0" href="{{ route('taxprojects.tasks.deletes',$task->id) }}" onclick="return confirm('Are you sure you want to delete this Task')"><i class="fa-solid fa-trash text-dark me-2"></i></a>
</div>

	  <div class="row">
		<div class="col-lg-12 mb-lg-0 mb-4">
		  <div class="card">
			<div class="card-body p-3">
			  <div class="row">
			
				<div class="col">
					@php
						$previousTaskId = App\Models\TaxTaskProject::where('id', '<', $task->id)->max('id');
						$nextTaskId = App\Models\TaxTaskProject::where('id', '>', $task->id)->min('id');
					@endphp

				@if($previousTaskId)
					<a href="{{ route('taxproject.task.view', ['id' => $previousTaskId]) }}"> <span class="badge bg-gradient-primary">Previous</span></a>
				@endif

				@if($nextTaskId)
					<a href="{{ route('taxproject.task.view', ['id' => $nextTaskId]) }}"> <span class="badge bg-gradient-secondary">Next</span></a>
				@endif


						<input type="hidden" name="id" value="{{$task->id}}">
						<div class="row mb-3">
							<h6 class="col-5">Customer Name<span class="text-danger">*</span></h6>
							<div class="col-5">
								<select id="mySelect" name="customer_id" class="js-example-basic-single select2 form-control" disabled>
								<option value="{{$task->customer->id}}" selected="" disabled>{{$task->customer->user_name}}</option>
								@foreach($customers as $customer)
										 <option value="{{ $customer->id }}">{{ $customer->user_name }}</option>	
								@endforeach
								
								</select>
							</div>
							</div>

							<div class="form-group">
								<h6>Tax Return Type</h6>
								<div class="controls">
									<input type="text" value="{{$task->customer->customer_type}}" name="taxreturntype" id="taxreturntype" class="form-control" readonly >					
							   </div>
							</div>

							<div class="form-group">
								<h6>Business Type</h6>
								<div class="controls">
									<input type="text" value="{{$task->customer->business_type}}" name="businesstype" id="businesstype" class="form-control" readonly >					
							   </div>
							</div>

							<div class="form-group">
								<h6>Phone Number</h6>
								<div class="controls">
									<input type="text" value="{{$task->customer->personal_phone}}" name="phonenumber" id="phonenumber" class="form-control" readonly >					
							   </div>
							</div>


							<div class="form-group">
								<h6>SSN</h6>
								<div class="controls">
									<input type="text" value="{{$task->customer->ssn}}" name="ssn" id="ssn" class="form-control" readonly >					
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
						<h6>Task ID</h6>
						<div class="controls">
							<input type="text" value="{{$task->task_id}}" name="task_id" class="form-control" readonly >
			
					   </div>
					</div>


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
							<h6>Folder Location</h6>
							<div class="controls">
								<input type="text" value="{{$task->hyperlinks}}" name="hyperlinks" class="form-control" readonly >
				
						   </div>
						</div>


						<div class="form-group">
							<h6>Priority<span class="text-danger">*</span></h6>
							<div class="controls">
								<select name="priority" class="form-control" @readonly(true) >
									<option value="{{$task->priority}}" selected="">{{$task->priority}}</option>
									<option value="Normal">Normal</option>
									<option value="Critical" >Critical</option>
									<option value="Major">Major</option>
									<option value="Minor">Minor</option>
								</select>
								
							 </div>
						</div>


						<div class="form-group">
							<h6>Status<span class="text-danger">*</span></h6>
								<div class="controls">
										<select name="status" class="form-control" @readonly(true) >
											<option value="{{$task->status}}" selected="">{{$task->status}}</option>
											<option value="Not Started">Not Started</option>
											<option value="On Progress" >On Progress</option>
											<option value="Done">Done</option>
											<option value="Data Entry Completed">Data Entry Completed</option>
										</select>									
								</div>
						</div>


						<div class="form-group">
							<h6>Tax Year<span class="text-danger">*</span></h6>
							<div class="controls">
								<select name="tax_year" class="form-control" @readonly(true) >
									<option value="{{$task->tax_year}}" selected="" disabled="">{{$task->tax_year}}</option>
									<option value="TAX YEAR 2019">TAX YEAR 2019</option>
									<option value="TAX YEAR 2020">TAX YEAR 2020</option>
									<option value="TAX YEAR 2021">TAX YEAR 2021</option>
									<option value="TAX YEAR 2022">TAX YEAR 2022</option>
									<option value="TAX YEAR 2023">TAX YEAR 2023</option>
									<option value="TAX YEAR 2024">TAX YEAR 2024</option>								
								</select>								
							 </div>
						</div>


						<div class="form-group">
							<h6>eSignature</h6>
							<div class="controls">
								<select name="eSignature" class="form-control" @readonly(true) >
									<option value="{{$task->eSignature}}" selected="" disabled="">{{$task->eSignature}}</option>
									<option value="SENT">SENT</option>
									<option value="READY FOR eSIG">READY FOR eSIG</option>
									<option value="SIGNED">SIGNED</option>
									<option value="PENDING">PENDING</option>
									<option value="In Person Sign">In Person Sign</option>
									
								</select>								
							 </div>
						</div>


						<div class="form-group">
							<h6>EF Status</h6>
							<div class="controls">
								<select name="ef_status" class="form-control" @readonly(true) >
									<option value="{{$task->ef_status}}" selected="" disabled="">{{$task->ef_status}}</option>
									<option value="DONE">DONE</option>
									<option value="READY 2 EFILE">READY 2 EFILE</option>
									<option value="IN PROGRESS">IN PROGRESS</option>
									<option value="HOLD">HOLD</option>
									<option value="ESTIMATES">ESTIMATES</option>
									<option value="NOT STARTED">NOT STARTED</option>
									<option value="REJECTED">REJECTED</option>
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
