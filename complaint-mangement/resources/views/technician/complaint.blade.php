@extends('technician.partials.master')

@section('page-title')
  <title>Task List</title>
@endsection

@section('page-content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <h5 class="card-header">All Task List</h5>

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
          <thead style="background-color: #393939;">
              <tr class="text-uppercase text-success">
              <th scope ="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Description</th>
              <th scope="col">Assinged Date</th>
              <th scope="col">Deadline</th>
              <th scope="col">Requested Deadline</th>
              <th scope="col">Action</th>
              <th scope="col">Address</th>
              <th scope="col">Phone</th>


             
          </tr>
          </thead>
          <tbody>

              @foreach ($complaints as $key => $complaint)
              <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $complaint->title }}</td>
                  <td>{{ $complaint->description}}</td>

                  <td>{{ Carbon\Carbon::parse($complaint->updated_at)->format('d-m-Y') }}</td>
                  <td>{{ Carbon\Carbon::parse($complaint->deadline)->format('d-m-Y') }}</td>
                  
                  <td>
                    @if ($complaint->requested_deadline == null)
                        <form action="{{ route('technician.requested_deadline') }}" method="post">
                          @csrf
                          <input type="hidden" name="id" value="{{ $complaint->id }}">
                          <input type="date" name="requested_deadline" class="form-control">
                          <textarea class="form-control" name="delay_description" rows="3"></textarea>

                          <button type="submit" class="btn btn-primary">Request</button>

                        </form>
                    @else
                    <strong  class="text-warning"> {{ Carbon\Carbon::parse($complaint->requested_deadline)->format('d-m-Y') }}</strong>
                    <p> {{ $complaint->delay_description }}</p>
                    @endif
                  
                  </td>
                  
                  <td>
                    @if ($complaint->status == 1)
                        <form action="{{ route('technician.completed') }}" method="post">
                          @csrf
                          <input type="hidden" name="id" value="{{ $complaint->id }}">
                          <button type="submit" class="btn btn-primary">Complete</button>
                        </form>
                    @else
                    <strong  class="text-success"> Completed</strong>
                    @endif
                  </td>
                  <td>
                   {{ $complaint->address }}</td>
                   <td>
                    {{ $complaint->phone }}</td>
              @endforeach

          </tbody>
      </table>
  </div>
  </div>
</div>
@endsection