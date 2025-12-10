@extends('layouts.projects')

@section('title', 'Tutti i progetti')

@section('content')
    <div class="d-flex justify-content-end">
        <a class="btn btn-outline-info btn-lg text-centered me-2 px-4 py-2 mb-5 mt-2"
            href="{{ route('admin.projects.create') }}">Aggiungi
            un progetto</a>
    </div>

    {{-- <div class="row row-cols-1 row-cols-sm-1 row-cols-md-3 row-cols-lg-4 align-items-stretch">
        @foreach ($projects as $project)
            <div class="col mb-4">
                <div class="card h-100 d-flex flex-column">
                    <div class="card-body d-flex flex-column text-center mx-auto">

                        <h2 class="card-title">{{ $project->title }}</h2>
                        <p class="card-text my-5">
                            <a href="{{ route('projects.show', $project->id) }}" class="text-decoration-none text-body">
                                Visualizza il progetto
                            </a>
                        </p>
                        <p class="card-text text-muted mt-auto">{{ $project->tools }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div> --}}
    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 align-items-stretch">
        @foreach ($projects as $project)
            <div class="col mb-4">
                <div class="card h-100 d-flex flex-column">
                    <div class="card-body d-flex flex-column text-center mx-auto justify-content-between">
                        <h3 class="card-title mb-4">{{ $project->title }}</h3>
                        <p class="card-text py-3">
                            <a href="{{ route('admin.projects.show', $project->id) }}" class="text-body">
                                Visualizza il progetto
                            </a>
                        </p>
                        <p class="card-text text-muted mb-0">{{ $project->tools }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
