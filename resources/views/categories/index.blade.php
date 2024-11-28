@extends('layout')

@section('content')
    <h1 class="mb-4">Liste des Catégories</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#ajouterCategorieModal">
        Ajouter une Catégorie
    </button>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $categorie)
                <tr>
                    <td>{{ $categorie->nom }}</td>
                    <td>{{ $categorie->description }}</td>
                    <td>
                        <a href="{{ route('categories.edit',['category' => $categorie->id])}}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal Bootstrap pour Ajouter une Catégorie -->
    <div class="modal fade" id="ajouterCategorieModal" tabindex="-1" aria-labelledby="ajouterCategorieModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ajouterCategorieModalLabel">Ajouter une Catégorie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
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
