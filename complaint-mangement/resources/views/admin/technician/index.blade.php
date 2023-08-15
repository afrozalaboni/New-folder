@extends('admin.partials.master')

@section('page-title')
  <title>Technician</title>
@endsection

@section('page-content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <h5 class="card-header">All Technician List</h5>
    <form action="">
      <input type="search" name="search" id="" placeholder="Search by name" value="{{ $search }}">
      <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
</form>
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: 700px">
      <table class="table table-dark mb-0">
          <thead style="background-color: #035039;">
              <tr class="text-uppercase text-success">
              <th scope ="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Address</th>
              <th scope="col">Type</th>
              <th scope="col">Experience</th>
              <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach($technicians as $key => $technician)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $technician->name }}</td>
            <td>{{ $technician->email }}</td>
            <td>{{ $technician->phone }}</td>
            <td>{{ $technician->address }}</td>
            <td>{{ $technician->type }}</td>
            <td>{{ $technician->experience }}</td>
            <td>
              <a href="{{ route('admin.technician_delete', $technician->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Reject</a>
            </td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection