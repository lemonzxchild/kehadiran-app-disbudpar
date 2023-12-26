<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::factory(1)->createMany([
            [
                "title" => "Kampus 1 UTY",
                "description" => "Gedung Kampus 1 UTY Jombor",
                "latitude" => -7.7476005049205385,
                "longitude" => 110.35541289727982,
                "distance" => 200
            ],
            [
                "title" => "Kontrakan",
                "description" => "Kost",
                "latitude" => -7.755796018687495,
                "longitude" => 110.35712084785428,
                "distance" => 200
            ]
        ]);
    }
}
