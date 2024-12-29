<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AbonnementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subscriptions = [
            [
                'libelle' => 'Basic Plan',
                'price' => 0.00,
                'description' => 'Accès limité aux fonctionnalités de base.',
            ],
            [
                'libelle' => 'Pro Plan',
                'price' => 15.99,
                'description' => 'Accès à toutes les fonctionnalités standards avec 8 images possibles pour les produits.',
            ],
            [
                'libelle' => 'Business Plan',
                'price' => 29.99,
                'description' => 'Conçu pour les entreprises, incluant un support premium et un nombre illimité d’images pour les produits.',
            ],
            [
                'libelle' => 'Premium Plan',
                'price' => 49.99,
                'description' => 'Abonnement complet avec analytics avancés et fonctionnalités personnalisées.',
            ],
        ];

        DB::table('abonnement')->insert($subscriptions);
    }
}
