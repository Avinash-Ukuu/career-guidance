@extends('cms.layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('cms.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('cms.roadmap.index') }}">Career Roadmap List</a></li>
                        <li class="breadcrumb-item active">Career Roadmap Form</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <div class="col-12">
        <h3>Manage Roadmap for: <b>{{ $career->name }}</b></h3>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- FORM --}}
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add / Edit Step</h3>
            </div>

            <form action="{{ route('cms.roadmap.store') }}" method="POST">
                @csrf

                <input type="hidden" name="career_id" value="{{ $career->id }}">
                <input type="hidden" name="id" id="roadmap_id">

                <div class="card-body">

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Step</label>
                        <input type="number" name="step" id="step" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" id="description" class="form-control"></textarea>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" onclick="resetForm()" class="btn btn-secondary">Reset</button>
                </div>

            </form>
        </div>

        {{-- TABLE --}}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Roadmap Steps</h3>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Step</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($career->roadmaps as $roadmap)
                        <tr>
                            <td>{{ $roadmap->step }}</td>
                            <td>{{ $roadmap->title }}</td>
                            <td>{{ $roadmap->description }}</td>
                            <td>
                                <button class="btn btn-sm btn-info"
                                    onclick="editData(
                                '{{ $roadmap->id }}',
                                '{{ $roadmap->title }}',
                                '{{ $roadmap->step }}',
                                `{{ $roadmap->description }}`
                            )">
                                    Edit
                                </button>
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
    <div class="row"></div>
@endsection
@section('footerScript')
    <script>
        function editData(id, title, step, description) {
            document.getElementById('roadmap_id').value = id;
            document.getElementById('title').value = title;
            document.getElementById('step').value = step;
            document.getElementById('description').value = description;

            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        function resetForm() {
            document.getElementById('roadmap_id').value = '';
            document.getElementById('title').value = '';
            document.getElementById('step').value = '';
            document.getElementById('description').value = '';
        }
    </script>
@endsection
