<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompagneSeederSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $compagnes = [
            [
                'name' => 'Lancement Smartphone Galaxy S21',
                'description' => 'Campagne de lancement pour le Galaxy S21.',
                'type' => 'Publicité',
                'start_date' => Carbon::now()->subDays(30)->toDateString(),
                'end_date' => Carbon::now()->addDays(30)->toDateString(),
                'total_budget' => 50000,
                'status' => 'active',
                'entreprise_id' => 1,
                'product_id' => 1,
            ],
            [
                'name' => 'Promotion Casque Bluetooth',
                'description' => 'Promotion spéciale sur le casque audio sans fil.',
                'type' => 'Réseaux sociaux',
                'start_date' => Carbon::now()->subDays(15)->toDateString(),
                'end_date' => Carbon::now()->addDays(15)->toDateString(),
                'total_budget' => 20000,
                'status' => 'active',
                'entreprise_id' => 2,
                'product_id' => 2,
            ],
            // Ajoutez d'autres campagnes ici
        ];

        for ($i = 3; $i <= 10; $i++) {
            $compagnes[] = [
                'name' => 'Campagne Générique ' . $i,
                'description' => 'Description de la campagne ' . $i,
                'type' => array_rand(['Publicité', 'Réseaux sociaux', 'Emailing']),
                'start_date' => Carbon::now()->subDays(rand(1, 30))->toDateString(),
                'end_date' => Carbon::now()->addDays(rand(15, 60))->toDateString(),
                'total_budget' => rand(5000, 100000),
                'status' => array_rand(['active', 'pending', 'completed']),
                'entreprise_id' => rand(1, 10),
                'product_id' => rand(1, 30),
            ];
        }

        DB::table('compagnes')->insert($compagnes);
    }
}
