@extends('layouts.projects')

@section('title', 'Modifica il progetto')

@section('content')
    <form class="d-flex flex-column align-items-center" action="{{ route('admin.projects.update', $project) }}" method="POST">
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
            <label for="type_id">Categoria di progetto</label>
            <select name="type_id" id="type_id">
                @foreach ($types as $type)
                    <option value='{{ $type->id }}'{{ $project->type_id == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-control mb-3 d-flex flex-wrap">
            @foreach ($tags as $tag)
                <div class="tag mx-2 my-1">
                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}" id="tag-{{ $tag->id }}"
                        {{ $project->tags && $project->tags->contains($tag->id) ? 'checked' : '' }}>
                    <label for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                </div>
            @endforeach
        </div>

        <input class="btn btn-lg btn-light text-center my-3" type="submit" value="Salva il progetto">
    </form>
@endsection
