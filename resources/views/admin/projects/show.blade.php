@extends('layouts.admin')

@section('content')
    <h1 class="text-center my-4">{{ $project->title }}</h1>
    <div class="my-4">
        @if ($project->type)
            <h5>Type:</h5>
            <span>{{ $project->type->name }}</span>
        @else
            <span>No category</span>
        @endif
      
    </div>

    <div class="my-4">
        <h5>Technologies: </h5>
        @forelse ($project->technologies as $technology)
            <span>{{ $technology->name }} {{ $loop->last ? '' : ',' }}</span>
        @empty
            <span>No technology</span>
        @endforelse
    </div>

    <div class="my-5">
        <h5>Content:</h5>
        <p class="mt-4">{{ $project->content }}</p>
    </div>
   

    <div class="my-3">
        <a class="btn btn-primary" href="{{ route('admin.projects.index') }}">Go back to Project list</a>
    </div>  
    
    <div class="my-5 text-end">
        <span>{{ $project->slug }}</span>
    </div>
    
@endsection
