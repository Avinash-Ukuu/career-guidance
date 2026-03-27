@extends('cms.layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('cms.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Result</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <div class="col-12">



        <div class="container">

            <h2 class="mb-4">Your Career Result</h2>

            {{-- Careers --}}
            @if ($careers->count())
                @foreach ($careers as $career)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h4>{{ $career->name }}</h4>
                            <p>{{ $career->description }}</p>
                        </div>
                        <div class="card-body">
                            <h4>Roadmap</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Step</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($career->roadmaps as $roadmap)
                                        <tr>
                                            <td>{{ $roadmap->step }}</td>
                                            <td>{{ $roadmap->title }}</td>
                                            <td>{{ $roadmap->description }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-danger">
                    No career found
                </div>
            @endif

            {{-- Skill Scores --}}
            <div class="card mt-4">
                <div class="card-header">
                    <h4>Your Strengths</h4>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Skill</th>
                                <th>Your Score</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($skillScores as $skillId => $score)
                                <tr>
                                    <td>{{ $skills[$skillId] ?? 'Unknown Skill' }}</td>
                                    <td>{{ $score }}</td>
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
