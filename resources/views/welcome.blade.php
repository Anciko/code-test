@extends('layout.app')

@section('body')
    <h1>Welcome page</h1>
    <a href="{{ route('login') }}">Login to create blogs</a>
@endsection
