@extends('cms.layouts.master')
@section('content')
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
@endsection
