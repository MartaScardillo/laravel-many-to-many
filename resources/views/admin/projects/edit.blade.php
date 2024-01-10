@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Edit Project</h2>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                @if(session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('admin.projects.update', $project->id) }}" method="post">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="type_id">Type:</label>
                        <select class="form-control" name="type_id" id="type_id">
                            @foreach ( $types as $type )
                                <option
                                    value="{{ $type->id }}"
                                    {{ $type->id === $project->type_id ? 'selected' : null }}
                                >
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $project->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="image_path">Image path:</label>
                        <input type="text" name="image_path" id="image_path" value="{{ $project->image_path }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="3">{{ $project->description }}</textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Update Project</button>
                </form>
            </div>
        </div>
    </div>
@endsection