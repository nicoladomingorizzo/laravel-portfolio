@extends('layouts.projects')

@section('title', 'Gestione Tipologie Progetti')

@section('content')

    <h1 class="mb-4">Gestione Tipologie (Types)</h1>

    <div class="d-flex justify-content-end">
        <a class="btn btn-outline-success btn-lg px-4 py-2 mb-4" href="{{ route('admin.types.create') }}">
            + Aggiungi Nuova Tipologia
        </a>
    </div>

    @if ($types->isNotEmpty())
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome Tipologia</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Numero Progetti</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    <tr>
                        <th scope="row">{{ $type->id }}</th>
                        <td>
                            <a href="{{ route('admin.types.show', $type) }}" class="text-body fw-bold">
                                {{ $type->name }}
                            </a>
                        </td>
                        <td>{{ Str::limit($type->description, 80) }}</td>
                        <td>
                            {{ $type->projects->count() }}
                        </td>
                        <td>
                            <a href="{{ route('admin.types.edit', $type) }}" class="btn btn-sm btn-warning me-2">
                                Modifica
                            </a>

                            <form action="{{ route('admin.types.destroy', $type) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('ATTENZIONE: Eliminare questa tipologia la rimuoverà dai progetti che la utilizzano. Sei sicuro?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Elimina</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">
            Nessuna tipologia di progetto (Type) è stata ancora aggiunta. Usa il bottone in alto per crearne una.
        </div>
    @endif

@endsection
