<?php

namespace Database\Seeders;

use App\Models\Partof;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartofSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Partof::factory(1)->createMany([
            [
                "name" => "Sekretariat",
            ],
            [
                "name" => "Bidang Pemasaran Pariwisata & Kelembagaan Pariwisata",
            ],
            [
                "name" => "Bidang Kebudayaan",
            ],
            [
                "name" => "Bidang Destinasi & Industri Pariwisata",
            ],
        ]);
    }
}
