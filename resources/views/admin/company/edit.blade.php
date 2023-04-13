@extends('admin.layout.master')
@section('content')
<div class="col-9 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Company </h4>
        <p class="card-description">  </p>
        <form action="{{route("company.update", $company->id)}}" class="forms-sample" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
          <div class="form-group">
            <label for="name">Exam Name</label>
            <input type="text" class="form-control" name="name" value="{{$company->name}}">
          </div>
          <div class="form-group">
            <label for="description">Exam Description</label>
            <input type="text" class="form-control" name="email" value="{{$company->email}}">
          </div>
          <div class="form-group">
            <label for="icon">icon</label>
            <input type="text" class="form-control" name="website" value="{{$company->website}}">
          </div>
          <div class="form-group">
            <label for="description">logo</label>
            <input type="file" class="form-control" name="logo" value="{{$company->logo}}">
       
          </div>
          <button type="submit" class="btn btn-gradient-primary mr-2">Update</button>
        </form>
      </div>
    </div>
  </div>
    
@endsection