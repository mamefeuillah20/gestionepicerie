<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Client;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function index()
    {
        $commandes = Commande::with('client')->get();
        $clients = Client::all();
        return view('commandes.index', compact('commandes', 'clients'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('commandes.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'num_commande' => 'required|unique:commandes',
            'date_commande' => 'required|date',
            'total_commande' => 'required|numeric',
            'client_id' => 'required'
        ]);

        Commande::create($request->all());

        return redirect()->route('commandes.index')->with('success', 'Commande ajoutée');
    }

    public function edit(Commande $commande)
    {
        $clients = Client::all();
        return view('commandes.edit', compact('commande', 'clients'));
    }

    public function update(Request $request, Commande $commande)
    {
        $request->validate(['num_commande' => 'required']);
        $commande->update($request->all());

        return redirect()->route('commandes.index')->with('success', 'Commande mise à jour');
    }

    public function destroy(Commande $commande)
    {
        $commande->delete();
        return redirect()->route('commandes.index')->with('success', 'Commande supprimée');
    }
}
