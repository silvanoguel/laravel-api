@extends('layouts.admin')

@section('content')
    <h2>Create a new project</h2>

    @include('partials.errors')

    <div class="my-3">
        <a class="btn btn-primary" href="{{ route('admin.projects.index') }}">Go back to Project list</a>
    </div>

    <form action="{{ route('admin.projects.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                value="{{ old('title') }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type">Type</label>
            <select class="form-select" id="type" name="type_id">
                <option value=""></option>
                @foreach ($types as $type)
                    <option @selected(old('type_id') == $type->id) value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="my-4">
            <h5>choose technology</h5>
            @foreach ($technologies as $technology)
                <div class="form-check">
                    <input class="form-check-input" name="technologies[]" type="checkbox" value="{{ $technology->id }}"
                        id="tag-{{ $technology->id }}" @checked(in_array($technology->id, old('technologies', [])))>
                    <label class="form-check-label" for="technology-{{ $technology->id }}">
                        {{ $technology->name }}
                    </label>
                </div>
            @endforeach
        </div>


        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" rows="3" name="content">{{ old('content') }}</textarea>
        </div>
        <button class="btn btn-primary" type="submit">Send</button>
    </form>
@endsection
