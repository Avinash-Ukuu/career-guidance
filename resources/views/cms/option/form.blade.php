@extends('cms.layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('cms.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('cms.option.index') }}">Option List</a></li>
                        <li class="breadcrumb-item active">Option Form</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <div class="col-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Option Form</h3>
            </div>
            <div class="card-body">
                <form action="{{ $url }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if($method == 'PUT')
                        @method('PUT')
                    @endif

                     <!-- Question -->
                    <div class="form-group mb-2">
                        <label>Question</label>
                        <select name="question_id" class="form-control">
                            <option >Select Question</option>
                            @foreach($questions as $q)
                                <option value="{{ $q->id }}"
                                    {{-- {{ (isset($question) && $question->id == $q->id) ? 'selected' : '' }}> --}}
                                    {{ ($q->id ==  $object->question_id) ? 'selected' : '' }}>
                                    {{ $q->question }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    {{-- Option --}}
                    <div class="form-group mb-2">
                        <label>Option</label>
                        <input type="text" name="option_text" class="form-control @error('option_text') is-invalid @enderror"
                            value="{{ old('option_text', $object->option_text ?? '') }}">
                        @error('option_text')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Score --}}
                    <div class="form-group mb-2">
                        <label>Score</label>
                        <input type="text" name="score" class="form-control @error('score') is-invalid @enderror"
                            value="{{ old('score', $object->score ?? '') }}">
                        @error('score')
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
