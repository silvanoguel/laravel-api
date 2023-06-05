@extends('layouts.admin')

@section('content')
    

    <form method="POST" action="{{route('admin.projects.store')}}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Add Title</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror">
            @error('title')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="description" class="form-label">Add Description</label>
            <input type="text" name="description" class="form-control">
        </div>
        
        <button type="submit" class="btn btn-primary">Save</button>
    </form>


@endsection