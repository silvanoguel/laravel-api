@extends('layouts.admin')

@section('content')
    <h1>Project list</h1>

    @include('partials.session_message')


    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Create a new project</a>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">Type</th>
                <th scope="col">Technology</th>
                <th scope="col">Slug</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->type?->name }}</td>
                    <td>
                        @foreach ($project->technologies as $technology)
                            <span>{{ $technology->name }} {{ $loop->last ? '' : ',' }}</span>
                        @endforeach
                    </td>
                    <td>{{ $project->slug }}</td>
                    <td>
                        <a href="{{ route('admin.projects.show', $project->slug) }}" class="btn btn-success">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn btn-warning">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form class="d-inline-block" action="{{ route('admin.projects.destroy', $project->slug) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
