<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description', 'prix', 'quantite_disponible', 'categorie_id', 'fournisseur_id'];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }
}
