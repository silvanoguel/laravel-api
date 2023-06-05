@extends('layouts.app')

@section('content')
    <div class="container">

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="my-3">
            <a class="btn btn-primary" href="{{ route('admin.projects.index') }}">Go to project list</a>
        </div>

        <h2>EDIT YOUR PROJECT: {{ $project->slug }}</h2>

        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    name="title" value="{{ old('title', $project->title) }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <input type="text" class="form-control @error('content') is-invalid @enderror" id="content"
                    name="title" value="{{ old('content', $project->content) }}">
                @error('content')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <button class="btn btn-primary" type="submit">Send</button>
        </form>
    </div>
@endsection
