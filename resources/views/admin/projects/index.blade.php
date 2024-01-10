@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>Projects</h2>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
                Create
            </a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            @if(count($projects) > 0)

                <table class="table table-bordered">

                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Image path</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($projects as $project)
                            <tr>
                                <td>{{ $project->type->name }}</td>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->image_path }}</td>
                                <td>
                                    <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-info">View</a>
                                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Sei certo?')">Delete</button>
                                    </form>
                                </td>
                                
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            @else

                <p>Al momento non ci sono progetti. Creane uno <a href="{{ route('admin.projects.create') }}">qui</a>!</p>

            @endif
        </div>
    </div>    

</div>
@endsection