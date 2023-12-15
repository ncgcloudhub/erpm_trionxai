@extends('admin.aDashboard')
@section('admins')

	  {{-- TRIAL START --}}
	  <div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body p-3">
						<div class="form-filter">
							<form method="post" action="{{ route('report.filter') }}">
								@csrf
								<div class="card-body p-2">
									<div class="row">
										<div class="col-md-4 mb-md-0 mb-4">
											<div class="">
												<input class="form-control date mb-3" value="" type="date" id="sdate" name="sdate" required="">
											</div>
										</div>
										<div class="col-md-4">
											<div class="">
												<input class="form-control date mb-3" value="" type="date" id="edate" name="edate" required="">
											</div>
										</div>
										<div class="col-md-4 mb-md-0 mb-4">
											<div>
												<select class="form-control" name="option" id="option">
													<option value="" selected="" disabled>Select Report Type</option>
													<option value="expense">Expense</option>
													<option value="requisition">Requisition</option>
													
													<option value="L/C">L/C</option>
													<option value="sale">Sale</option>
												</select>
											</div>
										</div>
										<div class="col-md-12">
											<div class="">
												<input class="btn bg-gradient-dark mb-0" type="submit" name="save" id="save" value="Filter Data">
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

		<br>
		{{-- SECOND FORM --}}
		<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body p-3">
					<div class="form-filter">
						<form method="post" action="{{ route('report.department.filter') }}">
							@csrf
							<div class="card-body p-2">
								<div class="row">
									<div class="col-md-3 mb-md-0 mb-4">
										<div class="">
											<input class="form-control date mb-3" value="" type="date" id="sdate" name="sdate" required="">
										</div>
									</div>
									<div class="col-md-3">
										<div class="">
											<input class="form-control date mb-3" value="" type="date" id="edate" name="edate" required="">
										</div>
									</div>
									<div class="col-md-3 mb-md-0 mb-4">
										<div>
											<select class="form-control" name="option" id="option">
												<option value="" selected="" disabled>Select Report Type</option>
												<option value="conveyance">Conveyance</option>
												<option value="sale">Sale</option>
												{{-- <option value="requisition">Requisition</option>
												
												<option value="L/C">L/C</option>
												<option value="sale">Sale</option> --}}
											</select>
										</div>
									</div>
									<div class="col-md-3 mb-md-0 mb-4">
										<div>
											<select class="form-control" name="doption" id="doption">
												<option value="" selected="" disabled>Select Department</option>
												<option value="1">Super Admin</option>
												<option value="2" >Admin</option>
												<option value="3" >HR</option>
												<option value="4" >B2B</option>
												<option value="5" >Dealership</option>
												<option value="6" >B2C</option>
												<option value="7" >Digital Marketing</option>
												<option value="8" >Support Team</option>
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="">
											<input class="btn bg-gradient-dark mb-0" type="submit" name="save" id="save" value="Filter Data">
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

		{{-- END SECOND FORM --}}


		{{-- THIRD FORM --}}
		<br>

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body p-3">
						<div class="form-filter">
							<form method="post" action="{{ route('report.expenseType.filter') }}">
								@csrf
								<div class="card-body p-2">
									<div class="row">
										<div class="col-md-3 mb-md-0 mb-4">
											<div class="">
												<input class="form-control date mb-3" value="" type="date" id="sdate" name="sdate" required="">
											</div>
										</div>
										<div class="col-md-3">
											<div class="">
												<input class="form-control date mb-3" value="" type="date" id="edate" name="edate" required="">
											</div>
										</div>
										<div class="col-md-3 mb-md-0 mb-4">
											<div>
												<select class="form-control" name="option" id="option">
													<option value="" selected="" disabled>Select Employee</option>
													@foreach($employees as $item)
													<option value="{{$item->id}}">{{$item->f_name . ' ' . $item->l_name}}</option>
													@endforeach

												</select>
											</div>
										</div>
										<div class="col-md-3 mb-md-0 mb-4">
											<div>
												<select class="form-control" name="doption" id="doption">
													<option value="" selected="" disabled>Select Expense Type</option>
													@foreach($expenseTypes as $item)
													<option value="{{$item->id}}">{{$item->expenseType}}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-md-12">
											<div class="">
												<input class="btn bg-gradient-dark mb-0" type="submit" name="save" id="save" value="Filter Data">
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
	

		{{-- EMPLOYEE --}}

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body p-3">
						<div class="form-filter">
							<form method="post" action="{{ route('report.employee.filter.sale') }}">
								@csrf
								<div class="card-body p-2">
									<div class="row">
										<div class="col-md-3 mb-md-0 mb-4">
											<div class="">
												<input class="form-control date mb-3" value="" type="date" id="sdate" name="sdate" required="">
											</div>
										</div>
										<div class="col-md-3">
											<div class="">
												<input class="form-control date mb-3" value="" type="date" id="edate" name="edate" required="">
											</div>
										</div>
										<div class="col-md-3 mb-md-0 mb-4">
											<div>
												<select class="form-control" name="option" id="option">
													<option value="" selected="" disabled>Select Employee</option>
													@foreach($admins as $item)
													<option value="{{$item->id}}">{{$item->name}}</option>
													@endforeach

												</select>
											</div>
										</div>
										{{-- <div class="col-md-3 mb-md-0 mb-4">
											<div>
												<select class="form-control" name="doption" id="doption">
													<option value="" selected="" disabled>Select Expense Type</option>
													@foreach($expenseTypes as $item)
													<option value="{{$item->id}}">{{$item->expenseType}}</option>
													@endforeach
												</select>
											</div>
										</div> --}}
										<div class="col-md-12">
											<div class="">
												<input class="btn bg-gradient-dark mb-0" type="submit" name="save" id="save" value="Filter Data">
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
		{{-- END EMPLOYEE --}}
			{{-- END SECOND FORM --}}
		{{-- END THIRD FORM --}}
	</div>
	

	  @include('admin.body.footer')

	  {{-- TRIAL END --}}
@endsection
