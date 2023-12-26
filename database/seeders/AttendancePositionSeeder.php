<?php

namespace Database\Seeders;

use App\Models\AttendancePosition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendancePositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AttendancePosition::factory()->createMany([
            [
                "attendance_id" => 1,
                "position_id" => 1
            ],
            [
                "attendance_id" => 1,
                "position_id" => 2
            ],
            [
                "attendance_id" => 1,
                "position_id" => 3
            ],
            [
                "attendance_id" => 1,
                "position_id" => 4
            ],
            [
                "attendance_id" => 1,
                "position_id" => 5
            ],
            [
                "attendance_id" => 1,
                "position_id" => 6
            ],
            [
                "attendance_id" => 1,
                "position_id" => 7
            ],
            [
                "attendance_id" => 1,
                "position_id" => 8
            ],
            [
                "attendance_id" => 1,
                "position_id" => 9
            ],
            [
                "attendance_id" => 1,
                "position_id" => 10
            ],
            [
                "attendance_id" => 1,
                "position_id" => 11
            ],
            [
                "attendance_id" => 1,
                "position_id" => 12
            ],
            [
                "attendance_id" => 1,
                "position_id" => 13
            ],
            [
                "attendance_id" => 1,
                "position_id" => 14
            ]
        ]);
    }
}
