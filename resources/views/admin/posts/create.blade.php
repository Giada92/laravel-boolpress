@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-3">Crea un nuovo articolo</h1>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary mb-3">Torna all'elenco Aricoli</a>
        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
              <label for="title">Titolo dell'articolo</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Inserisci il titolo dell'articolo" name="title" value="{{ old('title') }}">
                @error('title')
                    <small class="alert-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Inserisci il contenuto dell'articolo</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="8" name="content" placeholder="Inserisci il contenuto dell'articolo">{{ old('content') }}</textarea>
                @error('title')
                    <small class="alert-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Crea</button>
        </form>
    </div>
@endsection