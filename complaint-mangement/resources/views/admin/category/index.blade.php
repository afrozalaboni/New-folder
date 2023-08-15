@extends('admin.partials.master')

@section('page-title')
  <title>Category</title>
@endsection

@section('page-content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <h5 class="card-header">All Services</h5>
    <div class="table-responsive text-nowrap">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Types</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach($categories as $key => $category)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $category->name }}</td>
            <td>
              <a class="btn btn-primary btn-sm" href="{{route('admin.category.edit', $category->id)}}" ><i class="fas fa-edit"></i> Edit</a>
              <a class="btn btn-danger btn-sm" href="{{route('admin.category.delete',$category->id)}}" 
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
