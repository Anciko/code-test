@extends('layout.app')

@section('body')
    <div class="col-md-6 mx-auto">
        <h1 class="text-center">All blogs</h1>
        <div class="d-flex justify-content-between mb-2">
            <a href="{{ route('blogs.create') }}" class="btn btn-primary">Create New+</a>
            <div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-warning btn-sm">Logout</button>
                </form>
            </div>
        </div>


        @if (Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif

        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        @foreach ($blogs as $blog)
            <div class="card p-4">
                <p>{{ $blog->body }} </p>
                <i>Posted By: <span class="badge bg-info">{{ $blog?->user?->name ?? 'Unknown' }}</span></i>
                <i>{{ $blog->created_at->diffForHumans() }}</i>
                <div class="d-flex gap-2 mt-4">
                    <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-success btn-sm">Edit</a>
                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach

        {{ $blogs->links() }}
    </div>
@endsection
