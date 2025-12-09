@extends('layouts.projects')

@section('title', 'Modifica Tipologia: ' . $type->name)

@section('content')

    <div class="container py-5">
        <h1 class="mb-4">Modifica Tipologia: **{{ $type->name }}**</h1>

        <form action="{{ route('admin.types.update', $type) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nome Tipologia *</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $type->name) }}"
                    required maxlength="50">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="5">{{ old('description', $type->description) }}</textarea>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-warning btn-lg">Aggiorna Tipologia</button>

                <a href="{{ route('admin.types.show', $type) }}" class="btn btn-secondary btn-lg">Annulla Modifica</a>
            </div>
        </form>
    </div>

@endsection
