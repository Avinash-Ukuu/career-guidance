@extends('cms.layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('cms.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('cms.question.index') }}">Question List</a></li>
                        <li class="breadcrumb-item active">Question Form</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <div class="col-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Question Form</h3>
            </div>
            <div class="card-body">
                <form action="{{ $url }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if($method == 'PUT')
                        @method('PUT')
                    @endif

                    <div class="form-group">
                        <label>Select Skill</label>
                        <select name="skill_id" class="form-control @error('skill_id') is-invalid @enderror">
                            <option value="">-- Select Skill --</option>

                            @foreach($skills as $skill)
                                <option value="{{ $skill->id }}"
                                    {{ old('skill_id', $object->skill_id ?? '') == $skill->id ? 'selected' : '' }}>
                                    {{ $skill->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('skill_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>Question</label>
                        <input type="text" name="question" class="form-control @error('question') is-invalid @enderror"
                            value="{{ old('question', $object->question ?? '') }}">

                        @error('question')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>



                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
