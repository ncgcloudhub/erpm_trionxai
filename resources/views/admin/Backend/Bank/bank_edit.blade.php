@extends('admin.aDashboard')
@section('admins')

<div class="container-fluid py-4">
  <div class="row">
			   
		 

    <div class="col-8">

     <div class="card">
       <div class="card-body p-3">
         <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Bank List</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Name </th>
                  <th>A/C Name</th>
                  <th>A/C Number</th>
                  <th>Branch</th>
                  <th>Loan</th>
                  <th>Balance</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
         
          @php
            $sumBalance = 0;
            $sumLoan = 0;
          @endphp
         @foreach($banks as $item)
        <tr>
            <span hidden>{{$sumLoan+= $item->loan}}</span>
            <span hidden>{{$sumBalance+= $item->balance}}</span>
           <td>{{ $item->bank_name }}</td>
           <td>{{ $item->ac_name }}</td>
           <td>{{ $item->ano_name }}</td>
           <td>{{ $item->branch }}</td>
           <td>{{ $item->loan }}</td>
           <td>{{ $item->balance }}</td>
           <td>
         <a href="{{ route('bank.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
         <a href="{{ route('brand.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
          <i class="fa fa-trash"></i></a>
           </td>
         
          </tr>
           @endforeach
           <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><strong>Total</strong></td>
            <td><strong>{{$sumLoan}}</strong></td>
            <td><strong>{{$sumBalance - $capital->balance}}</strong></td>
            <td></td>
           </tr>
              </tbody>
         
              </table>
            </div>
          </div>
          <!-- /.box-body -->
          </div>
          <!-- /.box -->
       </div>
     </div>

              
    </div>
    <!-- /.col -->


<!--   ------------ Add Brand Page -------- -->


        <div class="col-4">

     <div class="card">
       <div class="card-body p-3">
         <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Bank</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
         
         
         <form method="post" action="{{ route('bank.update') }}">
            @csrf
         <input type="hidden" name="id" value="{{$bank->id}}">
          <div class="form-group">
           <h6>Bank Name <span class="text-danger">*</span></h6>
           <div class="controls">
          <input type="text"  name="bank_name" value="{{$bank->bank_name}}" class="form-control" >
          @error('bank_name')
          <span class="text-danger">{{ $message }}</span>
          @enderror
         </div>
         </div>
         
         <div class="form-group">
           <h6>A/C Name<span class="text-danger">*</span></h6>
           <div class="controls">
          <input type="text"  name="ac_name" value="{{$bank->ac_name}}" class="form-control" >
          @error('ac_name')
          <span class="text-danger">{{ $message }}</span>
          @enderror
         </div>
         </div>
         
         <div class="form-group">
           <h6>A/C Number<span class="text-danger">*</span></h6>
           <div class="controls">
          <input type="text"  name="ano_name" value="{{$bank->ano_name}}" class="form-control" >
          @error('ano_name')
          <span class="text-danger">{{ $message }}</span>
          @enderror
         </div>
         </div>
         
         <div class="form-group">
           <h6>Branch<span class="text-danger">*</span></h6>
           <div class="controls">
          <input type="text" name="branch" value="{{$bank->branch}}" class="form-control" >
            @error('branch')
          <span class="text-danger">{{ $message }}</span>
          @enderror
           </div>
         </div>

    
         
         <div class="form-group">
           <h6>Loan</h6>
           <div class="controls">
          <input type="number" name="loan" value="{{$bank->loan}}" class="form-control" readonly>
            {{-- @error('sign_image')
          <span class="text-danger">{{ $message }}</span>
          @enderror  --}}
           </div>
         </div>
         <div class="form-group">
           <h6>Balance</h6>
           <div class="controls">
          <input type="number" name="balance" value="{{$bank->balance}}" class="form-control" readonly>
            {{-- @error('sign_image')
          <span class="text-danger">{{ $message }}</span>
          @enderror  --}}
           </div>
         </div>
         
         <div class="text-xs-right">
          <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update bank">
                    </div>
              </div>
         </form>
         
            </div>
          </div>
          <!-- /.box-body -->
       </div>
     </div>
      </div>
      <!-- /.box --> 
    </div>

@endsection