@extends('cms.layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('cms.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Information</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <div class="col-12">

        @php
            $selectedSkills = old(
                'skills',
                isset($student) && $student->skills
                    ? $student->skills->pluck('id')->toArray()
                    : []
            );
        @endphp

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Update Information</h3>
            </div>
            <form action="{{ route('cms.student.storeInformation') }}" method="POST">
                @csrf

                <div class="card-body">

                    <!-- Education -->
                    <div class="form-group">
                        <label>Education</label>
                        <input type="text" name="education" class="form-control @error('education') is-invalid @enderror"
                            placeholder="Enter your education" value="{{ old('education', $student->education ?? '') }}">

                        @error('education')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Interests -->
                    <div class="form-group">
                        <label>Interests</label>
                        <textarea name="interests" class="form-control @error('interests') is-invalid @enderror" rows="3"
                            placeholder="Enter your interests">{{ old('interests', $student->interests ?? '') }}</textarea>

                        @error('interests')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Skills -->
                    <div class="form-group">
                        <label>Skills</label>

                        <select name="skills[]" class="form-control select2 @error('skills') is-invalid @enderror"
                            multiple="multiple" data-placeholder="Select Skills" style="width: 100%;">

                            @foreach ($skills as $skill)
                                <option value="{{ $skill->id }}"
                                    {{ in_array($skill->id, $selectedSkills) ? 'selected' : '' }}>
                                    {{ $skill->name }}
                                </option>
                            @endforeach

                        </select>

                        @error('skills')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <!-- Footer -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Profile
                    </button>
                </div>

            </form>
        </div>

    </div>
@endsection
