@extends('admin.aDashboard')
@section('admins')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

	  {{-- TRIAL START --}}
	  <div class="container-fluid">
		

		<a href="{{ route('taxproject.manage.task') }}" class="btn bg-gradient-success">Manage Ticket</a>
	  <div class="row">
		<div class="col-lg-12 mb-lg-0 mb-4">
		  <div class="card">
			<div class="card-body p-3">
			  <div class="row">
			
				<div class="col">
					<form method="post" action="{{ route('taxproject.store.tasks') }}" enctype="multipart/form-data" >
						@csrf
					
						<div class="row mb-3">
							<h6 class="col-5">Customer Name<span class="text-danger">*</span></h6>
							<div class="col-5">
								<select id="mySelect" name="customer_id" class="js-example-basic-single select2 form-control" required="">
								<option value="" selected="" disabled="">Select Customer</option>
								@foreach($customers as $customer)
								@if ($customer->company_name == NULL)
									<option value="{{ $customer->id }}">{{ $customer->user_name }} </option>
								@else
								<option value="{{ $customer->id }}">{{ $customer->user_name }} ({{ $customer->company_name }})</option>
								@endif
											
								@endforeach
								
								</select>
							</div>
						</div>

							<div class="form-group">
								<h6>Tax Return Type</h6>
								<div class="controls">
									<input type="text" name="taxreturntype" id="taxreturntype" class="form-control" readonly>					
							   </div>
							</div>

							<div class="form-group">
								<h6>Business Type</h6>
								<div class="controls">
									<input type="text" name="businesstype" id="businesstype" class="form-control" readonly>					
							   </div>
							</div>

							<div class="form-group">
								<h6>Phone Number</h6>
								<div class="controls">
									<input type="text" name="phonenumber" id="phonenumber" class="form-control" readonly>					
							   </div>
							</div>

							<div class="form-group">
								<h6>SSN</h6>
								<div class="controls">
									<input type="text" name="ssn" id="ssn" class="form-control" readonly>					
							   </div>
							</div>

							<div class="form-group">
								<h6>Subject</h6>
								<div class="controls">
									<input type="text" name="subject" class="form-control" >
								</div>
							</div>

																
							<div class="form-group">
								<h6>Description<span class="text-danger">*</span></h6>
								<div class="controls">
									
									<textarea name="description" class="form-control" id="tinymceExample" rows="10"></textarea>
							</div>
							</div>


							<div class="form-group">
								<h6>Comment</h6>
								<div class="controls">
									
									<textarea name="comment" class="form-control" id="tinymceExample" rows="10"></textarea>
						
								</div>
							</div>

				</div>

				{{-- 2nd Col --}}
				<div class="col">

					<div class="form-group">
						<h6>Assign Date<span class="text-danger">*</span></h6>
						<div class="controls">
							<input type="date" name="assign_date" class="form-control" required="">
				
					   </div>
					</div>
		
					<div class="form-group">
						<h6>Date to be Completed</h6>
						<div class="controls">
							<input type="date" name="completion_date" class="form-control" >
			
					   </div>
					</div>
		
		
					<div class="form-group">
						<h6>Assigned By<span class="text-danger">*</span></h6>
						<div class="controls">
							<select name="assigned_by" class="js-example-basic-single select2 form-control" required="" >
								<option value="" selected="" disabled="">Select Employee</option>
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
								<option value="" selected="" disabled="">Select Employee</option>
								@foreach($assignedby as $item)
					 				<option value="{{ $item->id }}">{{ $item->name }}</option>	
								@endforeach
							</select>
							
						 </div>
					</div>
		
					{{-- <div class="form-check">
						<input class="form-check-input" type="checkbox" value="1"  checked="" name="checkMail">
						<label class="custom-control-label">Send Email</label>
					</div> --}}

					<div class="form-group">
						<h6>Tax Project List <span class="text-danger">*</span></h6>
						<div class="controls">
							<select name="project_list" id="project-list" class="js-example-basic-single select2 form-control" required="" onchange="toggleTaxFields()">
								<option value="" selected="" disabled="">Tax Project List</option>
								@foreach($categories as $category)
									<option value="{{ $category->id }}">{{ $category->project_name }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<!-- Category dropdown for Immigration -->
					<div class="form-group toggle-category" style="display: none;">
						<h6>Category <span class="text-danger">*</span></h6>
						<div class="controls">
							<select name="category[]" class="form-control select2-multi" id="categorySelect" multiple >
								
								
								<!-- Family-Based Forms -->
								<optgroup label="Family-Based Forms">
									<option value="I-130">I-130: Petition for Alien Relative</option>
									<option value="I-130A">I-130A: Supplemental Information for Spouse Beneficiary</option>
									<option value="I-129F">I-129F: Petition for Alien Fiancé(e)</option>
									<option value="I-751">I-751: Petition to Remove Conditions on Residence</option>
									<option value="I-864">I-864: Affidavit of Support Under Section 213A</option>
									<option value="I-864A">I-864A: Contract Between Sponsor and Household Member</option>
									<option value="I-600">I-600 / I-600A: Petition to Classify Orphan as an Immediate Relative</option>
								</optgroup>
								
								<!-- Employment-Based Forms -->
								<optgroup label="Employment-Based Forms">
									<option value="I-129">I-129: Petition for a Nonimmigrant Worker</option>
									<option value="I-140">I-140: Immigrant Petition for Alien Workers</option>
									<option value="I-526">I-526: Immigrant Petition by Standalone Investor</option>
									<option value="I-829">I-829: Petition by Entrepreneur to Remove Conditions</option>
								</optgroup>
								
								<!-- Humanitarian Forms -->
								<optgroup label="Humanitarian Forms">
									<option value="I-589">I-589: Application for Asylum and for Withholding of Removal</option>
									<option value="I-730">I-730: Refugee/Asylee Relative Petition</option>
									<option value="I-821">I-821: Application for Temporary Protected Status</option>
									<option value="I-134A">I-134A: Declaration of Financial Support</option>
								</optgroup>
								
								<!-- Travel and Status Forms -->
								<optgroup label="Travel and Status Forms">
									<option value="I-94">I-94: Arrival/Departure Record</option>
									<option value="I-131">I-131: Application for Travel Document</option>
									<option value="I-539">I-539: Application to Extend/Change Nonimmigrant Status</option>
								</optgroup>
								
								<!-- Adjustment of Status / Green Card Forms -->
								<optgroup label="Adjustment of Status / Green Card Forms">
									<option value="I-485">I-485: Application to Register Permanent Residence or Adjust Status</option>
									<option value="I-90">I-90: Application to Replace Permanent Resident Card</option>
									<option value="I-485 Supplements">I-485 Supplements (A, C, E): Additional eligibility adjustments</option>
								</optgroup>
								
								<!-- Citizenship and Naturalization Projects -->
								<optgroup label="Citizenship and Naturalization Projects">
									<option value="N-400">N-400: Application for Naturalization</option>
									<option value="N-600">N-600 / N-600K: Certificate of Citizenship Applications</option>
									<option value="N-565">N-565: Application for Replacement Naturalization Document</option>
								</optgroup>

								{{-- <optgroup label="Others">
									<option value="other">Add an Item</option>
								</optgroup> --}}
							</select>
							{{-- <input type="text" name="category" class="form-control mt-2" id="categoryInput" placeholder="Enter Category" style="display:none;"> --}}

						</div>
					</div>

					
				

					<div class="form-group">
						<h6>Folder Location</h6>
						<div class="controls">
							<input type="text" name="hyperlinks" class="form-control" >
			
						</div>
					</div>


					<!-- Priority Field -->
					<div class="form-group">
						<h6>Priority <span class="text-danger">*</span></h6>
						<div class="controls">
							<select name="priority" class="form-control" id="prioritySelect" required="" onchange="toggleInputField(this, 'priorityInput')">
								<option value="" selected disabled>Select an Option</option>
								<option value="Normal">Normal</option>
								<option value="Critical">Critical</option>
								<option value="Major">Major</option>
								<option value="Minor">Minor</option>
								<option value="other">Add an Item</option>
							</select>
							<input type="text" name="priority" class="form-control mt-2" id="priorityInput" placeholder="Enter Priority" style="display:none;">
						</div>
					</div>

					<!-- Status Field -->
					<div class="form-group">
						<h6>Status <span class="text-danger">*</span></h6>
						<div class="controls">
							<select name="status" class="form-control" id="statusSelect" required="" onchange="toggleInputField(this, 'statusInput')">
								<option value="" selected disabled>Select an Option</option>
								<option value="Not started">Not started</option>
								<option value="In Progress">In Progress</option>
								<option value="In-Progress - Missing Docs">In-Progress - Missing Docs</option>
								<option value="Not-In-Drake">Not-In-Drake</option>
								<option value="Folder Created Only">Folder Created Only</option>
								<option value="Data Entry Completed">Data Entry Completed</option>
								<option value="Get Extension">Get Extension</option>
								<option value="Estimates">Estimates</option>
								<option value="Done">Done</option>
								<option value="other">Add an Item</option>
							</select>
							<input type="text" name="status" class="form-control mt-2" id="statusInput" placeholder="Enter Status" style="display:none;">
						</div>
					</div>


					 <!-- Tax Year (To be toggled) -->
					 <div class="form-group toggle-field">
						<h6>Tax Year <span class="text-danger">*</span></h6>
						<div class="controls">
							<select name="tax_year" class="form-control" id="taxYearSelect" onchange="toggleInputField(this, 'taxYearInput')">
								<option value="" selected disabled>Select an Option</option>
								<option value="TAX YEAR 2019">TAX YEAR 2019</option>
								<option value="TAX YEAR 2020">TAX YEAR 2020</option>
								<option value="TAX YEAR 2021">TAX YEAR 2021</option>
								<option value="TAX YEAR 2022">TAX YEAR 2022</option>
								<option value="TAX YEAR 2023">TAX YEAR 2023</option>
								<option value="TAX YEAR 2024">TAX YEAR 2024</option>
								<option value="Tax Amendment 2020">Tax Amendment 2020</option>
								<option value="Tax Amendment 2021">Tax Amendment 2021</option>
								<option value="Tax Amendment 2022">Tax Amendment 2022</option>
								<option value="Tax Amendment 2023">Tax Amendment 2023</option>
								<option value="Tax Amendment 2024">Tax Amendment 2024</option>
								<option value="other">Add an Item</option>
							</select>
					
							<!-- Hidden input field for manual entry, displayed when 'Other' is selected -->
							<input type="text" name="tax_year" class="form-control mt-2" id="taxYearInput" placeholder="Enter Tax Year" style="display:none;">
						</div>
					</div>

					<!-- eSignature Field -->
					<div class="form-group toggle-field">
						<h6>eSignature</h6>
						<div class="controls">
							<select name="eSignature" class="form-control" id="eSignatureSelect" onchange="toggleInputField(this, 'eSignatureInput')">
								<option value="" selected disabled>Select an Option</option>
								<option value="Not Started">Not Started</option>
								<option value="SENT">SENT</option>
								<option value="READY FOR eSIG">READY FOR eSIG</option>
								<option value="SIGNED">SIGNED</option>
								<option value="PENDING">PENDING</option>
								<option value="In Person Sign">In Person Sign</option>
								<option value="other">Add an Item</option>
							</select>
							<input type="text" name="eSignature" class="form-control mt-2" id="eSignatureInput" placeholder="Enter eSignature" style="display:none;">
						</div>
					</div>

					<!-- EF Status Field -->
					<div class="form-group toggle-field">
						<h6>EF Status</h6>
						<div class="controls">
							<select name="ef_status" class="form-control" id="efStatusSelect" onchange="toggleInputField(this, 'efStatusInput')">
								<option value="" selected disabled>Select an Option</option>
								<option value="DONE">DONE</option>
								<option value="READY 2 EFILE">READY 2 EFILE</option>
								<option value="IN PROGRESS">IN PROGRESS</option>
								<option value="HOLD">HOLD</option>
								<option value="ESTIMATES">ESTIMATES</option>
								<option value="NOT STARTED">NOT STARTED</option>
								<option value="REJECTED">REJECTED</option>
								<option value="other">Add an Item</option>
							</select>
							<input type="text" name="ef_status" class="form-control mt-2" id="efStatusInput" placeholder="Enter EF Status" style="display:none;">
						</div>
					</div>

					@if(Auth::guard('admin')->user()->type=="1")
					<!-- Total Pay Field -->
					<div class="form-group">
						<label class="text-uppercase text-dark text-xs font-weight-bold">Total Pay</label>
						<div class="controls">
							<input type="number" name="total_pay" id="total-pay" class="form-control" oninput="calculateDueAmount()">
						</div>
					</div>
					
					<!-- Paid Amount Field -->
					<div class="form-group">
						<label class="text-uppercase text-dark text-xs font-weight-bold">Paid Amount</label>
						<div class="controls">
							<input type="number" name="paid_amount" id="paid-amount" class="form-control" oninput="calculateDueAmount()">
						</div>
					</div>
					
					<!-- Due Amount Field (Read-Only) -->
					<div class="form-group">
						<label class="text-uppercase text-dark text-xs font-weight-bold">Due Amount</label>
						<div class="controls">
							<input type="number" name="due_amount" id="due-amount" class="form-control" readonly>
						</div>
					</div>
					@endif


					<div class="text-xs-right">
						<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Task">

						<x-backButton />
					</div>
					

				</div>


			

						</div>
			
			   </div> <!-- end row  -->
			   				
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

			$("#mySelect").change(function() {
      // get the selected option value
      var selectedOption = $(this).val();

      // make an AJAX request to the server
      $.get('/get-customer', { option: selectedOption }, function(data) {
        // update the field with the response data
        $("#taxreturntype").val(data.customer_type);
		$("#businesstype").val(data.business_type);
		$("#phonenumber").val(data.personal_phone);
		$("#ssn").val(data.ssn);
		console.log(data);
		$('.js-example-basic-single').select2();

      });
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
    function toggleTaxFields() {
        // Get the selected text from the dropdown
        const selectedText = document.getElementById('project-list').selectedOptions[0]?.text || '';

        // Check if "Tax" is in the selected project name
        const isTaxProject = selectedText.toLowerCase().includes('tax');
        // Check if the project is "Immigration"
        const isImmigrationProject = selectedText.toLowerCase() === 'immigration';

        // Get all elements with the class "toggle-field" (for Tax-related fields)
        const fieldsToToggle = document.querySelectorAll('.toggle-field');
        // Get the element with the class "toggle-category" (for Immigration categories)
        const categoryDropdown = document.querySelector('.toggle-category');

        // Show or hide Tax-related fields based on the project name
        fieldsToToggle.forEach(field => {
            field.style.display = isTaxProject ? 'block' : 'none';
        });

        // Show or hide the Category dropdown based on the Immigration project selection
        categoryDropdown.style.display = isImmigrationProject ? 'block' : 'none';
    }
</script>

<script>
	function toggleInputField(select, inputId) {
		const inputField = document.getElementById(inputId);
	
		if (select.value === "other") {
			inputField.style.display = "block";
			inputField.required = true;
			select.name = ""; // Clear the dropdown name to avoid conflicts
		} else {
			inputField.style.display = "none";
			inputField.required = false;
			inputField.value = ""; // Reset the input field
			select.name = inputField.name; // Restore dropdown name
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
