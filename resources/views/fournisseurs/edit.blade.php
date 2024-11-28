@extends('layout')

@section('content')
    <h1 class="mb-4">Modifier le Fournisseur</h1>

    <form action="{{ route('fournisseurs.update', $fournisseur) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ $fournisseur->nom }}" required>
        </div>

        <div class="mb-3">
            <label for="num_telephone" class="form-label">Numéro de Téléphone</label>
            <input type="text" class="form-control" id="num_telephone" name="num_telephone" value="{{ $fournisseur->num_telephone }}" required>
        </div>

        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse</label>
            <textarea class="form-control" id="adresse" name="adresse">{{ $fournisseur->adresse }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
@endsection
