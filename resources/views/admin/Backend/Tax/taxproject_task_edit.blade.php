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
								<select name="category" class="form-control">
									<option value="" selected disabled>Select a Category</option>
									
									<!-- Family-Based Forms -->
									<optgroup label="Family-Based Forms">
										<option value="I-130" @if($task->category == "I-130") selected @endif>I-130: Petition for Alien Relative</option>
										<option value="I-130A" @if($task->category == "I-130A") selected @endif>I-130A: Supplemental Information for Spouse Beneficiary</option>
										<option value="I-129F" @if($task->category == "I-129F") selected @endif>I-129F: Petition for Alien Fiancé(e)</option>
										<option value="I-751" @if($task->category == "I-751") selected @endif>I-751: Petition to Remove Conditions on Residence</option>
										<option value="I-864" @if($task->category == "I-864") selected @endif>I-864: Affidavit of Support Under Section 213A</option>
										<option value="I-864A" @if($task->category == "I-864A") selected @endif>I-864A: Contract Between Sponsor and Household Member</option>
										<option value="I-600" @if($task->category == "I-600") selected @endif>I-600 / I-600A: Petition to Classify Orphan as an Immediate Relative</option>
									</optgroup>

									<!-- Employment-Based Forms -->
									<optgroup label="Employment-Based Forms">
										<option value="I-129" @if($task->category == "I-129") selected @endif>I-129: Petition for a Nonimmigrant Worker</option>
										<option value="I-140" @if($task->category == "I-140") selected @endif>I-140: Immigrant Petition for Alien Workers</option>
										<option value="I-526" @if($task->category == "I-526") selected @endif>I-526: Immigrant Petition by Standalone Investor</option>
										<option value="I-829" @if($task->category == "I-829") selected @endif>I-829: Petition by Entrepreneur to Remove Conditions</option>
									</optgroup>

									<!-- Humanitarian Forms -->
									<optgroup label="Humanitarian Forms">
										<option value="I-589" @if($task->category == "I-589") selected @endif>I-589: Application for Asylum and for Withholding of Removal</option>
										<option value="I-730" @if($task->category == "I-730") selected @endif>I-730: Refugee/Asylee Relative Petition</option>
										<option value="I-821" @if($task->category == "I-821") selected @endif>I-821: Application for Temporary Protected Status</option>
										<option value="I-134A" @if($task->category == "I-134A") selected @endif>I-134A: Declaration of Financial Support</option>
									</optgroup>

									<!-- Travel and Status Forms -->
									<optgroup label="Travel and Status Forms">
										<option value="I-94" @if($task->category == "I-94") selected @endif>I-94: Arrival/Departure Record</option>
										<option value="I-131" @if($task->category == "I-131") selected @endif>I-131: Application for Travel Document</option>
										<option value="I-539" @if($task->category == "I-539") selected @endif>I-539: Application to Extend/Change Nonimmigrant Status</option>
									</optgroup>

									<!-- Adjustment of Status / Green Card Forms -->
									<optgroup label="Adjustment of Status / Green Card Forms">
										<option value="I-485" @if($task->category == "I-485") selected @endif>I-485: Application to Register Permanent Residence or Adjust Status</option>
										<option value="I-90" @if($task->category == "I-90") selected @endif>I-90: Application to Replace Permanent Resident Card</option>
										<option value="I-485 Supplements" @if($task->category == "I-485 Supplements") selected @endif>I-485 Supplements (A, C, E): Additional eligibility adjustments</option>
									</optgroup>

									<!-- Citizenship and Naturalization Projects -->
									<optgroup label="Citizenship and Naturalization Projects">
										<option value="N-400" @if($task->category == "N-400") selected @endif>N-400: Application for Naturalization</option>
										<option value="N-600" @if($task->category == "N-600") selected @endif>N-600 / N-600K: Certificate of Citizenship Applications</option>
										<option value="N-565" @if($task->category == "N-565") selected @endif>N-565: Application for Replacement Naturalization Document</option>
									</optgroup>

								</select>
							</div>
						</div>
						
						 <div class="form-group">
							<h6>Subject</h6>
							<div class="controls">
								<input type="text" value="{{$task->subject}}" name="subject" class="form-control" >
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
											<option value="Data Entry Completed" @if($task->status == "Data Entry Completed") selected @endif>Data Entry Completed</option>
											<option value="Get Extension" @if($task->status == "Get Extension") selected @endif>Get Extension</option>
											<option value="Estimates" @if($task->status == "Estimates") selected @endif>Estimates</option>
											<option value="Done" @if($task->status == "Done") selected @endif>Done</option>
										</select>
									</div>
								</div>
								

								<div class="form-group toggle-field">
									<h6>Tax Year<span class="text-danger">*</span></h6>
									<div class="controls">
										<select name="tax_year" class="form-control">
											<option value="" @if($task->tax_year == "") selected @endif>Select an Option</option>
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
										</select>
									</div>
								</div>
								


								<div class="form-group toggle-field">
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
								


								<div class="form-group toggle-field">
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

								<!-- Total Pay Field -->
								<div class="form-group">
									<label class="text-uppercase text-dark text-xs font-weight-bold">Total Pay <span class="text-danger">*</span></label>
									<div class="controls">
										<input type="number" value="{{$task->total_pay}}" name="total_pay" id="total-pay" class="form-control" required oninput="calculateDueAmount()">
									</div>
								</div>
								
								<!-- Paid Amount Field -->
								<div class="form-group">
									<label class="text-uppercase text-dark text-xs font-weight-bold">Paid Amount <span class="text-danger">*</span></label>
									<div class="controls">
										<input type="number" value="{{$task->paid_amount}}" name="paid_amount" id="paid-amount" class="form-control" required oninput="calculateDueAmount()">
									</div>
								</div>
								
								<!-- Due Amount Field (Read-Only) -->
								<div class="form-group">
									<label class="text-uppercase text-dark text-xs font-weight-bold">Due Amount</label>
									<div class="controls">
										<input type="number" value="{{$task->due_amount}}" name="due_amount" id="due-amount" class="form-control" readonly>
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
		

	  {{-- TRIAL END --}}
@endsection
