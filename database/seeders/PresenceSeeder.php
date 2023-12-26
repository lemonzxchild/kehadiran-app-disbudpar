<?php

namespace Database\Seeders;

use App\Models\Presence;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PresenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //user 1
        // Presence::factory(1)->createMany([
        //     [
        //         "user_id" => 1,
        //         "attendance_id" => 1,
        //         "presence_date" => Carbon::parse('2023-12-1'),
        //         "presence_enter_time" => Carbon::parse('07:35:00')->format('H:i:s'),
        //         "presence_out_time" => Carbon::parse('16:30:00'),
        //         "is_permission" => 0,
        //         "status" => "Tepat Waktu",
        //         "working_hours" => Carbon::parse('08:55:00')
        //     ],
        //     [
        //         "user_id" => 1,
        //         "attendance_id" => 1,
        //         "presence_date" => Carbon::parse('2023-12-2'),
        //         "presence_enter_time" => Carbon::parse('07:35:00')->format('H:i:s'),
        //         "presence_out_time" => Carbon::parse('16:30:00'),
        //         "is_permission" => 0,
        //         "status" => "Tepat Waktu",
        //         "working_hours" => Carbon::parse('08:55:00')
        //     ],
        //     [
        //         "user_id" => 1,
        //         "attendance_id" => 1,
        //         "presence_date" => Carbon::parse('2023-12-3'),
        //         "presence_enter_time" => Carbon::parse('07:35:00')->format('H:i:s'),
        //         "presence_out_time" => Carbon::parse('16:30:00'),
        //         "is_permission" => 0,
        //         "status" => "Tepat Waktu",
        //         "working_hours" => Carbon::parse('08:55:00')
        //     ],
        //     [
        //         "user_id" => 1,
        //         "attendance_id" => 1,
        //         "presence_date" => Carbon::parse('2023-12-4'),
        //         "presence_enter_time" => Carbon::parse('07:35:00')->format('H:i:s'),
        //         "presence_out_time" => Carbon::parse('16:30:00'),
        //         "is_permission" => 0,
        //         "status" => "Tepat Waktu",
        //         "working_hours" => Carbon::parse('08:55:00')
        //     ],
        //     [
        //         "user_id" => 1,
        //         "attendance_id" => 1,
        //         "presence_date" => Carbon::parse('2023-12-5'),
        //         "presence_enter_time" => Carbon::parse('07:35:00')->format('H:i:s'),
        //         "presence_out_time" => Carbon::parse('16:30:00'),
        //         "is_permission" => 0,
        //         "status" => "Tepat Waktu",
        //         "working_hours" => Carbon::parse('08:55:00')
        //     ],
        //     [
        //         "user_id" => 1,
        //         "attendance_id" => 1,
        //         "presence_date" => Carbon::parse('2023-12-6'),
        //         "presence_enter_time" => Carbon::parse('07:35:00')->format('H:i:s'),
        //         "presence_out_time" => Carbon::parse('16:30:00'),
        //         "is_permission" => 0,
        //         "status" => "Tepat Waktu",
        //         "working_hours" => Carbon::parse('08:55:00')
        //     ],
        //     // [
        //     //     "user_id" => 1,
        //     //     "attendance_id" => 1,
        //     //     "presence_date" => Carbon::parse('2023-12-7'),
        //     //     "presence_enter_time" => Carbon::parse('07:36:00')->format('H:i:s'),
        //     //     "presence_out_time" => Carbon::parse('16:30:00'),
        //     //     "is_permission" => 0,
        //     //     "status" => "Tepat Waktu",
        //     //     "working_hours" => Carbon::parse('08:54:00')
        //     // ],
        //     [
        //         "user_id" => 1,
        //         "attendance_id" => 1,
        //         "presence_date" => Carbon::parse('2023-12-8'),
        //         "presence_enter_time" => Carbon::parse('07:35:00')->format('H:i:s'),
        //         "presence_out_time" => Carbon::parse('07:35:00'),
        //         "is_permission" => 1,
        //         "status" => "Tepat Waktu",
        //     ],
        // ]);

        // //user 2
        // Presence::factory(1)->createMany([
        //     [
        //         "user_id" => 2,
        //         "attendance_id" => 1,
        //         "presence_date" => Carbon::parse('2023-12-1'),
        //         "presence_enter_time" => Carbon::parse('07:37:00')->format('H:i:s'),
        //         "presence_out_time" => Carbon::parse('16:14:00'),
        //         "is_permission" => 0,
        //         "status" => "Tepat Waktu",
        //         "working_hours" => Carbon::parse('08:37:00')
        //     ],
        //     [
        //         "user_id" => 2,
        //         "attendance_id" => 1,
        //         "presence_date" => Carbon::parse('2023-12-2'),
        //         "presence_enter_time" => Carbon::parse('07:35:00')->format('H:i:s'),
        //         "presence_out_time" => Carbon::parse('16:30:00'),
        //         "is_permission" => 0,
        //         "status" => "Tepat Waktu",
        //         "working_hours" => Carbon::parse('08:55:00')
        //     ],
        //     [
        //         "user_id" => 2,
        //         "attendance_id" => 1,
        //         "presence_date" => Carbon::parse('2023-12-3'),
        //         "presence_enter_time" => Carbon::parse('07:35:00')->format('H:i:s'),
        //         "presence_out_time" => Carbon::parse('16:30:00'),
        //         "is_permission" => 0,
        //         "status" => "Tepat Waktu",
        //         "working_hours" => Carbon::parse('08:55:00')
        //     ],
        //     [
        //         "user_id" => 2,
        //         "attendance_id" => 1,
        //         "presence_date" => Carbon::parse('2023-12-4'),
        //         "presence_enter_time" => Carbon::parse('07:35:00')->format('H:i:s'),
        //         "presence_out_time" => Carbon::parse('16:30:00'),
        //         "is_permission" => 0,
        //         "status" => "Tepat Waktu",
        //         "working_hours" => Carbon::parse('08:55:00')
        //     ],
        //     [
        //         "user_id" => 2,
        //         "attendance_id" => 1,
        //         "presence_date" => Carbon::parse('2023-12-5'),
        //         "presence_enter_time" => Carbon::parse('07:35:00')->format('H:i:s'),
        //         "presence_out_time" => Carbon::parse('16:30:00'),
        //         "is_permission" => 0,
        //         "status" => "Tepat Waktu",
        //         "working_hours" => Carbon::parse('08:55:00')
        //     ],
        //     [
        //         "user_id" => 2,
        //         "attendance_id" => 1,
        //         "presence_date" => Carbon::parse('2023-12-6'),
        //         "presence_enter_time" => Carbon::parse('07:35:00')->format('H:i:s'),
        //         "presence_out_time" => Carbon::parse('16:30:00'),
        //         "is_permission" => 0,
        //         "status" => "Tepat Waktu",
        //         "working_hours" => Carbon::parse('08:55:00')
        //     ],
        //     [
        //         "user_id" => 2,
        //         "attendance_id" => 1,
        //         "presence_date" => Carbon::parse('2023-12-7'),
        //         "presence_enter_time" => Carbon::parse('07:35:00')->format('H:i:s'),
        //         "presence_out_time" => Carbon::parse('16:30:00'),
        //         "is_permission" => 0,
        //         "status" => "Tepat Waktu",
        //         "working_hours" => Carbon::parse('08:55:00')
        //     ],
        //     [
        //         "user_id" => 2,
        //         "attendance_id" => 1,
        //         "presence_date" => Carbon::parse('2023-12-8'),
        //         "presence_enter_time" => Carbon::parse('07:40:00')->format('H:i:s'),
        //         "is_permission" => 0,
        //         "status" => "Tepat Waktu",
        //     ],
        // ]);

        // //user 3
        // Presence::factory(1)->createMany([
        //     [
        //         "user_id" => 3,
        //         "attendance_id" => 1,
        //         "presence_date" => Carbon::parse('2023-12-1'),
        //         "presence_enter_time" => Carbon::parse('07:45:00')->format('H:i:s'),
        //         "presence_out_time" => Carbon::parse('16:10:00'),
        //         "is_permission" => 0,
        //         "status" => "Tepat Waktu",
        //         "working_hours" => Carbon::parse('08:25:00')
        //     ],
        //     [
        //         "user_id" => 3,
        //         "attendance_id" => 1,
        //         "presence_date" => Carbon::parse('2023-12-2'),
        //         "presence_enter_time" => Carbon::parse('07:35:00')->format('H:i:s'),
        //         "presence_out_time" => Carbon::parse('16:30:00'),
        //         "is_permission" => 0,
        //         "status" => "Tepat Waktu",
        //         "working_hours" => Carbon::parse('08:55:00')
        //     ],
        //     [
        //         "user_id" => 3,
        //         "attendance_id" => 1,
        //         "presence_date" => Carbon::parse('2023-12-3'),
        //         "presence_enter_time" => Carbon::parse('07:35:00')->format('H:i:s'),
        //         "presence_out_time" => Carbon::parse('16:30:00'),
        //         "is_permission" => 0,
        //         "status" => "Tepat Waktu",
        //         "working_hours" => Carbon::parse('08:55:00')
        //     ],
        //     [
        //         "user_id" => 3,
        //         "attendance_id" => 1,
        //         "presence_date" => Carbon::parse('2023-12-4'),
        //         "presence_enter_time" => Carbon::parse('07:35:00')->format('H:i:s'),
        //         "presence_out_time" => Carbon::parse('16:30:00'),
        //         "is_permission" => 0,
        //         "status" => "Tepat Waktu",
        //         "working_hours" => Carbon::parse('08:55:00')
        //     ],
        //     [
        //         "user_id" => 3,
        //         "attendance_id" => 1,
        //         "presence_date" => Carbon::parse('2023-12-5'),
        //         "presence_enter_time" => Carbon::parse('07:35:00')->format('H:i:s'),
        //         "presence_out_time" => Carbon::parse('16:30:00'),
        //         "is_permission" => 0,
        //         "status" => "Tepat Waktu",
        //         "working_hours" => Carbon::parse('08:55:00')
        //     ],
        //     [
        //         "user_id" => 3,
        //         "attendance_id" => 1,
        //         "presence_date" => Carbon::parse('2023-12-6'),
        //         "presence_enter_time" => Carbon::parse('08:35:00')->format('H:i:s'),
        //         "presence_out_time" => Carbon::parse('16:30:00'),
        //         "is_permission" => 0,
        //         "status" => "Terlambat",
        //         "working_hours" => Carbon::parse('07:00:00')
        //     ],
        //     [
        //         "user_id" => 3,
        //         "attendance_id" => 1,
        //         "presence_date" => Carbon::parse('2023-12-7'),
        //         "presence_enter_time" => Carbon::parse('07:35:00')->format('H:i:s'),
        //         "presence_out_time" => Carbon::parse('16:30:00'),
        //         "is_permission" => 0,
        //         "status" => "Tepat Waktu",
        //         "working_hours" => Carbon::parse('08:55:00')
        //     ],
        //     [
        //         "user_id" => 3,
        //         "attendance_id" => 1,
        //         "presence_date" => Carbon::parse('2023-12-8'),
        //         "presence_enter_time" => Carbon::parse('07:35:00')->format('H:i:s'),
        //         "is_permission" => 0,
        //         "status" => "Tepat Waktu",
        //     ],
        // ]);
        // //user 4
        // Presence::factory(1)->createMany([
        //     [
        //         "user_id" => 4,
        //         "attendance_id" => 1,
        //         "presence_date" => Carbon::parse('2023-12-1'),
        //         "presence_enter_time" => Carbon::parse('07:37:00')->format('H:i:s'),
        //         "presence_out_time" => Carbon::parse('16:14:00'),
        //         "is_permission" => 0,
        //         "status" => "Tepat Waktu",
        //         "working_hours" => Carbon::parse('08:37:00')
        //     ],
        //     [
        //         "user_id" => 4,
        //         "attendance_id" => 1,
        //         "presence_date" => Carbon::parse('2023-12-2'),
        //         "presence_enter_time" => Carbon::parse('07:35:00')->format('H:i:s'),
        //         "presence_out_time" => Carbon::parse('16:30:00'),
        //         "is_permission" => 0,
        //         "status" => "Tepat Waktu",
        //         "working_hours" => Carbon::parse('08:55:00')
        //     ],
        //     [
        //         "user_id" => 4,
        //         "attendance_id" => 1,
        //         "presence_date" => Carbon::parse('2023-12-3'),
        //         "presence_enter_time" => Carbon::parse('07:35:00')->format('H:i:s'),
        //         "presence_out_time" => Carbon::parse('16:30:00'),
        //         "is_permission" => 0,
        //         "status" => "Tepat Waktu",
        //         "working_hours" => Carbon::parse('08:55:00')
        //     ],
        //     [
        //         "user_id" => 4,
        //         "attendance_id" => 1,
        //         "presence_date" => Carbon::parse('2023-12-4'),
        //         "presence_enter_time" => Carbon::parse('07:35:00')->format('H:i:s'),
        //         "presence_out_time" => Carbon::parse('16:30:00'),
        //         "is_permission" => 0,
        //         "status" => "Tepat Waktu",
        //         "working_hours" => Carbon::parse('08:55:00')
        //     ],
        //     [
        //         "user_id" => 4,
        //         "attendance_id" => 1,
        //         "presence_date" => Carbon::parse('2023-12-5'),
        //         "presence_enter_time" => Carbon::parse('07:35:00')->format('H:i:s'),
        //         "presence_out_time" => Carbon::parse('16:30:00'),
        //         "is_permission" => 0,
        //         "status" => "Tepat Waktu",
        //         "working_hours" => Carbon::parse('08:55:00')
        //     ],
        //     [
        //         "user_id" => 4,
        //         "attendance_id" => 1,
        //         "presence_date" => Carbon::parse('2023-12-6'),
        //         "presence_enter_time" => Carbon::parse('07:35:00')->format('H:i:s'),
        //         "presence_out_time" => Carbon::parse('07:35:00'),
        //         "is_permission" => 1,
        //         "status" => "Tepat Waktu",
        //         "working_hours" => Carbon::parse('00:00:00')
        //     ],
        //     [
        //         "user_id" => 4,
        //         "attendance_id" => 1,
        //         "presence_date" => Carbon::parse('2023-12-7'),
        //         "presence_enter_time" => Carbon::parse('07:35:00')->format('H:i:s'),
        //         "presence_out_time" => Carbon::parse('16:30:00'),
        //         "is_permission" => 0,
        //         "status" => "Tepat Waktu",
        //         "working_hours" => Carbon::parse('08:55:00')
        //     ],
        //     [
        //         "user_id" => 4,
        //         "attendance_id" => 1,
        //         "presence_date" => Carbon::parse('2023-12-8'),
        //         "presence_enter_time" => Carbon::parse('07:35:00')->format('H:i:s'),
        //         "is_permission" => 0,
        //         "status" => "Tepat Waktu",
        //     ],
        // ]);

        // //user 5
        // Presence::factory(1)->createMany([
        //     // [
        //     //     "user_id" => 5,
        //     //     "attendance_id" => 1,
        //     //     "presence_date" => Carbon::parse('2023-12-1'),
        //     //     "presence_enter_time" => Carbon::parse('07:45:00')->format('H:i:s'),
        //     //     "presence_out_time" => Carbon::parse('16:10:00'),
        //     //     "is_permission" => 0,
        //     //     "status" => "Tepat Waktu",
        //     //     "working_hours" => Carbon::parse('08:25:00')
        //     // ],
        //     // [
        //     //     "user_id" => 5,
        //     //     "attendance_id" => 1,
        //     //     "presence_date" => Carbon::parse('2023-12-2'),
        //     //     "presence_enter_time" => Carbon::parse('07:35:00')->format('H:i:s'),
        //     //     "presence_out_time" => Carbon::parse('16:30:00'),
        //     //     "is_permission" => 0,
        //     //     "status" => "Tepat Waktu",
        //     //     "working_hours" => Carbon::parse('08:55:00')
        //     // ],
        //     [
        //         "user_id" => 5,
        //         "attendance_id" => 1,
        //         "presence_date" => Carbon::parse('2023-12-3'),
        //         "presence_enter_time" => Carbon::parse('07:35:00')->format('H:i:s'),
        //         "presence_out_time" => Carbon::parse('16:30:00'),
        //         "is_permission" => 0,
        //         "status" => "Tepat Waktu",
        //         "working_hours" => Carbon::parse('08:55:00')
        //     ],
        //     [
        //         "user_id" => 5,
        //         "attendance_id" => 1,
        //         "presence_date" => Carbon::parse('2023-12-4'),
        //         "presence_enter_time" => Carbon::parse('07:35:00')->format('H:i:s'),
        //         "presence_out_time" => Carbon::parse('16:30:00'),
        //         "is_permission" => 0,
        //         "status" => "Tepat Waktu",
        //         "working_hours" => Carbon::parse('08:55:00')
        //     ],
        //     [
        //         "user_id" => 5,
        //         "attendance_id" => 1,
        //         "presence_date" => Carbon::parse('2023-12-5'),
        //         "presence_enter_time" => Carbon::parse('07:35:00')->format('H:i:s'),
        //         "presence_out_time" => Carbon::parse('16:30:00'),
        //         "is_permission" => 0,
        //         "status" => "Tepat Waktu",
        //         "working_hours" => Carbon::parse('08:55:00')
        //     ],
        //     [
        //         "user_id" => 5,
        //         "attendance_id" => 1,
        //         "presence_date" => Carbon::parse('2023-12-6'),
        //         "presence_enter_time" => Carbon::parse('07:35:00')->format('H:i:s'),
        //         "presence_out_time" => Carbon::parse('16:30:00'),
        //         "is_permission" => 0,
        //         "status" => "Tepat Waktu",
        //         "working_hours" => Carbon::parse('08:00:00')
        //     ],
        //     [
        //         "user_id" => 5,
        //         "attendance_id" => 1,
        //         "presence_date" => Carbon::parse('2023-12-7'),
        //         "presence_enter_time" => Carbon::parse('07:35:00')->format('H:i:s'),
        //         "presence_out_time" => Carbon::parse('16:30:00'),
        //         "is_permission" => 0,
        //         "status" => "Tepat Waktu",
        //         "working_hours" => Carbon::parse('08:55:00')
        //     ]
        // ]);
    }
}
