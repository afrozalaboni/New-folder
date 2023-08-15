@extends('admin.partials.master')

@section('page-title')
  <title>Appointment List</title>
@endsection

@section('page-content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <h5 class="card-header">All Appointment List</h5>

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
          <thead style="background-color: #393939;>
              <tr class="text-uppercase text-success">
              <th scope ="col">ID</th>
              <th scope="col">Title</th>
              <th scope="col">User Name</th>
              <th scope="col">Date</th>
              <th scope="col">Deadline</th>
              <th scope="col">Requested Deadline</th>
              <th scope="col">delay_description</th>
              <th scope="col">Assigned</th>
              <th scope="col">Review</th>
             
          </tr>
          </thead>
          <tbody>

              @foreach ($complaints as $key => $complaint)
              <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $complaint->title }}</td>
                  <td>{{ $complaint->user_name}}</td>
                  <td>{{ Carbon\Carbon::parse($complaint->created_at)->format('d-m-Y') }}</td>
                  <td>{{ $complaint->deadline }}</td>
                  <td>
                    {{ $complaint->requested_deadline }}
                    <td text-bg-success>{{ $complaint->delay_description}}</td>
                  </td>
                  <td>
                    @if ($complaint->status == 0)
                        <form action="{{ route('admin.assign') }}" method="post">
                          @csrf
                          <input type="hidden" name="id" value="{{ $complaint->id }}">
                          <input type="date" name="deadline" class="form-control">
                          <select class="form-select" name="technician_id" aria-label="Default select example">
                            <option selected>Select type</option>
                            @foreach ($technicians->where('type', $complaint->category) as $technician)
                            <option value="{{ $technician->id }}">{{ $technician->name }}</option>
                            @endforeach
                          </select>

                          <button type="submit" class="btn btn-primary">Assign</button>
                        </form>
                    @else
                    <strong  class="text-success"> {{ $complaint->technician_name }}</strong>
                    @endif

                  </td>  
              <td> {{ $complaint->feedback }}</td>

              </tr>
              @endforeach

          </tbody>
      </table>
  </div>
  </div>
</div>
@endsection