<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fournisseur extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'num_telephone', 'adresse'];

    public function produits()
    {
        return $this->hasMany(Produit::class);
    }
}
