<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::factory(1)->createMany([
            [
                "name" => "Kepala",
                "partof_id" => 1
            ],
            [
                "name" => "Sub Bagian Kepegawaian dan Umum",
                "partof_id" => 1
            ],
            [
                "name" => "Sub Bagian Keuangan",
                "partof_id" => 1
            ],
            [
                "name" => "Sub Bagian Perencanaan, Evaluasi, dan Pelaporan",
                "partof_id" => 1
            ],
            [
                "name" => "Kepala",
                "partof_id" => 2
            ],
            [
                "name" => "Seksi Kelembagaan Kepariwisataan",
                "partof_id" => 2
            ],
            [
                "name" => "Seksi Pemasaran Pariwisata",
                "partof_id" => 2
            ],
            [
                "name" => "Kepala",
                "partof_id" => 3
            ],
            [
                "name" => "Seksi Kesenian",
                "partof_id" => 3
            ],
            [
                "name" => "Seksi Pelestarian Cagar Budaya, Sejarah, dan Permuseuman",
                "partof_id" => 3
            ],
            [
                "name" => "Seksi Warisan Cagar Budaya",
                "partof_id" => 3
            ],
            [
                "name" => "Kepala",
                "partof_id" => 4
            ],
            [
                "name" => "Seksi Destinasi Wisata",
                "partof_id" => 4
            ],
            [
                "name" => "Seksi Industri Pariwisata",
                "partof_id" => 4
            ],
        ]);
    }
}
