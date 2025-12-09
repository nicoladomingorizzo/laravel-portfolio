@extends('layouts.projects')

@section('title', 'Crea Nuova Tipologia')

@section('content')

    <div class="container py-5">
        <h1 class="mb-4">Crea Nuova Tipologia (Type)</h1>

        <form action="{{ route('admin.types.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nome Tipologia *</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required
                    maxlength="50">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="5">{{ old('description') }}</textarea>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-success btn-lg">Salva Tipologia</button>

                <a href="{{ route('admin.types.index') }}" class="btn btn-secondary btn-lg">Annulla e Torna all'Elenco</a>
            </div>
        </form>
    </div>

@endsection
