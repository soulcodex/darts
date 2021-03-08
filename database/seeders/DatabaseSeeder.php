<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nightclubs')->insert([
            [
                'name' => 'Calipso',
                'price' => 11,
                'address' => 'Fuenlabrada',
                'coordinates' => json_encode([
                    "longitude" => -3.785486,
                    "latitude" => 40.283031
                ]),
                'parking' => false,
                'details' => 'No tiene parking, está al lado de la sala Moon.',
                'cover' => 'http://lorempixel.es/image/1234'
            ],
            [
                'name' => 'Azucar',
                'price' => 20,
                'address' => 'Alcorcon',
                'coordinates' => json_encode([
                    "longitude" => 40.283031,
                    "latitude" => -3.785486
                ]),
                'parking' => false,
                'details' => 'No tiene parking, está al lado de la sala Moon.',
                'cover' => 'http://lorempixel.es/image/1234'
            ]
        ]);
    }
}
