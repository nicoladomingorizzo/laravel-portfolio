@extends('layouts.projects')

@section('title', 'Modifica il progetto')

@section('content')
    <form class="d-flex flex-column align-items-center" action="{{ route('projects.update', $project) }}" method="POST">
        @csrf

        @method('PUT')

        <div class="form-control mb-3 d-flex flex-column">
            <label for="title">Titolo del progetto</label>
            <input type="text" name="title" id="title" value="{{ $project->title }}">
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="content">Contenuto del progetto</label>
            <textarea name="content" id="content" rows="5">{{ $project->content }}</textarea>
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="tools">Tools usati nel progetto</label>
            <input type="text" name="tools" id="tools" value="{{ $project->tools }}">
        </div>

        <input class="btn btn-lg btn-light text-center my-3" type="submit" value="Salva il progetto">
    </form>
@endsection
