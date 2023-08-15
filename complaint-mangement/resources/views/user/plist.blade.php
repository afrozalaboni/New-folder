@extends('user.partials.master')
@section('page-title')
  <title>Service Charge list</title>
@endsection

@section('page-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-2">
          <div class="card mb-2">
            <div class="card-body text-center">
              <img src="{{ asset('frontend/img/images.png') }}" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-4 txt">Service charge lsit</h5>
              <div class="d-flex justify-content-center mb-2">
               
              </div>
            </div>
          </div>
          
        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body ">
              <div class="row ">
                <div class="col-sm-3">
                  <p class="mb-0 txt">Full Name</p>
                </div>
                <div class="col-sm-9 ">
                  <p class="text-muted mb-0">{{ auth()->user()->name }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0 txt">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ auth()->user()->email }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0 txt">Phone</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0 ">{{ auth()->user()->phone}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0 txt">Address</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0 ">{{ auth()->user()->address }}</p>
                </div>
              </div>
              <hr>
            </div>
        </div>
    </div>
</div>
@endsection