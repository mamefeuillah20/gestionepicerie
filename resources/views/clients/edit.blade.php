@extends('layout')

@section('content')
    <h1 class="mb-4">Modifier le Client</h1>

    <form action="{{ route('clients.update', $client) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ $client->nom }}" required>
        </div>

        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $client->prenom }}" required>
        </div>

        <div class="mb-3">
            <label for="num_tel" class="form-label">Téléphone</label>
            <input type="text" class="form-control" id="num_tel" name="num_tel" value="{{ $client->num_tel }}" required>
        </div>

        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" value="{{ $client->adresse }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('clients.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection
