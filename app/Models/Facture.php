<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Facture extends Model
{
    use HasFactory;
    protected $fillable = ['date_paiement', 'montant', 'mode_paiement', 'commande_id'];

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }
}
