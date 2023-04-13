@extends('admin.layout.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Manage companies </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Tables</a></li>
                        <li class="breadcrumb-item active" aria-current="page">companies Name tables</li>
                    </ol>
                </nav>
            </div>
            <a href="{{ route('company.create') }}">
                <button type="button" class="btn btn-primary mb-3">Add </button>
            </a>

            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}

                </div>
            @endif


            @if (session()->has('delete'))
                <div class="alert alert-danger">
                    {{ session()->get('delete') }}

                </div>
            @endif



            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>



                                    <tr>
                                        <th>#</th>
                                        <th>company Name </th>
                                        <th>company email</th>
                                        <th>company website</th>
                                        <th>company logo  </th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
    
                                    @foreach ($companies as $company)
                                        <tr>
                                            <td><label class="badge badge-dark">{{ $company->id }}</label></td>
                                            <td>{{ $company->name }}</td>
                                            <td>{{ $company->email }}</< /td>
                                            <td>{{ $company->website }}</< /td>
                                            <td>
                                               <image height="20px" src="{{asset('storage/images/'.$company->logo)}}" >
                                                
                                                </< /td>

                                            <td>
                                                <form action="{{ route('company.destroy', $company->id) }} "
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button data-toggle="tooltip" title="Trash"
                                                        class="btn btn-danger  btn-sm">Delete</button>
                                                </form>
                                            </td>
                                            <td>
                                            <td>

                                                <a href="{{ route('company.edit', $company->id) }}"
                                                    data-toggle="tooltip" title="Edit"
                                                    class="btn btn-success  btn-sm">edit</a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            @endsection
