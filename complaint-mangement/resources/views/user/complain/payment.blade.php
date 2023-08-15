@extends('user.partials.master')

@section('page-title')
  <title>Payment</title>
@endsection

@section('page-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <div class="card-body  mt-3">
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
          
          <form action="{{ route('user.complain.payment_post') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Payment Method</label>
              <div class="col-sm-10">
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                    ><i class='bx bx-category' ></i></span>
                    <select class="form-select" name="method" aria-label="Default select example">
                      <option selected>Select type</option>
                      <option value="bKash">bKash</option>
                      <option value="Nagad">Nagad</option>
                    </select>
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">TNX</label>
              <div class="col-sm-10">
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                    ><i class='bx bx-category' ></i></span>
                    <input
                    type="text"
                    class="form-control"
                    id="basic-icon-default-fullname"
                    name="tnx_id"
                    placeholder="tnx id"
                    aria-label=""
                    aria-describedby="basic-icon-default-fullname2"
                  />
                </div>
                <small>(Bkash-01687239899, Nagad-01718679899)</small>
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Amount</label>
              <div class="col-sm-10">
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                    ><i class='bx bx-category' ></i></span>
                    <input
                    type="text"
                    class="form-control"
                    id="basic-icon-default-fullname"
                    name="amount"
                    placeholder="amount"
                    aria-label=""
                    aria-describedby="basic-icon-default-fullname2"
                  />
                </div>
                <small>(Plumbing-2000tk,Construction-3000tk,Painting-4000tk,Electronic-1500tk)</small>
              </div>
            </div>

            <div class="row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">pay</button>
              </div>
            </div>
          </form>
        </div>
              </div>
            </div>

    </div>
</div>
@endsection