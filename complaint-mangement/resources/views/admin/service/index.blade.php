@extends('admin.partials.master')

@section('page-title')
  <title>Service</title>
@endsection

@section('page-content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <h5 class="card-header">All Service</h5>
    
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

    <div class="table-responsive text-nowrap">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Service Type</th>
            <th>Description</th>
            <th>Service Charge</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach($services as $key => $service)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $service->name }}</td>
            <td>{{ $service->category}}</td>
            <td>{{ $service->description}}</td>
            <td>{{ $service->price }}</td>
            <td>
              <a class="btn btn-primary btn-sm" href="{{route('admin.service.edit', $service->id)}}" ><i class="fas fa-edit"></i> Edit</a>
              <a class="btn btn-danger btn-sm" href="{{route('admin.service.delete',$service->id)}}" 
                onclick="return confirm ('Are you sure?')"><i class="bx bx-trash me-1"></i> Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection