<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Client;
use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Fournisseur;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Categorie::factory(5)->create();  // 5 catégories
        Fournisseur::factory(5)->create();  // 5 fournisseurs
        Client::factory(10)->create();  // 10 clients
        Produit::factory(20)->create();
    }
}
