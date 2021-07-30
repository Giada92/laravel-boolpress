@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-3">Modifica l'Articolo: {{ $post->title }}</h1>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary mb-3">Torna all'elenco Articoli</a>
        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
              <label for="title">Titolo dell'articolo</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Inserisci il titolo dell'articolo" name="title" value="{{ old('title', $post->title) }}">
                @error('title')
                    <small class="alert-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Inserisci il contenuto dell'articolo</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="8" name="content" placeholder="Inserisci il contenuto dell'articolo">{{ old('content', $post->content) }}</textarea>
                @error('title')
                    <small class="alert-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="category_id">Scegli la Categoria</label>
                <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                  <option value="">--Scegli la categoria--</option>
                  @foreach ($categories as $item)
                    <option 
                    {{($item->id == old('category_id', $item->category_id)) ? 'selected' : ''}}
                      value="{{ $item->id }}">{{$item->name}}
                    </option> 
                  @endforeach
                </select>
                @error('category_id')
                    <small class="alert-danger">{{ $message }}</small>
                @enderror
            </div>
            {{-- tags --}}
            <div class="form-group">
              @foreach ($tags as $tag)
                  <div class="form-check form-check-inline">
                    @if ($errors->any())
                      <input class="form-check-input" type="checkbox" id="tag-{{ $tag->id }}" value="{{ $tag->id }}" name="tags[]"
                      {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                    @else
                      <input class="form-check-input" type="checkbox" id="tag-{{ $tag->id }}" value="{{ $tag->id }}" name="tags[]"
                      {{ $post->tags->contains($tag->id) ? 'checked' : ''}}>
                    @endif
                    <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                  </div>
              @endforeach
            </div>
            {{-- @dd($post->tags) --}}
            <div class="mb-3">
              @error('tags')
                <small class="alert-danger">{{ $message }}</small>
              @enderror
            </div>
            {{-- /tags --}}
            <button type="submit" class="btn btn-primary">Salva Modifiche</button>
        </form>
    </div>
@endsection