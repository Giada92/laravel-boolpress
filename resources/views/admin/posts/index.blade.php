@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-3">Elenco Articoli</h1>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                  <th>ID</th>
                  <th>Titolo</th>
                  <th>Slug</th>
                  <th colspan="3" class="text-center">AZIONI</th>
                </tr>
            <tbody>
                @foreach ($posts as $item)
                <tr>
                    <th>{{ $item->id }}</th>
                    <th>{{ $item->title }}</th>
                    <th>{{ $item->slug }}</th>
                    <th>
                        <a href="{{ route('admin.posts.show', $item->id) }}" class="btn btn-secondary">SHOW</a> 
                    </th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                  </tr>
                @endforeach
            </tbody>
        </table>
    </div>    
@endsection