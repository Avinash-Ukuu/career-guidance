@extends('cms.layouts.master')
@section('content')

    @if (auth()->user()->role == 'admin')
        <div class="col-12 mt-5">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $totalStudents }}</h3>
                            <p>Total Students</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        {{-- <a href="{{ route('cms.user.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $totalCareers }}</h3>
                            <p>Total Careers</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user-graduate"></i>
                        </div>
                        {{-- <a href="{{ route('cms.career.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $totalSkills }}</h3>
                            <p>Total Skills</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-lightbulb"></i>
                        </div>
                        {{-- <a href="{{ route('cms.skill.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $totalTests }}</h3>
                            <p>Tests Taken</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-book-reader"></i>
                        </div>
                        {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div>
    @else
        <div class="container">

            <h2 class="mb-4"> Welcome, {{ auth()->user()->name }}</h2>

            <div class="row">

                {{-- Tests Attempted --}}
                <div class="col-md-4">
                    <div class="card bg-primary text-white p-3">
                        <h4>{{ $totalTests ?? 0 }}</h4>
                        <p>Tests Attempted</p>
                    </div>
                </div>

                {{-- Top Skill --}}
                <div class="col-md-4">
                    <div class="card bg-success text-white p-3">
                        <h4>{{ $topSkill->name ?? 'Not Available' }}</h4>
                        <p>Your Strongest Skill</p>
                    </div>
                </div>

                {{-- Recommended Career --}}
                <div class="col-md-4">
                    <div class="card bg-warning text-white p-3">
                        <h4>{{ $career->name ?? 'Not Available' }}</h4>
                        <p>Recommended Career</p>
                    </div>
                </div>

            </div>

            {{-- Career Details --}}
            @if ($career)
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Career Details</h4>
                    </div>

                    <div class="card-body">
                        <h5>{{ $career->name }}</h5>
                        <p>{{ $career->description }}</p>
                    </div>
                </div>
            @endif

            <div class="card mt-4">
                <div class="card-header">
                    <h4>Quick Actions</h4>
                </div>

                <div class="card-body text-center">

                    <a href="{{ route('cms.careerTest') }}" class="btn btn-primary m-2">
                        Take Career Test
                    </a>

                    <a href="{{ route('cms.careerResult') }}" class="btn btn-success m-2">
                        View Result
                    </a>

                </div>
            </div>

        </div>
    @endif
@endsection
