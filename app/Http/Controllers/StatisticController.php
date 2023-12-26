<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use GuzzleHttp\Client;
use App\Models\Holiday;
use App\Models\Presence;
use App\Models\Attendance;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function index()
    {
        $attendances = Attendance::all()->sortByDesc('data.is_end')->sortByDesc('data.is_start');

        return view('statistics.index', [
            "title" => "Rekap Presensi Bulanan",
            "attendances" => $attendances
        ]);
    }

    public function show(Attendance $attendance)
    {
        // Mendapatkan tanggal untuk ditampilkan
        $byDate = request('display-by-date');

        if (!empty($byDate) && strpos($byDate, '-') !== false) {
            // Explode the date string
            list($year, $month) = explode('-', $byDate);
            // Now you can use $year and $month
        } else {
            // Handle the case where $byDate doesn't contain a hyphen or is empty
            $year = date('Y');
            $month = date('m');
        }

        // $attendance = Attendance::findOrFail(1);

        // //libur nasional
        // $getLiburApi = $attendance->data->holiday;

        $url = 'https://api-harilibur.vercel.app/api?month=' . $month . '&year=' . $year;
        // $client = new Client();
        $client = new Client([
            'verify' => false,
        ]);
        // Using Guzzle to make a single HTTP request
        $response = $client->get($url);
        $dataLiburNasional = json_decode($response->getBody(), true);

        $getLiburApi = [];

        foreach ($dataLiburNasional as $liburNasional) {
            if ($liburNasional['is_national_holiday']) {
                $getLiburApi[] = $liburNasional;
                break;
            }
        }

        $countLiburApi  = count($getLiburApi);

        //hitung hari dalam bulan
        $tanggal = Carbon::create($year, $month, 1);
        $jumlahHari = $tanggal->daysInMonth;

        //hitung jumlah libur di tabel libur
        $totalRows = DB::table('holidays')
            ->select(DB::raw('COUNT(*) as total_rows'))
            ->whereMonth('holiday_date', '=', $month)
            ->whereYear('holiday_date', '=', $year)
            ->first();

        //libur pada tabel + libur nasional dari api    
        $countHolidays = $totalRows->total_rows + $countLiburApi;
        // dd($countLiburApi);

        $attendance_id = $attendance->id;


        $result = User::leftJoin('presences', function ($join) use ($attendance_id, $month, $year) {
            $join->on('users.id', '=', 'presences.user_id')
                ->where('presences.attendance_id', '=', $attendance_id)
                ->whereMonth('presences.presence_date', '=', $month)
                ->whereYear('presences.presence_date', '=', $year);
        })
            ->select(
                'users.id as id',
                'users.name as name',
                'users.email as email',
                'users.phone as phone',
                'users.position_id as position',
                //jumlah hadir - izin
                DB::raw('COALESCE(COUNT(presences.user_id), 0) - SUM(CASE WHEN presences.is_permission = 1 THEN 1 ELSE 0 END) AS jumlah_hadir'),
                //jumlah izin
                DB::raw('SUM(CASE WHEN presences.is_permission = 1 THEN 1 ELSE 0 END) AS jumlah_izin'),
                // jumlah hari dalam bulan - (izin + hadir + jumlah libur + jumlah hari sabtu minggu)
                DB::raw("{$jumlahHari} - (COALESCE(COUNT(presences.user_id), 0) - SUM(CASE WHEN presences.is_permission = 1 THEN 1 ELSE 0 END) + SUM(CASE WHEN presences.is_permission = 1 THEN 1 ELSE 0 END) + {$countHolidays} +
                (SELECT COUNT(*) AS jumlah_hari_weekend
                FROM (
                    SELECT 
                        DATE_FORMAT(STR_TO_DATE(CONCAT('01-', '{$month}', '-', '{$year}'), '%d-%m-%Y') + INTERVAL (n - 1) DAY, '%Y-%m-%d') AS date
                    FROM (
                        SELECT 
                            a.N + b.N * 10 + c.N * 100 AS n
                        FROM (
                            SELECT 0 AS N UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL 
                            SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9
                        ) a
                        CROSS JOIN (
                            SELECT 0 AS N UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL 
                            SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9
                        ) b
                        CROSS JOIN (
                            SELECT 0 AS N UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL 
                            SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9
                        ) c
                    ) numbers
                    WHERE MONTH(DATE_FORMAT(STR_TO_DATE(CONCAT('01-', '{$month}', '-', '{$year}'), '%d-%m-%Y') + INTERVAL (n - 1) DAY, '%Y-%m-%d')) = '{$month}'
                    AND YEAR(DATE_FORMAT(STR_TO_DATE(CONCAT('01-', '{$month}', '-', '{$year}'), '%d-%m-%Y') + INTERVAL (n - 1) DAY, '%Y-%m-%d')) = '{$year}'
                ) AS date_table
                WHERE DAYOFWEEK(date) IN (1, 7)
            )) AS jumlah_tidak_hadir"),
                //Jam kerja / kehadiran
                // DB::raw('TIME_FORMAT(SUM(presences.working_hours) / (COALESCE(COUNT(presences.user_id), 0) - SUM(CASE WHEN presences.is_permission = 1 THEN 1 ELSE 0 END)), "%H:%i") AS total_working_hours_hadir'),
                DB::raw('SUBSTRING(SEC_TO_TIME(SUM(TIME_TO_SEC(presences.working_hours)) / 
        (COALESCE(COUNT(presences.user_id), 0) - 
        SUM(CASE WHEN presences.is_permission = 1 THEN 1 ELSE 0 END))), 1, 5) AS total_working_hours_hadir'),
                //Total jam kerja
                // DB::raw('TIME_FORMAT(SUM(presences.working_hours), "%H:%i") AS total_working_hours'),
                DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(presences.working_hours))) AS total_working_hours'),
                // Jumlah Tepat Waktu
                DB::raw('SUM(CASE WHEN presences.status = "Tepat Waktu" THEN 1 ELSE 0 END) AS jumlah_tepat_waktu'),
                // Jumlah Terlambat
                DB::raw('SUM(CASE WHEN presences.status = "Terlambat" THEN 1 ELSE 0 END) AS jumlah_terlambat'),
                // Jumlah Overtime
                DB::raw('SUM(CASE WHEN presences.status = "Overtime" THEN 1 ELSE 0 END) AS jumlah_overtime'),
            )
            ->groupBy('id', 'name', 'email', 'phone', 'position_id')
            ->get();



        return view('statistics.show', [
            "title" => "Rekap Presensi Bulanan",
            "attendance" => $attendance,
            "date" => $byDate,
            "year" => $year,
            "statistics" => $result
        ]);
        // return ($result);
    }
}
