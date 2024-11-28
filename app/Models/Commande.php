<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable = ['num_commande', 'date_commande', 'total_commande', 'statut', 'client_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function facture()
    {
        return $this->hasOne(Facture::class);
    }
}
