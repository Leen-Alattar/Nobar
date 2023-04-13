@extends('admin.layout.master')
@section('content')
<div class="col-9 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Employee </h4>
        <p class="card-description">  </p>
        <form action="{{route("employee.update", $employee->id)}}" class="forms-sample" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
          <div class="form-group">
            <label for="name">First Name</label>
            <input type="text" class="form-control" name="first_name" value="{{$employee->first_name}}">
          </div>
          <div class="form-group">
            <label for="name">Last Name</label>
            <input type="text" class="form-control" name="last_name" value="{{$employee->last_name}}">
          </div>
          <div class="form-group">
            <label for="description">Email</label>
            <input type="text" class="form-control" name="email" value="{{$employee->email}}">
          </div>
          <div class="form-group">
            <label for="icon">company</label>
            <select name="company" class="form-control">
                @foreach($companies as $company)
                
                <option value="{{$company->id}}">{{$company->name}}</option>
                @endforeach

            </select>
          </div>
          <div class="form-group">
            <label for="icon">Phone</label>
            <input type="text" class="form-control" name="phone" value="{{$employee->phone}}">
          </div>
        
          <button type="submit" class="btn btn-gradient-primary mr-2">Update</button>
        </form>
      </div>
    </div>
  </div>
    
@endsection