<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Smartphone Galaxy S21',
                'description' => 'Un smartphone haut de gamme avec écran AMOLED.',
                'price' => 799.99,
                'entreprise_id' => 1,
                'influenceur_id' => 1,
                'shortdescription' => 'Smartphone 5G performant',
                'category_id' => 1,
                'qtedisponible' => 50,
                'stockminimun' => 5,
                'status' => 'active',
            ],
            [
                'name' => 'Casque Audio Bluetooth',
                'description' => 'Casque sans fil avec réduction de bruit.',
                'price' => 129.99,
                'entreprise_id' => 2,
                'influenceur_id' => 2,
                'shortdescription' => 'Son haute qualité',
                'category_id' => 2,
                'qtedisponible' => 30,
                'stockminimun' => 3,
                'status' => 'active',
            ],
            // Ajoutez 28 autres produits similaires
        ];

        for ($i = 3; $i <= 30; $i++) {
            $products[] = [
                'name' => 'Produit aléatoire ' . $i,
                'description' => 'Description pour le produit aléatoire ' . $i,
                'price' => rand(10, 500),
                'entreprise_id' => rand(1, 10),
                'influenceur_id' => rand(1, 5),
                'shortdescription' => 'Courte description produit ' . $i,
                'category_id' => rand(1, 5),
                'qtedisponible' => rand(1, 100),
                'stockminimun' => rand(1, 10),
                'status' => rand(0, 1) ? 'active' : 'inactive',
            ];
        }

        DB::table('products')->insert($products);
    }
}
