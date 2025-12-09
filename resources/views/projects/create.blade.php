@extends('layouts.projects')

@section('title', 'Aggiungi un progetto')

@section('content')
    <form class="d-flex flex-column align-items-center" action="{{ route('projects.store') }}" method="POST">
        @csrf

        <div class="form-control mb-3 d-flex flex-column">
            <label for="title">Titolo del progetto</label>
            <input type="text" name="title" id="title">
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="content">Contenuto del progetto</label>
            <textarea name="content" id="content" rows="5"></textarea>
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="type_id">Tipologia di progetto</label>
            <select name="type_id" id="type_id">
                @foreach ($types as $type)
                    <option value={{ $type->id }}>{{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        <input class="btn btn-lg btn-light text-center my-3" type="submit" value="Salva il progetto">
    </form>
@endsection
