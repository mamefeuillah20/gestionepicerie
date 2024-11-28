<?php
namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Fournisseur;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::with('categorie', 'fournisseur')->get();
        $categories= Categorie::get();
        $fournisseurs= Fournisseur::get();
        return view('produits.index', compact('produits', 'categories', 'fournisseurs'));
    }

    public function create()
    {
        $categories = Categorie::all();
        $fournisseurs = Fournisseur::all();
        return view('produits.create', compact('categories', 'fournisseurs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prix' => 'required|numeric',
            'quantite_disponible' => 'required|integer',
            'categorie_id' => 'required',
            'fournisseur_id' => 'required',
        ]);

        Produit::create($request->all());

        return redirect()->route('produits.index')->with('success', 'Produit ajouté avec succès');
    }

    public function edit(Produit $produit)
    {
        $categories = Categorie::all();
        $fournisseurs = Fournisseur::all();
        return view('produits.edit', compact('produit', 'categories', 'fournisseurs'));
    }

    public function update(Request $request, Produit $produit)
    {
        $request->validate([
            'nom' => 'required',
            'prix' => 'required|numeric',
            'quantite_disponible' => 'required|integer',
        ]);

        $produit->update($request->all());

        return redirect()->route('produits.index')->with('success', 'Produit mis à jour');
    }

    public function destroy(Produit $produit)
    {
        $produit->delete();
        return redirect()->route('produits.index')->with('success', 'Produit supprimé');
    }
}
