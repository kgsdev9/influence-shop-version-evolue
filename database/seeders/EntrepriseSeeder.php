<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntrepriseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entreprises = [
            [
                'name' => 'Tech Innovators Inc.',
                'description' => 'Une entreprise spécialisée dans les solutions technologiques innovantes.',
                'address' => '123 Boulevard High Tech, Paris',
                'email' => 'contact@techinnovators.com',
                'phone' => '+33 1 23 45 67 89',
                'website' => 'https://techinnovators.com',
                'logo' => 'logos/tech_innovators.png',
                'type_entreprise' => 'Technologie',
                'capital' => 1000000,
            ],
            [
                'name' => 'Green Ventures',
                'description' => 'Promoteur de projets écologiques et durables.',
                'address' => '456 Rue Verte, Lyon',
                'email' => 'info@greenventures.com',
                'phone' => '+33 4 56 78 90 12',
                'website' => 'https://greenventures.com',
                'logo' => 'logos/green_ventures.png',
                'type_entreprise' => 'Environnement',
                'capital' => 500000,
            ],
            // Ajoutez 8 autres entreprises ici
        ];

        for ($i = 3; $i <= 10; $i++) {
            $entreprises[] = [
                'name' => 'Entreprise Générique ' . $i,
                'description' => 'Description de l’entreprise ' . $i,
                'address' => 'Adresse de l’entreprise ' . $i,
                'email' => 'entreprise' . $i . '@example.com',
                'phone' => '+33 6 12 34 56 ' . $i,
                'website' => 'https://entreprise' . $i . '.com',
                'logo' => 'logos/entreprise' . $i . '.png',
                'type_entreprise' => 'Générique',
                'capital' => rand(100000, 1000000),
            ];
        }

        DB::table('entreprises')->insert($entreprises);
    }
}
