@extends('admin.layout.master')
@section('content')
<div class="col-9 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add Employee</h4>
        <br>
        <p class="card-description">  </p>
        <form action="{{route("employee.store")}}" class="forms-sample" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="name">First Name</label>
            <input type="text" class="form-control" name="first_name">
            <small class="text-danger">@error('first_name')
                <span>{{ $message }}</span>
            @enderror
            </small>
          </div>
          <div class="form-group">
            <label for="name">Last Name</label>
            <input type="text" class="form-control" name="last_name">
            <small class="text-danger">@error('last_name')
                <span>{{ $message }}</span>
            @enderror
            </small>
          </div>
          <div class="form-group">
            <label for="description">Email</label>
            <input type="text" class="form-control" name="email">
            <small class="text-danger">@error('email')
                <span>{{ $message }}</span>
            @enderror
            </small>
          </div>
          <div class="form-group">
            <label for="description">Company</label>
            <select name="company" class="form-control">
                @foreach($companies as $company)
                <option value="{{$company->id}}" >{{$company->name}}</option>
                @endforeach

            </select>
            {{-- <input type="text" class="form-control" name="company"> --}}
            <small class="text-danger">@error('company')
                <span>{{ $message }}</span>
            @enderror
            </small>
          </div>
          <div class="form-group">
            <label for="description">Phone</label>
            <input type="text" class="form-control" name="phone">
            <small class="text-danger">@error('phone')
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
