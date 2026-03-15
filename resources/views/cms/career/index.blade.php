@extends('cms.layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('cms.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Career Index</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <div class="col-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Career List</h3>
            </div>
            <div class="table-responsive">
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Education Required</th>
                                <th>Average Salary</th>
                                <th>Future Scope</th>
                                <th>Skills</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($careers as $career)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $career->name }}</td>
                                    <td>{{ $career->description }}</td>
                                    <td>{{ $career->education_required }}</td>
                                    <td>{{ $career->average_salary }}</td>
                                    <td>{{ $career->future_scope }}</td>
                                    <td>{{ $career->skills->pluck('name')->implode(', ') ?: 'No Skills' }}</td>
                                    <td>
                                        <div class="row">
                                            <a href="{{ route('cms.career.edit', ['career' => $career->id]) }}"><i
                                                    class="fa fa-edit"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row"></div>
@endsection
