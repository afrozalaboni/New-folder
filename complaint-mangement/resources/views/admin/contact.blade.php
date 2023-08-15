@extends('admin.partials.master')

@section('page-title')
  <title>Contact List</title>
@endsection

@section('page-content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <h5 class="card-header">All Contact List</h5>
    <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: 700px">
      <table class="table table-dark mb-0">
          <thead style="background-color: #393939;>
              <trclass="text-uppercase text-success">
              <th scope ="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">subject</th>
              <th scope="col">message</th>
              <th scope="col">Date</th>
          </tr>
          </thead>
          <tbody>

              @foreach ($contacts as $key => $contact)
              <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $contact->name }}</td>
                  <td>{{ $contact->email }}</td>
                  <td>{{ $contact->subject}}</td>
                  <td>{{ $contact->message }}</td>
                  <td>{{ Carbon\Carbon::parse($contact->created_at)->format('d-m-Y') }}</td>
                  
              </tr>
              @endforeach

          </tbody>
      </table>
  </div>
  </div>
</div>
@endsection