<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Presence;
use App\Models\User;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        $date = new DateTime();
        $x = $date->format('Y-m-d');

        //pegawai tidak hadir hari ini
        $byDate = now()->toDateString();

        $presences = Presence::query()
            ->where('attendance_id', 1)
            ->where('presence_date', $byDate)
            ->get(['presence_date', 'user_id']);

        $presencesPermission = Presence::query()
            ->where('attendance_id', 1)
            ->where('presence_date', $byDate)
            ->where('is_permission', 1)
            ->get(['presence_date', 'user_id']);

        // jika semua pegawai tidak hadir
        if ($presences->isEmpty()) {
            $notPresentData =
                User::query()
                ->with('position')
                ->get()
                ->toArray();

            $countNotPresent = count($notPresentData);
            $countPresent = 0;
            $countPermission = 0;
        } else {

            $uniquePresenceDates = $presences->unique("presence_date")->pluck('presence_date');
            $uniquePresenceDatesAndCompactTheUserIds = $uniquePresenceDates->map(function ($date) use ($presences) {
                return [
                    "presence_date" => $date,
                    "user_ids" => $presences->where('presence_date', $date)->pluck('user_id')->toArray()
                ];
            });

            $notPresentData = [];
            foreach ($uniquePresenceDatesAndCompactTheUserIds as $presence) {
                $notPresentData =
                    User::query()
                    ->with('position')
                    ->whereNotIn('id', $presence['user_ids'])
                    ->get()
                    ->toArray();
            }

            $presentData = User::query()
                ->with('position')
                ->get()
                ->toArray();

            //hitung tidak hadir    
            $countNotPresent = count($notPresentData);
            $countingPresent = count($presentData);
            $countPermission = count($presencesPermission);
            //hitung hadir
            $countPresent = $countingPresent - ($countNotPresent + $countPermission);
        }

        return view('dashboard.index', [
            "title" => "Dashboard Presensi",
            "positionCount" => Position::count(),
            "userCount" => User::count(),
            "present" => $countPresent,
            "notPresent" => $countNotPresent,
            "permission" => $countPermission



        ]);
    }
}
