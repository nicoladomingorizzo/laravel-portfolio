@extends('layouts.projects')

@section('title', $project->title)

@section('content')

    <p class="fs-3 w-75 mx-auto text-center my-5">
        {{ $project->content }}
    </p>

    <p class="fs-4 text-muted mx-auto text-center">{{ $project->tools }}</p>

@endsection
