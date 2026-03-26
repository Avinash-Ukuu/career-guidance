@extends('cms.layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('cms.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Career Test</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <div class="col-12">
        @if($questions->isEmpty())
            <div class="alert alert-warning text-center">
                Please select your skills first.
            </div>
        @else
            <form action="{{ route('cms.store.careerTest') }}" method="POST">
                @csrf

                @foreach ($questions as $index => $question)
                    @if($question->options->isNotEmpty())
                        <div class="card card-primary mb-3">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Q{{ $index + 1 }}. {{ $question->question }}
                                </h3>
                            </div>

                            <div class="card-body">
                                @foreach ($question->options as $option)
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]"
                                            value="{{ $option->id }}" id="option_{{ $option->id }}"
                                            {{ old('answers.' . $question->id) == $option->id ? 'checked' : '' }}>

                                        <label class="form-check-label" for="option_{{ $option->id }}">
                                            {{ $option->option_text }}
                                        </label>
                                    </div>
                                @endforeach

                                @error('answers.' . $question->id)
                                    <small class="text-danger">Please select an option</small>
                                @enderror

                            </div>
                        </div>
                    @endif
                @endforeach

                <div class="card">
                    <div class="card-body text-center">
                        <button type="submit" class="btn btn-success btn-lg">Submit Test</button>
                    </div>
                </div>

            </form>
        @endif
    </div>
@endsection
