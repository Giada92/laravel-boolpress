@extends('layouts.app')

@section('content')
    <div class="container">

        @if (session('deleted'))
            <div class="alert alert-success"><strong>{{ session('deleted') }}</strong> eliminato correttamente!</div>
        @endif

        <h1 class="my-3">Elenco Articoli</h1>
        <a class="btn btn-primary mb-4" href="{{ route('admin.posts.create') }}">Crea un nuovo articolo</a>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                  <th>ID</th>
                  <th>Titolo</th>
                  <th>Slug</th>
                  <th>Categorie</th>
                  <th>Tag</th>
                  <th colspan="3" class="text-center">AZIONI</th>
                </tr>
            <tbody>
                @foreach ($posts as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->slug }}</td>
                    @if ($item->category != null)
                        <td>{{ $item->category->name }}</td>
                    @else
                        <td></td>
                    @endif
                    <td>
                        @foreach ($item->tags as $tag)
                            <small href="#" class="badge badge-dark">{{ $tag->name }}</small>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('admin.posts.show', $item->id) }}" class="btn btn-secondary">SHOW</a> 
                    </td>
                    <td>
                        <a href="{{ route('admin.posts.edit', $item->id) }}" class="btn btn-warning">EDIT</a>
                    </td>
                    <td>
                        <form action="{{ route('admin.posts.destroy', $item->id) }}" method="POST"
                            onsubmit="return confirm('Vuoi davvero cancellare: {{ $item->title }}')">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="DELETE">
                        </form>
                    </td>
                  </tr>
                @endforeach
            </tbody>
        </table>
    </div>    
@endsection