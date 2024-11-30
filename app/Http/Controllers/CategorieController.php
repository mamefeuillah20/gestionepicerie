<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return response()->json([
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'nullable'
        ]);
        
        $categorie = Categorie::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Catégorie ajoutée avec succès',
            'data' => $categorie
        ]);
    }

    public function edit($id)
    {
        // Trouver la catégorie par son ID
        $category = Categorie::find($id);
    
        // Vérifier si la catégorie existe
        if ($category) {
            return response()->json($category); // Retourner la catégorie en format JSON
        }
    
        // Si la catégorie n'existe pas, retourner une erreur
        return response()->json(['message' => 'Catégorie non trouvée'], 404);
    }

    public function update(Request $request, $id)
    {
        $category = Categorie::find($id);
        
        if ($category) {
            $category->nom = $request->nom;
            $category->description = $request->description;
            $category->save();
    
            return response()->json(['message' => 'Catégorie mise à jour avec succès.']);
        }
    
        return response()->json(['message' => 'Catégorie non trouvée.'], 404);
    }
    

    public function destroy($id)
    {
        $category = Categorie::find($id);
    
        if ($category) {
            $category->delete();
            return response()->json(['message' => 'Catégorie supprimée avec succès.']);
        }
    
        return response()->json(['message' => 'Catégorie non trouvée.'], 404);
    }
}
