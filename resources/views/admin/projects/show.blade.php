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
                <ul>
                    <li>
                        Tipo progetto: {{ $project->type->name }}
                    </li>
                    <li>
                        Nome progetto: {{ $project->name }}
                    </li>
                    <li>
                        Image path: {{ $project->image_path }}
                    </li>
                    <li>
                        Descrizione: {{ $project->description }}
                    </li>
                    <li>
                        Tecnologie:
                        @if ($project->technologies->count() > 0)
                            <ul>
                                @foreach ($project->technologies as $technology)
                                    <li> {{ $technology->name }} </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                    <li>
                        <a class="btn btn-primary" href="{{ route('admin.projects.index') }}">
                            Torna ai progetti
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection