@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex flex-col justify-center items-center bg-gray-100">
        <div class="max-w-xl w-full bg-white shadow-md rounded-lg p-6">
            <div class="mb-6 text-center">
                <h3 class="text-2xl font-bold text-gray-800">{{ $post->title }}</h3>
            </div>
            <div class="text-gray-700 text-lg text-center">
                <p>{{ $post->description }}</p>
            </div>
            <div class="mt-6 text-center">
                <a class="btn btn-primary" href="{{ route('post.create') }}">Add Post</a>
            </div>
        </div>
    </div>
@endsection
