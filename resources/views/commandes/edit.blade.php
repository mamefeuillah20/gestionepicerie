@extends('layout')

@section('content')
    <h1 class="mb-4">Modifier la Commande</h1>

    <form action="{{ route('commandes.update', $commande) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="num_commande" class="form-label">Numéro de Commande</label>
            <input type="text" class="form-control" id="num_commande" name="num_commande" value="{{ $commande->num_commande }}" required>
        </div>

        <div class="mb-3">
            <label for="date_commande" class="form-label">Date de Commande</label>
            <input type="date" class="form-control" id="date_commande" name="date_commande" value="{{ $commande->date_commande }}" required>
        </div>

        <div class="mb-3">
            <label for="total_commande" class="form-label">Total</label>
            <input type="number" class="form-control" id="total_commande" name="total_commande" value="{{ $commande->total_commande }}" required>
        </div>

        <div class="mb-3">
            <label for="statut" class="form-label">Statut</label>
            <select class="form-control" id="statut" name="statut" required>
                <option value="en cours" {{ $commande->statut == 'en cours' ? 'selected' : '' }}>En cours</option>
                <option value="livré" {{ $commande->statut == 'livré' ? 'selected' : '' }}>Livré</option>
                <option value="annulé" {{ $commande->statut == 'annulé' ? 'selected' : '' }}>Annulé</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="client_id" class="form-label">Client</label>
            <select class="form-control" id="client_id" name="client_id" required>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ $commande->client_id == $client->id ? 'selected' : '' }}>
                        {{ $client->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('commandes.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection
