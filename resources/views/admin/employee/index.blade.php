@extends('admin.layout.master')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Manage Employees </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Tables</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Employees Name tables</li>
                    </ol>
                </nav>
            </div>
            <a href="{{ route('employee.create') }}">
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
                                        <th>First Name </th>
                                        <th>Last Name</th>
                                        <th>company </th>
                                        <th>email</th>
                                        <th>phone</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
    
                                    @foreach ($employees as $employee)
                                        <tr>
                                            <td><label class="badge badge-dark">{{ $employee->id }}</label></td>
                                            <td>{{ $employee->first_name }}</td>
                                            <td>{{ $employee->last_name }}</< /td>
                                            <td>{{ $employee->company }}</< /td>
                                            <td>{{ $employee->email }}</< /td>
                                            <td>{{ $employee->phone }}</< /td>

                                            <td>
                                                <form action="{{ route('employee.destroy', $employee->id) }} "
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button data-toggle="tooltip" title="Trash"
                                                        class="btn btn-danger  btn-sm">Delete</button>
                                                </form>
                                            </td>
                                            <td>
                                            <td>

                                                <a href="{{ route('employee.edit', $employee->id) }}"
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
