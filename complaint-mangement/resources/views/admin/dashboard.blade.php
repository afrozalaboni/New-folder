@extends('admin.partials.master')

@section('page-title')
  <title>Dashboard</title>
  <link rel="stylesheet" href="{{ asset('frontend/css/dash.css') }}" />
@endsection

@section('page-content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-lg-4 col-md-12 col-4 mb-2">
      <div class="card col">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between comp">
            <div class="avatar flex-shrink-0">
              <img
                src="{{ asset('backend/img/png-transparent-computer-icons-complaint-complaints-cdr-angle-logo.png') }}"
                alt="chart success"
                class="rounded"
              />
            </div>
          </div>
          <span class="fw-semibold d-block mb-1 comp">Total Appointments</span>
          <h3 class="card-title mb-2 comp">{{ $total_complaint }}</h3>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-12 col-4 mb-2">
      <div class="card col">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <img src="{{ asset('backend/img/icons/unicons/chart-success.png') }}"
                alt="Credit Card"
                class="rounded"
              />
            </div>
          </div>
          <span class="fw-semibold d-block mb-1 comp">Total Users</span>
          <h3 class="card-title text-nowrap mb-1 comp">{{$total_users}}</h3>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-12 col-4 mb-2">
      <div class="card col">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <img
                src="{{ asset('backend/img/icons/unicons/wallet-info.png') }}"
                alt="Credit Card"
                class="rounded"
              />
            </div>
          </div>
          <span class="fw-semibold d-block mb-1 comp">Total Technicians</span>
          <h3 class="card-title text-nowrap mb-1 comp">{{$total_technicians}}</h3>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-4 col-md-12 col-4 mb-2">
      <div class="card col">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <img
                src="{{ asset('backend/img/icons/unicons/chart-success.png') }}"
                alt="chart success"
                class="rounded"
              />
            </div>
          </div>
          <span class="fw-semibold d-block mb-1 comp">Assign Tasks</span>
          <h3 class="card-title mb-2 comp ">{{ $total_assigned }}</h3>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-12 col-4 mb-2">
      <div class="card col">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <img
                src="{{ asset('backend/img/icons/unicons/wallet-info.png') }}"
                alt="Credit Card"
                class="rounded"
              />
            </div>
          </div>
          <span class="fw-semibold d-block mb-1 comp">Completed Tasks</span>
          <h3 class="card-title text-nowrap mb-1 comp">{{ $total_completed_task }}</h3>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-12 col-4 mb-2">
      <div class="card col">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <img
                src="{{ asset('backend/img/icons/unicons/wallet-info.png') }}"
                alt="Credit Card"
                class="rounded"
              />
            </div>
          </div>
          <span class="fw-semibold d-block mb-1 comp" >Pending Tasks</span>
          <h3 class="card-title text-nowrap mb-1 comp">{{ $total_pending_task }}</h3>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
