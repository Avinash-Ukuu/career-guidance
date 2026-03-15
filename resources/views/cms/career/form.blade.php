@extends('cms.layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('cms.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('cms.career.index') }}">Career List</a></li>
                        <li class="breadcrumb-item active">Career Form</li>
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
            <div class="card-body">
                <form action="{{ $url }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if($method == 'PUT')
                        @method('PUT')
                    @endif

                    <div class="row">
                        <div class="form-group col-6">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $object->name ?? '') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror"
                                value="{{ old('description', $object->description ?? '') }}">
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-4">
                            <label>Educationn Required</label>
                            <input type="text" name="education_required" class="form-control @error('education_required') is-invalid @enderror"
                                value="{{ old('education_required', $object->education_required ?? '') }}">
                            @error('education_required')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-4">
                            <label>Average Salary</label>
                            <input type="text" name="average_salary" class="form-control @error('average_salary') is-invalid @enderror"
                                value="{{ old('average_salary', $object->average_salary ?? '') }}">
                            @error('average_salary')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-4">
                            <label>Future Scope</label>
                            <input type="text" name="future_scope" class="form-control @error('future_scope') is-invalid @enderror"
                                value="{{ old('future_scope', $object->future_scope ?? '') }}">
                            @error('future_scope')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label>Select Skills</label>

                            @foreach($skills as $skill)
                                <div class="form-check">
                                    <input type="checkbox"
                                        name="skills[]"
                                        value="{{ $skill->id }}"
                                        @if(isset($object) && $object->skills->contains($skill->id))
                                            checked
                                        @endif
                                        class="form-check-input">

                                    <label class="form-check-label">
                                    {{ $skill->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
