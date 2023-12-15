@extends('admin.aDashboard')
@section('admins')

<div class="card">
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sl. No.</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Employee Name</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gross Salary</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Advance</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Net Pay</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>

          </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
          <tr>
            <td class="align-middle text-center text-sm">
                <p class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</p>
              </td>
            <td>
              <div class="align-middle text-center text-sm">
                <div class="d-flex flex-column ">
                  <h6 class="mb-0 text-xs">{{$employee->f_name}} {{$employee->l_name}}</h6>
                  <p class="text-xs text-secondary mb-0">{{$employee->designation->designation}}</p>
                </div>
              </div>
            </td>
            <td class="align-middle text-center text-sm">
              <span class="text-secondary text-xs font-weight-bold">{{$employee->salary}}</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold">{{$employee->advance}}</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold">{{$employee->net_pay}}</span>
            </td>
            <td class="align-middle">
              <a href="{{ route('salary.edit',$employee->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                Edit
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection