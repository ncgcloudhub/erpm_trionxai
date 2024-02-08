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
					<form method="post" action="{{ route('taxproject.update.task') }}" enctype="multipart/form-data" >
						@csrf
						
						<input type="hidden" name="id" value="{{$task->id}}">
						<div class="row mb-3">
							<h6 class="col-5">Customer Name<span class="text-danger">*</span></h6>
							<div class="col-5">
								<select id="mySelect" name="customer_id" class="js-example-basic-single select2 form-control" required="">
								<option value="{{$task->customer->id}}" selected="">{{$task->customer->user_name}}</option>
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
						<h6>Task ID</h6>
						<div class="controls">
							<input type="text" value="{{$task->task_id}}" name="task_id" class="form-control" readonly >
			
					   </div>
					</div>

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
							<h6>Folder Location</h6>
							<div class="controls">
								<input type="text" value="{{$task->hyperlinks}}" name="hyperlinks" class="form-control" >
				
						   </div>
						</div>


						<div class="form-group">
							<h6>Priority<span class="text-danger">*</span></h6>
							<div class="controls">
								<select name="priority" class="form-control" required="">
									<option value="Normal" @if($task->priority == "Normal") selected @endif>Normal</option>
									<option value="Critical" @if($task->priority == "Critical") selected @endif>Critical</option>
									<option value="Major" @if($task->priority == "Major") selected @endif>Major</option>
									<option value="Minor" @if($task->priority == "Minor") selected @endif>Minor</option>
								</select>
							</div>
						</div>
						

								 <div class="form-group">
									<h6>Status<span class="text-danger">*</span></h6>
									<div class="controls">
										<select name="status" class="form-control" required="">
											<option value="Not Started" @if($task->status == "Not Started") selected @endif>Not Started</option>
											<option value="In Progress" @if($task->status == "In Progress") selected @endif>In Progress</option>
											<option value="In-Progress - Missing Docs" @if($task->status == "In-Progress - Missing Docs") selected @endif>In-Progress - Missing Docs</option>
											<option value="Not-In-Drake" @if($task->status == "Not-In-Drake") selected @endif>Not-In-Drake</option>
											<option value="Folder Created Only" @if($task->status == "Folder Created Only") selected @endif>Folder Created Only</option>
											<option value="Done" @if($task->status == "Done") selected @endif>Done</option>
											<option value="Data Entry Completed" @if($task->status == "Data Entry Completed") selected @endif>Data Entry Completed</option>
										</select>
									</div>
								</div>
								

								<div class="form-group">
									<h6>Tax Year<span class="text-danger">*</span></h6>
									<div class="controls">
										<select name="tax_year" class="form-control" required="">
											<option value="TAX YEAR 2019" @if($task->tax_year == "TAX YEAR 2019") selected @endif>TAX YEAR 2019</option>
											<option value="TAX YEAR 2020" @if($task->tax_year == "TAX YEAR 2020") selected @endif>TAX YEAR 2020</option>
											<option value="TAX YEAR 2021" @if($task->tax_year == "TAX YEAR 2021") selected @endif>TAX YEAR 2021</option>
											<option value="TAX YEAR 2022" @if($task->tax_year == "TAX YEAR 2022") selected @endif>TAX YEAR 2022</option>
											<option value="TAX YEAR 2023" @if($task->tax_year == "TAX YEAR 2023") selected @endif>TAX YEAR 2023</option>
											<option value="TAX YEAR 2024" @if($task->tax_year == "TAX YEAR 2024") selected @endif>TAX YEAR 2024</option>
										</select>
									</div>
								</div>
								


								<div class="form-group">
									<h6>eSignature</h6>
									<div class="controls">
										<select name="eSignature" class="form-control">
											<option value="" @if($task->eSignature == "") selected @endif>Select an Option</option>
											<option value="Not Started" @if($task->eSignature == "Not Started") selected @endif>Not Started</option>
											<option value="SENT" @if($task->eSignature == "SENT") selected @endif>SENT</option>
											<option value="READY FOR eSIG" @if($task->eSignature == "READY FOR eSIG") selected @endif>READY FOR eSIG</option>
											<option value="SIGNED" @if($task->eSignature == "SIGNED") selected @endif>SIGNED</option>
											<option value="PENDING" @if($task->eSignature == "PENDING") selected @endif>PENDING</option>
											<option value="In Person Sign" @if($task->eSignature == "In Person Sign") selected @endif>In Person Sign</option>
										</select>
									</div>
								</div>
								


								<div class="form-group">
									<h6>EF Status</h6>
									<div class="controls">
										<select name="ef_status" class="form-control">
											<option value="" @if($task->ef_status == "") selected @endif>Select an Option</option>
											<option value="DONE" @if($task->ef_status == "DONE") selected @endif>DONE</option>
											<option value="READY 2 EFILE" @if($task->ef_status == "READY 2 EFILE") selected @endif>READY 2 EFILE</option>
											<option value="IN PROGRESS" @if($task->ef_status == "IN PROGRESS") selected @endif>IN PROGRESS</option>
											<option value="HOLD" @if($task->ef_status == "HOLD") selected @endif>HOLD</option>
											<option value="ESTIMATES" @if($task->ef_status == "ESTIMATES") selected @endif>ESTIMATES</option>
											<option value="NOT STARTED" @if($task->ef_status == "NOT STARTED") selected @endif>NOT STARTED</option>
											<option value="REJECTED" @if($task->ef_status == "REJECTED") selected @endif>REJECTED</option>
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
