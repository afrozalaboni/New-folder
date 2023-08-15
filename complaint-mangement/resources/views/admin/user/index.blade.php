@extends('admin.partials.master')
<link rel="stylesheet" href="{{ asset('frontend/css/dash.css') }}" />

@section('page-title')
  <title>User</title>
@endsection

@section('page-content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <h5 class="card-header txt">All User List</h5>
    <form action="">
      <input type="search" name="search" id="" placeholder="Search by name" value="{{ $search }}">
      <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
</form>
    <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: 700px">
      <table class="table table-dark mb-0">
        <thead style="background-color: #010f0b;">
              <tr class="text-uppercase text-success">
              <th scope ="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Address</th>
          </tr>
          </thead>
          <tbody>
              @foreach($users as $key => $user)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->address}}</td>
              </tr>
              @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection