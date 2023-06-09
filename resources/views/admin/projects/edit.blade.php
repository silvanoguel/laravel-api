@extends('layouts.admin')

@section('content')
    <h2>Edit your Project {{ $project->title }}</h2>

    @include('partials.errors')

    <div class="my-3">
        <a class="btn btn-primary" href="{{ route('admin.projects.index') }}">Go back to Project list</a>
    </div>

    <form method="POST" action="{{ route('admin.projects.update', $project->slug) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $project->title) }}">
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
                    <option @selected($type->id == old('type_id',$project->type?->id)) value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <h5>technologies</h5>
            @foreach ($technologies as $technology)
                <div class="form-check">
                    {{-- Al primo caricamento della pagina devo selezionare i checkbox che sono salvate nel DB, quindi ho la collection.
                        Se c'è un'errore al submit del bottone devo selezionare i checkbox selezionati dall'utente nella pagina precedente, quindo ho un array preso da old.
                        --}}
                    <input class="form-check-input" type="checkbox" name="technologies[]" value="{{ $technology->id }}"
                        id="tag-{{ $technology->id }}" 
                        @checked(old('technologies') ? in_array($technology->id, old('technologies', [])) : $project->technologies->contains($technology))>
                    <label class="form-check-label" for="technology-{{ $technology->id }}">
                        {{ $technology->name }}
                    </label>
                </div>
            @endforeach
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" rows="3" name="content">{{ old('content', $project->content) }}</textarea>
        </div>
        <button class="btn btn-primary" type="submit">Send</button>
    </form>
@endsection
