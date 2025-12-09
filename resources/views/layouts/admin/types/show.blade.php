@extends('layouts.projects')

@section('title', 'Dettaglio Tipologia: ' . $type->name)

@section('content')

    <div class="container py-5">
        <h1 class="mb-4">Dettaglio Tipologia: **{{ $type->name }}**</h1>

        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h3 class="card-title">{{ $type->name }}</h3>
                <p class="card-text text-muted">**ID:** {{ $type->id }}</p>
                <p class="card-text">**Descrizione:** {{ $type->description }}</p>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <a href="{{ route('admin.types.edit', $type) }}" class="btn btn-warning me-2">Modifica</a>

                <form action="{{ route('admin.types.destroy', $type) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Sei sicuro di voler eliminare questa tipologia?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Elimina</button>
                </form>
            </div>
        </div>

        <hr>

        <h2 class="mt-5 mb-3">Progetti con questa Tipologia ({{ $type->projects->count() }})</h2>

        @if ($type->projects->isNotEmpty())
            <ul class="list-group">
                @foreach ($type->projects as $project)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $project->title }}
                        <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-sm btn-info">
                            Vai al Progetto
                        </a>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="alert alert-warning">
                Non ci sono progetti attualmente assegnati a questa tipologia.
            </div>
        @endif

        <a href="{{ route('admin.types.index') }}" class="btn btn-secondary mt-4">Torna all'Elenco Tipologie</a>
    </div>

@endsection
