@extends('layout.app')

@section('body')
    <div class="col-md-6 mx-auto">
        <h1 class="text-center">Create </h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('blogs.update', $blog->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $blog->title ?? null) }}">

            </div>
            <div class="mb-3">
                <label for="body" class="form-label required">Body</label>
                <textarea name="body" id="body" class="form-control" cols="30" rows="10">{{ old("body", $blog->body) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
