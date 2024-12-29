<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Téléphone'],
            ['name' => 'Ordinateurs'],
            ['name' => 'Tablettes'],
            ['name' => 'Accessoires Téléphoniques'],
            ['name' => 'Écouteurs / Casques'],
            ['name' => 'Smartwatches'],
            ['name' => 'Appareils Photo'],
            ['name' => 'Caméras de Sécurité'],
            ['name' => 'Électroniques Domestiques'],
            ['name' => 'Meubles'],
            ['name' => 'Vêtements'],
            ['name' => 'Chaussures'],
            ['name' => 'Accessoires de Mode'],
            ['name' => 'Bijoux'],
            ['name' => 'Montres'],
            ['name' => 'Cosmétiques'],
            ['name' => 'Parfums'],
            ['name' => 'Produits de Soin de la Peau'],
            ['name' => 'Produits Capillaires'],
            ['name' => 'Maquillage'],
            ['name' => 'Alimentation et Boissons'],
            ['name' => 'Vins et Spiritueux'],
            ['name' => 'Produits Bio'],
            ['name' => 'Équipement de Fitness'],
            ['name' => 'Vélos et Accessoires'],
            ['name' => 'Équipements de Camping'],
            ['name' => 'Jardin et Extérieur'],
            ['name' => 'Outils et Bricolage'],
            ['name' => 'Maison et Décoration'],
            ['name' => 'Produits pour Animaux'],
            ['name' => 'Livres'],
            ['name' => 'Musique'],
            ['name' => 'Films et Séries'],
            ['name' => 'Jeux Vidéo'],
            ['name' => 'Instruments de Musique'],
            ['name' => 'Sports et Loisirs'],
            ['name' => 'Bébé et Puériculture'],
            ['name' => 'Équipement de Voyage'],
            ['name' => 'Décoration de Noël'],
            ['name' => 'Mobilier de Bureau'],
            ['name' => 'Produits d\'entretien'],
            ['name' => 'Fournitures de Bureau'],
            ['name' => 'Accessoires pour Voiture'],
            ['name' => 'Pièces Détachées pour Voiture'],
        ]);
    }
}
