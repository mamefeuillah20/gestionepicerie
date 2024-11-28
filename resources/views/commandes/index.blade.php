@extends('layout')

@section('content')
    <h1 class="mb-4">Liste des Commandes</h1>

    <!-- Bouton pour ouvrir le modal -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#ajouterCommandeModal">
        Ajouter une Commande
    </button>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Numéro</th>
                <th>Date</th>
                <th>Total</th>
                <th>Statut</th>
                <th>Client</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commandes as $commande)
                <tr>
                    <td>{{ $commande->num_commande }}</td>
                    <td>{{ $commande->date_commande }}</td>
                    <td>{{ $commande->total_commande }} FCFA</td>
                    <td>{{ $commande->statut }}</td>
                    <td>{{ $commande->client->nom }}</td>
                    <td>
                        <a href="{{ route('commandes.edit', $commande) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('commandes.destroy', $commande) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal Bootstrap pour Ajouter une Commande -->
    <div class="modal fade" id="ajouterCommandeModal" tabindex="-1" aria-labelledby="ajouterCommandeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ajouterCommandeModalLabel">Ajouter une Commande</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('commandes.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="num_commande" class="form-label">Numéro de Commande</label>
                            <input type="text" class="form-control" id="num_commande" name="num_commande" required>
                        </div>
                        <div class="mb-3">
                            <label for="date_commande" class="form-label">Date de Commande</label>
                            <input type="date" class="form-control" id="date_commande" name="date_commande" required>
                        </div>
                        <div class="mb-3">
                            <label for="total_commande" class="form-label">Total</label>
                            <input type="number" class="form-control" id="total_commande" name="total_commande" required>
                        </div>
                        <div class="mb-3">
                            <label for="statut" class="form-label">Statut</label>
                            <input type="text" class="form-control" id="statut" name="statut" required>
                        </div>
                        <div class="mb-3">
                            <label for="client_id" class="form-label">Client</label>
                            <select class="form-control" id="client_id" name="client_id" required>
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->nom }}</option>
                                @endforeach
                            </select>
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
