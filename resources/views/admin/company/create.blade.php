@extends('admin.layout.master')
@section('content')
<div class="col-9 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add company</h4>
        <br>
        <p class="card-description">  </p>
        <form action="{{route("company.store")}}" class="forms-sample" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="name">Company Name</label>
            <input type="text" class="form-control" name="name">
            <small class="text-danger">@error('name')
                <span>{{ $message }}</span>
            @enderror
            </small>
          </div>
          <div class="form-group">
            <label for="description">Company Email</label>
            <input type="text" class="form-control" name="email">
            <small class="text-danger">@error('email')
                <span>{{ $message }}</span>
            @enderror
            </small>
          </div>
          <div class="form-group">
            <label for="description">Company Website</label>
            <input type="text" class="form-control" name="website">
            <small class="text-danger">@error('website')
                <span>{{ $message }}</span>
            @enderror
            </small>
          </div>
          <div class="form-group">
            <label for="with_doses">logo</label>
            <input type="file" class="form-control" name="logo">
            <small class="text-danger">@error('logo')
                <span>{{ $message }}</span>
            @enderror
            </small>
          </div>

          <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
        </form>
      </div>
    </div>
  </div>

@endsection
