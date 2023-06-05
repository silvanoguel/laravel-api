@extends('layouts.admin')

@section('content')
    <h1 class="text-center">{{ $project->title }}</h1>
    <div class="text-end">
        {{ $project->slug }}
    </div>
    <p class="mt-4">{{ $project->content }}</p>


    {{-- <div class="my-3">
        <a class="btn btn-warning" href="{{ route('projects.edit', $project->id) }}">Edit</a>
        <form class="d-inline-block" action="{{ route('projects.destroy', $project->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" id="delete_btn">Cancel</button>
        </form>

    </div> --}}


@endsection