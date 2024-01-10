@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Show Project</h2>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <p>
                    Tipo progetto: {{ $project->type->name }}
                    <br>
                    Nome progetto: {{ $project->name }}
                    <br>
                    Image path: {{ $project->image_path }}
                    <br>
                    Description: {{ $project->description }}
                </p>
                <p>
                    <a class="btn btn-primary" href="{{ route('admin.projects.index') }}">
                        Torna ai progetti
                    </a>
                </p>
            </div>
        </div>
    </div>
@endsection