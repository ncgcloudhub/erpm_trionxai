@extends('admin.aDashboard')
@section('admins')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

	  {{-- TRIAL START --}}
	  <div class="container-fluid">
	  <div class="row">
		<div class="col-lg-12 mb-lg-0 mb-4">
		  <div class="card">
			<div class="card-body p-3">
			  <div class="row">
			
				<div class="col">
					<form method="post" action="{{ route('taxproject.store.tasks') }}" enctype="multipart/form-data" >
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
								<h6>Subject</h6>
								<div class="controls">
									<input type="text" value="{{$task->subject}}" name="subject" class="form-control" >
								</div>
							</div>

							<!-- clientType Field -->
							<div class="form-group">
								<h6>Client Type</h6>
								<div class="controls">
									<select name="clientType" class="form-control" id="clientType" >
										<option value="" selected disabled>Select an Option</option>
										<option value="New Client" @if($task->clientType == "New Client") selected @endif>New Client</option>
										<option value="Existing Client" @if($task->clientType == "Existing Client") selected @endif>Existing Client</option>
									</select>
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
						<h6>Assigned To<span class="text-danger">*</span></h6>
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
						<h6>Tax Project List <span class="text-danger">*</span></h6>
						<div class="controls">
							<select name="project_list" id="project-list" class="js-example-basic-single select2 form-control" required onchange="toggleTaxFields()">
								<option value="{{$task->project_list}}" selected="">{{$task->project->project_name}}</option>
								@foreach($categories as $category)
									<option value="{{ $category->id }}">{{ $category->project_name }}</option>
								@endforeach
							</select>
						</div>
					</div>

						 <div class="form-group toggle-category">
							<h6>Category <span class="text-danger">*</span></h6>
							<div class="controls">
								<select name="category[]" class="form-control select2-multi" id="categorySelect" multiple>
									@foreach($immigrationcategories as $category)
									<option value="{{ $category->value }}" 
										@if(in_array($category->value, old('category', $task->category))) selected @endif>
										{{ $category->category_name }}
									</option>
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
										<select name="priority" class="form-control" required id="prioritySelect" onchange="toggleInputField(this, 'priorityInput')">
											<option value="" disabled>Select an Option</option>
											<option value="Normal" @if($task->priority == "Normal") selected @endif>Normal</option>
											<option value="Critical" @if($task->priority == "Critical") selected @endif>Critical</option>
											<option value="Major" @if($task->priority == "Major") selected @endif>Major</option>
											<option value="Minor" @if($task->priority == "Minor") selected @endif>Minor</option>
											@if(!in_array($task->priority, ['Normal', 'Critical', 'Major', 'Minor'])) 
												<option value="{{ $task->priority }}" selected>{{ $task->priority }}</option>
											@endif
											<option value="other">Add an Item</option>
										</select>
										<input type="text" name="custom_priority" class="form-control mt-2" id="priorityInput" placeholder="Enter Priority" style="{{ $task->priority && !in_array($task->priority, ['Normal', 'Critical', 'Major', 'Minor']) ? 'display:block;' : 'display:none;' }}" value="{{ !in_array($task->priority, ['Normal', 'Critical', 'Major', 'Minor']) ? $task->priority : '' }}">
									</div>
								</div>
						

								 <!-- Status Dropdown -->
								<div class="form-group">
									<h6>Status<span class="text-danger">*</span></h6>
									<div class="controls">
										<select name="status" class="form-control" required="" id="statusSelect" onchange="toggleInputField(this, 'statusInput')">
											<option value="" disabled>Select an Option</option>
											<option value="Not Started" @if($task->status == "Not Started") selected @endif>Not Started</option>
											<option value="In Progress" @if($task->status == "In Progress") selected @endif>In Progress</option>
											<option value="In-Progress - Missing Docs" @if($task->status == "In-Progress - Missing Docs") selected @endif>In-Progress - Missing Docs</option>
											<option value="Not-In-Drake" @if($task->status == "Not-In-Drake") selected @endif>Not-In-Drake</option>
											<option value="Folder Created Only" @if($task->status == "Folder Created Only") selected @endif>Folder Created Only</option>
											<option value="Data Entry Completed" @if($task->status == "Data Entry Completed") selected @endif>Data Entry Completed</option>
											<option value="Get Extension" @if($task->status == "Get Extension") selected @endif>Get Extension</option>
											<option value="Estimates" @if($task->status == "Estimates") selected @endif>Estimates</option>
											<option value="Done" @if($task->status == "Done") selected @endif>Done</option>
											@if(!in_array($task->status, ['Not Started', 'In Progress', 'In-Progress - Missing Docs', 'Not-In-Drake', 'Folder Created Only', 'Data Entry Completed', 'Get Extension', 'Estimates', 'Done'])) 
												<option value="{{ $task->status }}" selected>{{ $task->status }}</option>
											@endif
											<option value="other">Add an Item</option>
										</select>
										<input type="text" name="custom_status" class="form-control mt-2" id="statusInput" placeholder="Enter Status" style="{{ $task->status && !in_array($task->status, ['Not Started', 'In Progress', 'In-Progress - Missing Docs', 'Not-In-Drake', 'Folder Created Only', 'Data Entry Completed', 'Get Extension', 'Estimates', 'Done']) ? 'display:block;' : 'display:none;' }}" value="{{ !in_array($task->status, ['Not Started', 'In Progress', 'In-Progress - Missing Docs', 'Not-In-Drake', 'Folder Created Only', 'Data Entry Completed', 'Get Extension', 'Estimates', 'Done']) ? $task->status : '' }}">
									</div>
								</div>

								<!-- Tax Year Dropdown -->
								<div class="form-group toggle-field">
									<h6>Tax Year<span class="text-danger">*</span></h6>
									<div class="controls">
										<select name="tax_year" class="form-control" id="taxYearSelect" onchange="toggleInputField(this, 'taxYearInput')">
											<option value="" disabled>Select an Option</option>
											<option value="TAX YEAR 2019" @if($task->tax_year == "TAX YEAR 2019") selected @endif>TAX YEAR 2019</option>
											<option value="TAX YEAR 2020" @if($task->tax_year == "TAX YEAR 2020") selected @endif>TAX YEAR 2020</option>
											<option value="TAX YEAR 2021" @if($task->tax_year == "TAX YEAR 2021") selected @endif>TAX YEAR 2021</option>
											<option value="TAX YEAR 2022" @if($task->tax_year == "TAX YEAR 2022") selected @endif>TAX YEAR 2022</option>
											<option value="TAX YEAR 2023" @if($task->tax_year == "TAX YEAR 2023") selected @endif>TAX YEAR 2023</option>
											<option value="TAX YEAR 2024" @if($task->tax_year == "TAX YEAR 2024") selected @endif>TAX YEAR 2024</option>
											<option value="Tax Amendment 2020" @if($task->tax_year == "Tax Amendment 2020") selected @endif>Tax Amendment 2020</option>
											<option value="Tax Amendment 2021" @if($task->tax_year == "Tax Amendment 2021") selected @endif>Tax Amendment 2021</option>
											<option value="Tax Amendment 2022" @if($task->tax_year == "Tax Amendment 2022") selected @endif>Tax Amendment 2022</option>
											<option value="Tax Amendment 2023" @if($task->tax_year == "Tax Amendment 2023") selected @endif>Tax Amendment 2023</option>
											<option value="Tax Amendment 2024" @if($task->tax_year == "Tax Amendment 2024") selected @endif>Tax Amendment 2024</option>
											@if(!in_array($task->tax_year, ['TAX YEAR 2019', 'TAX YEAR 2020', 'TAX YEAR 2021', 'TAX YEAR 2022', 'TAX YEAR 2023', 'TAX YEAR 2024', 'Tax Amendment 2020', 'Tax Amendment 2021', 'Tax Amendment 2022', 'Tax Amendment 2023', 'Tax Amendment 2024']))
												<option value="{{ $task->tax_year }}" selected>{{ $task->tax_year }}</option>
											@endif
											<option value="other">Add an Item</option>
										</select>
										<input type="text" name="custom_tax_year" class="form-control mt-2" id="taxYearInput" placeholder="Enter Tax Year" style="{{ $task->tax_year && !in_array($task->tax_year, ['TAX YEAR 2019', 'TAX YEAR 2020', 'TAX YEAR 2021', 'TAX YEAR 2022', 'TAX YEAR 2023', 'TAX YEAR 2024', 'Tax Amendment 2020', 'Tax Amendment 2021', 'Tax Amendment 2022', 'Tax Amendment 2023', 'Tax Amendment 2024']) ? 'display:block;' : 'display:none;' }}" value="{{ !in_array($task->tax_year, ['TAX YEAR 2019', 'TAX YEAR 2020', 'TAX YEAR 2021', 'TAX YEAR 2022', 'TAX YEAR 2023', 'TAX YEAR 2024', 'Tax Amendment 2020', 'Tax Amendment 2021', 'Tax Amendment 2022', 'Tax Amendment 2023', 'Tax Amendment 2024']) ? $task->tax_year : '' }}">
									</div>
								</div>

								<!-- eSignature Dropdown -->
								<div class="form-group toggle-field">
									<h6>eSignature</h6>
									<div class="controls">
										<select name="eSignature" class="form-control" id="eSignatureSelect" onchange="toggleInputField(this, 'eSignatureInput')">
											<option value="" disabled>Select an Option</option>
											<option value="Not Started" @if($task->eSignature == "Not Started") selected @endif>Not Started</option>
											<option value="SENT" @if($task->eSignature == "SENT") selected @endif>SENT</option>
											<option value="READY FOR eSIG" @if($task->eSignature == "READY FOR eSIG") selected @endif>READY FOR eSIG</option>
											<option value="SIGNED" @if($task->eSignature == "SIGNED") selected @endif>SIGNED</option>
											<option value="PENDING" @if($task->eSignature == "PENDING") selected @endif>PENDING</option>
											<option value="In Person Sign" @if($task->eSignature == "In Person Sign") selected @endif>In Person Sign</option>
											@if(!in_array($task->eSignature, ['Not Started', 'SENT', 'READY FOR eSIG', 'SIGNED', 'PENDING', 'In Person Sign']))
												<option value="{{ $task->eSignature }}" selected>{{ $task->eSignature }}</option>
											@endif
											<option value="other">Add an Item</option>
										</select>
										<input type="text" name="custom_eSignature" class="form-control mt-2" id="eSignatureInput" placeholder="Enter eSignature" style="{{ $task->eSignature && !in_array($task->eSignature, ['Not Started', 'SENT', 'READY FOR eSIG', 'SIGNED', 'PENDING', 'In Person Sign']) ? 'display:block;' : 'display:none;' }}" value="{{ !in_array($task->eSignature, ['Not Started', 'SENT', 'READY FOR eSIG', 'SIGNED', 'PENDING', 'In Person Sign']) ? $task->eSignature : '' }}">
									</div>
								</div>

								<!-- EF Status Dropdown -->
								<div class="form-group toggle-field">
									<h6>EF Status</h6>
									<div class="controls">
										<select name="ef_status" class="form-control" id="efStatusSelect" onchange="toggleInputField(this, 'efStatusInput')">
											<option value="" disabled>Select an Option</option>
											<option value="DONE" @if($task->ef_status == "DONE") selected @endif>DONE</option>
											<option value="READY 2 EFILE" @if($task->ef_status == "READY 2 EFILE") selected @endif>READY 2 EFILE</option>
											<option value="IN PROGRESS" @if($task->ef_status == "IN PROGRESS") selected @endif>IN PROGRESS</option>
											<option value="PENDING CLIENT" @if($task->ef_status == "PENDING CLIENT") selected @endif>PENDING CLIENT</option>
											<option value="REJECTED" @if($task->ef_status == "REJECTED") selected @endif>REJECTED</option>
											@if(!in_array($task->ef_status, ['DONE', 'READY 2 EFILE', 'IN PROGRESS', 'PENDING CLIENT', 'REJECTED']))
												<option value="{{ $task->ef_status }}" selected>{{ $task->ef_status }}</option>
											@endif
											<option value="other">Add an Item</option>
										</select>
										<input type="text" name="custom_ef_status" class="form-control mt-2" id="efStatusInput" placeholder="Enter EF Status" style="{{ $task->ef_status && !in_array($task->ef_status, ['DONE', 'READY 2 EFILE', 'IN PROGRESS', 'PENDING CLIENT', 'REJECTED']) ? 'display:block;' : 'display:none;' }}" value="{{ !in_array($task->ef_status, ['DONE', 'READY 2 EFILE', 'IN PROGRESS', 'PENDING CLIENT', 'REJECTED']) ? $task->ef_status : '' }}">
									</div>
								</div>

								
								@if(Auth::guard('admin')->user()->type=="1")

								<!-- paymentStatus Field -->
								<div class="form-group">
									<h6>Payment Status</h6>
									<div class="controls">
										<select name="paymentStatus" class="form-control" id="paymentStatus" >
											<option value="" selected disabled>Select an Option</option>
											<option value="Paid" @if($task->paymentStatus == "Paid") selected @endif>Paid</option>
											<option value="Unpaid" @if($task->paymentStatus == "Unpaid") selected @endif>Unpaid</option>
										</select>
									</div>
								</div>

								<!-- Total Pay Field -->
								<div class="form-group">
									<label class="text-uppercase text-dark text-xs font-weight-bold">Total Pay <span class="text-danger">*</span></label>
									<div class="controls">
										<input type="number" value="{{$task->total_pay}}" name="total_pay" id="total-pay" class="form-control" oninput="calculateDueAmount()">
									</div>
								</div>
								
								<!-- Paid Amount Field -->
								<div class="form-group">
									<label class="text-uppercase text-dark text-xs font-weight-bold">Paid Amount <span class="text-danger">*</span></label>
									<div class="controls">
										<input type="number" value="{{$task->paid_amount}}" name="paid_amount" id="paid-amount" class="form-control" oninput="calculateDueAmount()">
									</div>
								</div>
								
								<!-- Due Amount Field (Read-Only) -->
								<div class="form-group">
									<label class="text-uppercase text-dark text-xs font-weight-bold">Due Amount</label>
									<div class="controls">
										<input type="number" value="{{$task->due_amount}}" name="due_amount" id="due-amount" class="form-control" readonly>
									</div>
								</div>
								@endif
								
						</div>
			
			   </div> <!-- end row  -->
			   
						<div class="text-xs-right">
	  						 <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Save Task">
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


		<script>
			function calculateDueAmount() {
				// Get Total Pay and Paid Amount values
				const totalPay = parseFloat(document.getElementById('total-pay').value) || 0;
				const paidAmount = parseFloat(document.getElementById('paid-amount').value) || 0;
				
				// Calculate Due Amount
				const dueAmount = totalPay - paidAmount;
				
				// Set Due Amount in the read-only input field
				document.getElementById('due-amount').value = dueAmount.toFixed(2);
			}
		</script>

		<!-- JavaScript for toggling fields based on selection -->
		<script>
			// Function to toggle visibility of fields based on project selection
			function toggleTaxFields() {
				// Get the selected text from the dropdown
				const selectedText = document.getElementById('project-list').selectedOptions[0]?.text || '';
				
				// Determine if the selected project is for "Tax" or "Immigration"
				const isTaxProject = selectedText.toLowerCase().startsWith('tax');
				const isImmigrationProject = selectedText.toLowerCase() === 'immigration';
		
				// Get the elements to toggle
				const fieldsToToggle = document.querySelectorAll('.toggle-field'); // Tax-related fields
				const categoryDropdown = document.querySelector('.toggle-category'); // Immigration category field
		
				// Show/hide fields based on selected project
				fieldsToToggle.forEach(field => {
					field.style.display = isTaxProject ? 'block' : 'none';
				});
				categoryDropdown.style.display = isImmigrationProject ? 'block' : 'none';
		
				// Reset fields if not applicable
				if (!isTaxProject) resetTaxFields();
				if (!isImmigrationProject) resetCategoryField();
			}
		
			function resetTaxFields() {
				// Clear Tax-related fields
				document.querySelector('[name="tax_year"]').value = '';
				document.querySelector('[name="eSignature"]').value = '';
				document.querySelector('[name="ef_status"]').value = '';
			}
		
			function resetCategoryField() {
				// Clear Category field
				document.querySelector('[name="category"]').value = '';
			}
		
			// Event listener for dropdown change to toggle fields dynamically
			document.getElementById('project-list').addEventListener('change', toggleTaxFields);
		
			// Call toggleTaxFields on page load to set initial visibility
			document.addEventListener('DOMContentLoaded', toggleTaxFields);
		</script>

<script>
   function toggleInputField(select, inputId) {
    const inputField = document.getElementById(inputId);

    if (select.value === "other") {
        inputField.style.display = "block";
        inputField.required = true;
        select.name = ""; // Clear the dropdown name to avoid conflicts
        inputField.focus(); // Automatically focus the input field when it becomes visible
    } else {
        inputField.style.display = "none";
        inputField.required = false;
        inputField.value = ""; // Reset the input field
        select.name = select.dataset.originalName || select.name; // Restore dropdown name
    }
}

</script>
		
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
	$(document).ready(function() {
		$('.select2-multi').select2({
			placeholder: "Select Categories",
			allowClear: true,
			width: '100%'  // This ensures full width
		});
	});
	</script>
@endsection
