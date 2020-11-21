@extends('layouts.app')


@section('content')
    <div class="container">
        <form action="/post/store" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Titre</label>
                <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" placeholder="Titre" />
                @error('title')
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="content">Contenu</label>
                <textarea name="content"  class="form-control @error('content') is-invalid @enderror" rows="3" placeholder="Contenu"></textarea>
                @error('content')
                    <div class="invalid-feedback">
                        {{ $errors->first('content') }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">POSTER</button>
        </form>
    </div>
    
@endsection