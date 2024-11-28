@extends('layout')

@section('content')
    <h1 class="mb-4">Liste des Clients</h1>

    <!-- Bouton Ajouter avec une modal -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#ajouterClientModal">
        Ajouter un Client
    </button>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Téléphone</th>
                <th>Adresse</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{ $client->nom }}</td>
                    <td>{{ $client->prenom }}</td>
                    <td>{{ $client->num_tel }}</td>
                    <td>{{ $client->adresse }}</td>
                    <td>
                        <a href="{{ route('clients.edit', $client) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('clients.destroy', $client) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal Bootstrap pour Ajouter un Client -->
    <div class="modal fade" id="ajouterClientModal" tabindex="-1" aria-labelledby="ajouterClientModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ajouterClientModalLabel">Ajouter un Client</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('clients.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" required>
                        </div>
                        <div class="mb-3">
                            <label for="num_tel" class="form-label">Téléphone</label>
                            <input type="text" class="form-control" id="num_tel" name="num_tel" required>
                        </div>
                        <div class="mb-3">
                            <label for="adresse" class="form-label">Adresse</label>
                            <input type="text" class="form-control" id="adresse" name="adresse" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
