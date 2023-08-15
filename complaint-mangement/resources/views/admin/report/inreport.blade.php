@extends('admin.partials.master')

@section('page-title')
  <title>Appointment List</title>
@endsection

@section('page-content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <h5 class="card-header">All Appointments</h5>
    <a class="btn btn-success " href="{{ route('admin.invoice') }}">Invoice-Report</a>

    <div class="table-responsive text-nowrap">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Service type</th>
            <th>User</th>
            <th>Technician</th>
            <th>Amount</th>
            <th>Method</th>
            <th>TNX</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach($complaints as $key => $complaint)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $complaint->title }}</td>
            <td>{{ $complaint->user_name }}</td>
            <td>{{ $complaint->technician_name }}</td>
            <td>{{ $complaint->amount }}</td>
            <td>{{ $complaint->method }}</td>
            <td>{{ $complaint->tnx_id }}</td>
            <td>{{ Carbon\Carbon::parse($complaint->created_at)->format('d-m-Y') }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection