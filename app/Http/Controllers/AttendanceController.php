<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {

        $query = Attendance::where('id', 1)->first();

        $startTime = $query->start_time;
        $startFormattedTime = date('H:i', strtotime($startTime));

        $batasStartTime = $query->batas_start_time;
        $batasStartFormattedTime = date('H:i', strtotime($batasStartTime));

        $endTime = $query->end_time;
        $endFormattedTime = date('H:i', strtotime($endTime));

        $batasEndTime = $query->batas_end_time;
        $batasEndFormattedTime = date('H:i', strtotime($batasEndTime));


        return view('attendances.index', [
            "title" => "Presensi",
            "data" => $query,
            "start" => $startFormattedTime,
            "batasstart" => $batasStartFormattedTime,
            "end" => $endFormattedTime,
            "batasend" => $batasEndFormattedTime
        ]);
    }

    public function create()
    {
        return view('attendances.create', [
            "title" => "Tambah Jadwal"
        ]);
    }

    public function edit()
    {
        return view('attendances.edit', [
            "title" => "Edit Presensi",
            "attendance" => Attendance::findOrFail(request('id'))
        ]);
    }
}
