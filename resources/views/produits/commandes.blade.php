@extends('layout')

@section('content')
<h1 class="mb-4">Liste des Commandes</h1>
<a href="{{ route('commandes.create') }}" class="btn btn-primary mb-3">Ajouter une Commande</a>

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
                    <a href="#" class="btn btn-warning btn-sm">Modifier</a>
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
@endsection
