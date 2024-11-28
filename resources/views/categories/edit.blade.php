@extends('layout')

@section('content')
    <h1 class="mb-4">Modifier la Catégorie</h1>

    <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ $category->nom }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description">{{ $category->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
@endsection
