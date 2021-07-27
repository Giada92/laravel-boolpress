@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}
            @if ($post->category != null)
                <a href="{{ route('admin.categories.show', $post->category->id) }}" class="badge badge-primary">{{ $post->category->name }}</a> 
            @else
                <span class="badge badge-secondary">Non fa parte di nessuna categoria</span>
            @endif
            
        </h1> 
        <small>{{ $post->slug }}</small>
        <div class="my-4">
            <a class="btn btn-warning" href="{{ route('admin.posts.edit', $post->id ) }}">Modifica</a>
        </div>
        <div>{{ $post->content }}</div>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary mt-4">Torna all'Elenco</a>
    </div>
@endsection