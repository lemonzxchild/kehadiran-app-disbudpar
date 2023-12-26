<?php

namespace Database\Seeders;

use App\Models\Attendance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attendance::factory()->create([
            'title' => 'this is the title',
            'description' => 'Pegawai mengisi presensi sesuai jam yang telah ditentukan. Mohon untuk memperhatikan range waktu masuk dan keluar',
            'start_time' => '07:30',
            'batas_start_time' => '08:00',
            'end_time' => '16:00',
            'batas_end_time' => '16:30'
        ]);
    }
}
