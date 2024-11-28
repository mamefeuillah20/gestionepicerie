@extends('layout')

@section('content')
    <h1 class="mb-4">Liste des Fournisseurs</h1>

    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#ajouterFournisseurModal">
        Ajouter un Fournisseur
    </button>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Téléphone</th>
                <th>Adresse</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fournisseurs as $fournisseur)
                <tr>
                    <td>{{ $fournisseur->nom }}</td>
                    <td>{{ $fournisseur->num_telephone }}</td>
                    <td>{{ $fournisseur->adresse }}</td>
                    <td>
                        <a href="{{ route('fournisseurs.edit',$fournisseur)}}" class="btn btn-warning btn-sm">Modifier</a>
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

    <!-- Modal Bootstrap pour Ajouter un Fournisseur -->
    <div class="modal fade" id="ajouterFournisseurModal" tabindex="-1" aria-labelledby="ajouterFournisseurModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ajouterFournisseurModalLabel">Ajouter un Fournisseur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('fournisseurs.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>
                        <div class="mb-3">
                            <label for="num_telephone" class="form-label">Téléphone</label>
                            <input type="text" class="form-control" id="num_telephone" name="num_telephone" required>
                        </div>
                        <div class="mb-3">
                            <label for="adresse" class="form-label">Adresse</label>
                            <textarea class="form-control" id="adresse" name="adresse"></textarea>
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
