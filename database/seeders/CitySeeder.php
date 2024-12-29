<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            ['name' => 'Kabul', 'country_id' => 1],
            ['name' => 'Tirana', 'country_id' => 2],
            ['name' => 'Algiers', 'country_id' => 3],
            ['name' => 'Andorra la Vella', 'country_id' => 4],
            ['name' => 'Luanda', 'country_id' => 5],
            ['name' => 'Buenos Aires', 'country_id' => 6],
            ['name' => 'Yerevan', 'country_id' => 7],
            ['name' => 'Sydney', 'country_id' => 8],
            ['name' => 'Vienna', 'country_id' => 9],
            ['name' => 'Baku', 'country_id' => 10],
            ['name' => 'Nassau', 'country_id' => 11],
            ['name' => 'Manama', 'country_id' => 12],
            ['name' => 'Dhaka', 'country_id' => 13],
            ['name' => 'Bridgetown', 'country_id' => 14],
            ['name' => 'Minsk', 'country_id' => 15],
            ['name' => 'Brussels', 'country_id' => 16],
            ['name' => 'Belmopan', 'country_id' => 17],
            ['name' => 'Porto-Novo', 'country_id' => 18],
            ['name' => 'Thimphu', 'country_id' => 19],
            ['name' => 'La Paz', 'country_id' => 20],
            ['name' => 'Sarajevo', 'country_id' => 21],
            ['name' => 'Gaborone', 'country_id' => 22],
            ['name' => 'Brasília', 'country_id' => 23],
            ['name' => 'Bandar Seri Begawan', 'country_id' => 24],
            ['name' => 'Sofia', 'country_id' => 25],
            ['name' => 'Ouagadougou', 'country_id' => 26],
            ['name' => 'Bujumbura', 'country_id' => 27],
            ['name' => 'Praia', 'country_id' => 28],
            ['name' => 'Phnom Penh', 'country_id' => 29],
            ['name' => 'Yaoundé', 'country_id' => 30],
            ['name' => 'New York', 'country_id' => 31],
            ['name' => 'Los Angeles', 'country_id' => 31],
            ['name' => 'Chicago', 'country_id' => 31],
            ['name' => 'Toronto', 'country_id' => 32],
            ['name' => 'Vancouver', 'country_id' => 32],
            ['name' => 'Montreal', 'country_id' => 32],
            ['name' => 'London', 'country_id' => 33],
            ['name' => 'Manchester', 'country_id' => 33],
            ['name' => 'Birmingham', 'country_id' => 33],
            ['name' => 'Paris', 'country_id' => 34],
            ['name' => 'Lyon', 'country_id' => 34],
            ['name' => 'Marseille', 'country_id' => 34],
            ['name' => 'Berlin', 'country_id' => 35],
            ['name' => 'Hamburg', 'country_id' => 35],
            ['name' => 'Munich', 'country_id' => 35],
            ['name' => 'Tokyo', 'country_id' => 36],
            ['name' => 'Osaka', 'country_id' => 36],
            ['name' => 'Kyoto', 'country_id' => 36],
            ['name' => 'Seoul', 'country_id' => 37],
            ['name' => 'Busan', 'country_id' => 37],
            ['name' => 'Incheon', 'country_id' => 37],
            ['name' => 'Cairo', 'country_id' => 38],
            ['name' => 'Alexandria', 'country_id' => 38],
            ['name' => 'Giza', 'country_id' => 38],
            ['name' => 'Moscow', 'country_id' => 39],
            ['name' => 'Saint Petersburg', 'country_id' => 39],
            ['name' => 'Novosibirsk', 'country_id' => 39],
            ['name' => 'Beijing', 'country_id' => 40],
            ['name' => 'Shanghai', 'country_id' => 40],
            ['name' => 'Guangzhou', 'country_id' => 40],
            ['name' => 'Mumbai', 'country_id' => 41],
            ['name' => 'Delhi', 'country_id' => 41],
            ['name' => 'Bangalore', 'country_id' => 41],
            ['name' => 'Mexico City', 'country_id' => 42],
            ['name' => 'Guadalajara', 'country_id' => 42],
            ['name' => 'Monterrey', 'country_id' => 42],
            ['name' => 'Buenos Aires', 'country_id' => 43],
            ['name' => 'Córdoba', 'country_id' => 43],
            ['name' => 'Rosario', 'country_id' => 43],
            ['name' => 'Lagos', 'country_id' => 44],
            ['name' => 'Abuja', 'country_id' => 44],
            ['name' => 'Kano', 'country_id' => 44],
            ['name' => 'Cape Town', 'country_id' => 45],
            ['name' => 'Johannesburg', 'country_id' => 45],
            ['name' => 'Durban', 'country_id' => 45],
        ];

        DB::table('cities')->insert($cities);
    }
}
