@extends('admin.aDashboard')
@section('admins')

 {{-- TRIAL START --}}
 <div class="container-fluid">
	<div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
		<div class="card">

		  <div class="card-body p-3">
			<div class="row">
							<!-- /.box-header -->
							{{-- <div class="box-body"> --}}
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                      <thead>
                                          <tr class="align-middle text-center">
                                          
                                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-start">Vendor Name</th>
                                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Service Name </th>
                                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Purchase Date</th>
                                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Expiration Date</th>
                                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                               
                                          </tr>
                                      </thead>
                                      <tbody>
              
   @foreach($purchase as $item)
   <tr class="align-middle text-center text-sm">
    <td class="text-start"><a href="{{ route('purchase.view',$item->id) }}">{{ $item->supplier->vendor_name }}</a></td>
    <td>{{ $item->supplier->vendor_s_name }}</td>
    <td>{{ $item->purchase_date }}</td>
    <td>{{ $item->expiration_date }}</td>
    <td>

  <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('purchase.view',$item->id) }}"><i class="fa-solid fa-eye text-dark me-2" aria-hidden="true"></i>View</a>	
			 
			 <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('purchase.edit',$item->id) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>

       <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="{{ route('purchase.delete',$item->id) }}" onclick="return confirm('Are you sure you want to delete this Purchase')"><i class="fa-solid fa-trash text-dark me-2"></i>Delete</a>

    </td>
               
   </tr>
    @endforeach
  </tbody>
                                       
  </table>
  </div>
{{-- </div> --}}
</div>
</div>
</div>
</div>
</div>
</div>

@include('admin.body.footer')

{{-- TRIAL END --}}


@endsection