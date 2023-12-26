<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Presence;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TodayUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Presence::factory(1)->createMany([
            [
                "user_id" => 1,
                "attendance_id" => 1,
                "presence_date" => Carbon::parse('2023-12-19'),
                "presence_enter_time" => Carbon::parse('08:10:00')->format('H:i:s'),
                "presence_out_time" => Carbon::parse('16:30:00'),
                "is_permission" => 0,
                "status" => "Tepat Waktu",
                "working_hours" => Carbon::parse('08:20:00')
            ],
            [
                "user_id" => 2,
                "attendance_id" => 1,
                "presence_date" => Carbon::parse('2023-12-19'),
                "presence_enter_time" => Carbon::parse('08:10:00')->format('H:i:s'),
                "presence_out_time" => Carbon::parse('16:30:00'),
                "is_permission" => 0,
                "status" => "Tepat Waktu",
                "working_hours" => Carbon::parse('08:20:00')
            ],
            [
                "user_id" => 3,
                "attendance_id" => 1,
                "presence_date" => Carbon::parse('2023-12-19'),
                "presence_enter_time" => Carbon::parse('08:10:00')->format('H:i:s'),
                "presence_out_time" => Carbon::parse('16:30:00'),
                "is_permission" => 0,
                "status" => "Tepat Waktu",
                "working_hours" => Carbon::parse('08:20:00')
            ],
            [
                "user_id" => 4,
                "attendance_id" => 1,
                "presence_date" => Carbon::parse('2023-12-19'),
                "presence_enter_time" => Carbon::parse('08:10:00')->format('H:i:s'),
                "presence_out_time" => Carbon::parse('16:30:00'),
                "is_permission" => 0,
                "status" => "Tepat Waktu",
                "working_hours" => Carbon::parse('08:20:00')
            ],
            [
                "user_id" => 5,
                "attendance_id" => 1,
                "presence_date" => Carbon::parse('2023-12-19'),
                "presence_enter_time" => Carbon::parse('08:10:00')->format('H:i:s'),
                "presence_out_time" => Carbon::parse('16:30:00'),
                "is_permission" => 0,
                "status" => "Tepat Waktu",
                "working_hours" => Carbon::parse('08:20:00')
            ],
            [
                "user_id" => 6,
                "attendance_id" => 1,
                "presence_date" => Carbon::parse('2023-12-19'),
                "presence_enter_time" => Carbon::parse('08:10:00')->format('H:i:s'),
                "presence_out_time" => Carbon::parse('16:30:00'),
                "is_permission" => 0,
                "status" => "Tepat Waktu",
                "working_hours" => Carbon::parse('08:20:00')
            ],
            [
                "user_id" => 7,
                "attendance_id" => 1,
                "presence_date" => Carbon::parse('2023-12-19'),
                "presence_enter_time" => Carbon::parse('08:10:00')->format('H:i:s'),
                "presence_out_time" => Carbon::parse('16:30:00'),
                "is_permission" => 0,
                "status" => "Tepat Waktu",
                "working_hours" => Carbon::parse('08:20:00')
            ],
            [
                "user_id" => 8,
                "attendance_id" => 1,
                "presence_date" => Carbon::parse('2023-12-19'),
                "presence_enter_time" => Carbon::parse('08:10:00')->format('H:i:s'),
                "presence_out_time" => Carbon::parse('16:30:00'),
                "is_permission" => 0,
                "status" => "Tepat Waktu",
                "working_hours" => Carbon::parse('08:20:00')
            ],
            [
                "user_id" => 9,
                "attendance_id" => 1,
                "presence_date" => Carbon::parse('2023-12-19'),
                "presence_enter_time" => Carbon::parse('08:10:00')->format('H:i:s'),
                "presence_out_time" => Carbon::parse('16:30:00'),
                "is_permission" => 0,
                "status" => "Tepat Waktu",
                "working_hours" => Carbon::parse('08:20:00')
            ],
            [
                "user_id" => 10,
                "attendance_id" => 1,
                "presence_date" => Carbon::parse('2023-12-19'),
                "presence_enter_time" => Carbon::parse('08:10:00')->format('H:i:s'),
                "presence_out_time" => Carbon::parse('16:30:00'),
                "is_permission" => 0,
                "status" => "Tepat Waktu",
                "working_hours" => Carbon::parse('08:20:00')
            ],
            [
                "user_id" => 11,
                "attendance_id" => 1,
                "presence_date" => Carbon::parse('2023-12-19'),
                "presence_enter_time" => Carbon::parse('08:10:00')->format('H:i:s'),
                "presence_out_time" => Carbon::parse('08:10:00'),
                "is_permission" => 1,
                "status" => "Izin",
            ],
            [
                "user_id" => 12,
                "attendance_id" => 1,
                "presence_date" => Carbon::parse('2023-12-19'),
                "presence_enter_time" => Carbon::parse('08:10:00')->format('H:i:s'),
                "presence_out_time" => Carbon::parse('08:10:00'),
                "is_permission" => 1,
                "status" => "Izin",
            ]
        ]);
    }
}
