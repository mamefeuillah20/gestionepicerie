@extends('layout')

@section('content')
    <h1 class="mb-4">Modifier le Produit</h1>

    <form action="{{ route('produits.update', $produit) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ $produit->nom }}" required>
        </div>

        <div class="mb-3">
            <label for="prix" class="form-label">Prix</label>
            <input type="number" step="0.01" class="form-control" id="prix" name="prix" value="{{ $produit->prix }}" required>
        </div>

        <div class="mb-3">
            <label for="quantite_disponible" class="form-label">Quantité Disponible</label>
            <input type="number" class="form-control" id="quantite_disponible" name="quantite_disponible" value="{{ $produit->quantite_disponible }}" required>
        </div>

        <div class="mb-3">
            <label for="categorie_id" class="form-label">Catégorie</label>
            <select class="form-control" id="categorie_id" name="categorie_id" required>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}" {{ $produit->categorie_id == $categorie->id ? 'selected' : '' }}>
                        {{ $categorie->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fournisseur_id" class="form-label">Fournisseur</label>
            <select class="form-control" id="fournisseur_id" name="fournisseur_id" required>
                @foreach($fournisseurs as $fournisseur)
                    <option value="{{ $fournisseur->id }}" {{ $produit->fournisseur_id == $fournisseur->id ? 'selected' : '' }}>
                        {{ $fournisseur->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
@endsection
