@extends('user.partials.master')

@section('page-title')
  <title>Complain</title>
@endsection

@section('page-content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <h5 class="card-header">All Booked service list</h5>

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
        <thead>
          <tr>
            <th scope ="col">ID</th>
            <th scope ="col">Types</th>
            <th scope ="col">Title</th>
            <th scope ="col">Status</th>
            <th scope ="col">Date</th>
            <th scope ="col">Payment</th>
            <th scope ="col">Review</th>
            <th scope ="col">Paid</th>
            <th scope ="col">Review description</th>
            <th scope ="col">Action</th>

          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach($complains as $key => $cm)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $cm->category }}</td>
            <td>{{ $cm->title }}</td>
            <td>
              @if ($cm->status == 0)
                  <strong  class="text-warning">Pending</strong>
              @else
                  <strong  class="text-success">Assigned</strong>
              @endif
            </td>
            <td>{{ Carbon\Carbon::parse($cm->created_at)->format('d-m-Y') }}</td>
          
            <td>
              @if ($cm->status == 2)
                @if ($cm->payment_status == null)
                <a class="btn btn-warning" href="{{ route('user.complain.payment_create', $cm->id) }}">payment</a>
                @else
                <strong  class="text-success">paid Already</strong>
                @endif
              
              @else
                  <strong  class="text-warning">Pending</strong>
              @endif
            </td>
            <td>
              @if ($cm->feedback == null)
              <a class="btn btn-warning" href="{{ route('user.complain.review_create', $cm->id) }}">Review</a>
              @else
                <strong  class="text-success">Reviewd Already</strong>
                @endif

            </td>
            <td>
              {{ $cm->amount }}
            </td>
            <td>
              {{ $cm->feedback }}
            </td>
            <td>
            <a class="btn btn-success " href="{{ route('user.invoice', $cm->id) }}">Invoice</a></td>
          </tr>
          
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
