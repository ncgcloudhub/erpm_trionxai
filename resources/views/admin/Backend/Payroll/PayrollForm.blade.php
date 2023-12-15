@extends('admin.aDashboard')
@section('admins')

	  {{-- TRIAL START --}}
	  <div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body p-3">
						<div class="form-filter">
							<form method="post" action="{{ route('generated.payroll') }}">
								@csrf
								<div class="card-body p-2">
									<div class="row">
										<div class="col-md-4 mb-md-0 mb-4">
											<div class="">
											<select name="month" id="month" class="form-control" required="">
												<option value="" selected>Select Month</option>
												<option value="January">January</option>
												<option value="February">February</option>
												<option value="April">April</option>
												<option value="May">May</option>
												<option value="June">June</option>
												<option value="July">July</option>
												<option value="August">August</option>
												<option value="September">September</option>
												<option value="October">October</option>
												<option value="November">November</option>
												<option value="December">December</option>
											</select>
											</div>
										</div>
										<div class="col-md-4">
											<div class="">
												<select name="year" id="year" class="form-control" required="">
													<option value="" selected>Select Year</option>
													<option value="2023">2023</option>
													<option value="2024">2024</option>
													
												</select>
											</div>
										</div>
										<div class="col-md-4 mb-md-0 mb-4">
											<div>
												<input class="btn bg-gradient-dark mb-0" type="submit" name="save" id="save" value="Generate">
											</div>
										</div>
										
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	

	  @include('admin.body.footer')
	  
	  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

	  <script>
		document.getElementById('filterForm').addEventListener('submit', function(event) {
			event.preventDefault(); // Prevent the default form submission
	
			// Get selected values
			var selectedMonth = document.getElementById('month').value;
			var selectedYear = document.getElementById('year').value;
	
			// Construct the URL with selected values
			var url = "{{ route('generated.payroll') }}" + "?month=" + selectedMonth + "&year=" + selectedYear;
	
			// Redirect to the new URL
			window.location.href = url;
		});
	</script> --}}
	
	  {{-- TRIAL END --}}
@endsection
