<?php

namespace Database\Factories;

use App\Models\Categorie;
use App\Models\Fournisseur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'prix' => $this->faker->randomFloat(2, 10, 1000), // Prix entre 10 et 1000 FCFA
            'quantite_disponible' => $this->faker->numberBetween(1, 100),
            'categorie_id' => Categorie::factory(),  // Génère une catégorie associée
            'fournisseur_id' => Fournisseur::factory(),
        ];
    }
}
