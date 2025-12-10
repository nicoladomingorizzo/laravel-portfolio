@extends('layouts.projects')

@section('title', $project->title)

@section('content')

    <div class="d-flex justify-content-center py-4">
        <a class="btn btn-outline-warning btn-lg mx-5" href="{{ route('admin.projects.edit', $project) }}">Modifica</a>
        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Elimina
        </button>
    </div>

    <div class="mb-4 d-flex flex-column">

        <p class="fs-3 w-75 mx-auto text-center my-5">
            {{ $project->content }}
        </p>

        <p class="fs-4 text-muted mx-auto text-center"></b>Tipologia di progetto:</b> {{ $project->type->name }}</p>

        <div class="text-center d-flex flex-column mx-auto fs-4">
            @if ($project->tags->isNotEmpty())
                <p class="text-center mt-5"><b class="fs-5">Tecnologie utilizzate</b>
                </p>
                <div>

                    @foreach ($project->tags as $tag)
                        <span class="badge mt-0" style='background-color: {{ $tag->color }}'>{{ $tag->name }}</span>
                    @endforeach
                </div>
            @endif
        </div>

    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Richiesta eliminazione progetto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Vuoi eliminare il progetto?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-warning btn-lg" data-bs-dismiss="modal">Annulla</button>
                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-outline-danger btn-lg" value="Elimina definitivamente" type="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
