@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$category->name}}</h1>
        <ul>
        @forelse ($category->posts as $item)
            <li>
                <a href="{{ route('admin.posts.show', $item->id) }}">{{ $item->title }}</a>
            </li>
        @empty
            <li>
                <p>Non ci sono Articoli con questa categoria</p>
            </li>
        @endforeach
        </ul>
    </div>
@endsection