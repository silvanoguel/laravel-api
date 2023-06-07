@extends('layouts.admin')

@section('content')
    <h1 class="text-center">{{ $project->title }}</h1>
    <div class="d-flex justify-content-between">
        @if ($project->type)
            <span>Type: {{ $project->type->name }}</span>
        @else
            <span>No category</span>
        @endif
        {{ $project->slug }}
    </div>
    <p class="mt-4">{{ $project->content }}</p>

    <div class="my-3">
        <a class="btn btn-primary" href="{{ route('admin.projects.index') }}">Go back to Project list</a>
    </div>
@endsection
