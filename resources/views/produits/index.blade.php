@extends('layout')

@section('content')
    <h1 class="mb-4">Liste des Produits</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Bouton unique pour ouvrir la modal -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#ajouterProduitModal">
        Ajouter un Produit
    </button>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Quantité</th>
                <th>Prix</th>
                <th>Catégorie</th>
                <th>Fournisseur</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produits as $produit)
                <tr>
                    <td>{{ $produit->nom }}</td>
                    <td>{{ $produit->quantite_disponible }}</td>
                    <td>{{ $produit->prix }} FCFA</td>
                    <td>{{ $produit->categorie->nom }}</td>
                    <td>{{ $produit->fournisseur->nom }}</td>
                    <td>
                        <a href="{{ route('produits.edit',$produit)}}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="#" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal Bootstrap pour Ajouter un Produit -->
    <div class="modal fade" id="ajouterProduitModal" tabindex="-1" aria-labelledby="ajouterProduitModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ajouterProduitModalLabel">Ajouter un Produit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('produits.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>
                        <div class="mb-3">
                            <label for="prix" class="form-label">Prix</label>
                            <input type="number" step="0.01" class="form-control" id="prix" name="prix" required>
                        </div>
                        <div class="mb-3">
                            <label for="quantite" class="form-label">Quantité Disponible</label>
                            <input type="number" class="form-control" id="quantite" name="quantite_disponible" required>
                        </div>
                        <div class="mb-3">
                            <label for="categorie_id" class="form-label">Catégorie</label>
                            <select class="form-control" id="categorie_id" name="categorie_id" required>
                                @foreach($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="fournisseur_id" class="form-label">Fournisseur</label>
                            <select class="form-control" id="fournisseur_id" name="fournisseur_id" required>
                                @foreach($fournisseurs as $fournisseur)
                                    <option value="{{ $fournisseur->id }}">{{ $fournisseur->nom }}</option>
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
