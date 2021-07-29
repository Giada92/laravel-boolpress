@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="badge-dark">{{ $tag->name }}</h2>
        <ul>
            @foreach ($tag->posts as $post)
                <li>
                    <a href="{{ route('admin.posts.show', $post->id) }}">{{ $post->title }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection