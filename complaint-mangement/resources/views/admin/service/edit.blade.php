@extends('admin.partials.master')

@section('page-title')
  <title>Service Edit</title>
@endsection

@section('page-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <div class="card-body  mt-3">
          
          <form action="{{ route('admin.service.update', $services->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Service Name</label>
              <div class="col-sm-10">
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                    ><i class='bx bx-category' ></i></span>
                  <input
                    type="text"
                    class="form-control"
                    id="basic-icon-default-fullname"
                    name="name"
                    placeholder=" movies name"
                    value="{{ $services->name }}"
                    aria-label=""
                    aria-describedby="basic-icon-default-fullname2"
                  />
                    
                </div>
              </div>
            </div>
            
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Service Type</label>
              <div class="col-sm-10">
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                    ><i class='bx bx-category' ></i></span>
                  <select class="form-select" name="category" aria-label="Default select example">
                    <option selected>Select Genre</option>
                    @foreach ($categories as $item)
                    <option value="{{ $item->name }}" @if($item->name == $services->category) selected @endif>{{ $item->name }}</option>
                    @endforeach
                    
                  </select>
                    
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Service Description</label>
              <div class="col-sm-10">
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                    ><i class='bx bx-category' ></i></span>

                  <textarea name="description" class="form-control" >{{ $services->description }}</textarea>
                    
                </div>
              </div>
            </div>
            
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Service Charge</label>
              <div class="col-sm-10">
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                    ><i class='bx bx-category' ></i></span>
                  <input
                    type="text"
                    class="form-control"
                    id="basic-icon-default-fullname"
                    name="price"
                    placeholder=" movies price"
                    value="{{ $services->price }}"
                    aria-label=""
                    aria-describedby="basic-icon-default-fullname2"
                  />
                    
                </div>
              </div>
            </div>
          
          
            <div class="row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </div>
          </form>
        </div>
    </div>
</div>
@endsection