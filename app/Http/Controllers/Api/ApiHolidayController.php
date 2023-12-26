<?php

namespace App\Http\Controllers\Api;


use App\Models\User;
use App\Models\Role;
use App\Models\Holiday;
use Illuminate\Http\Request;
use App\Models\Attendance;
use GuzzleHttp\Client;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\LoginRequests\LoginRequest;
use DB;


class ApiHolidayController
{
  private $response = [
    'message' => null,
    'data' => null
  ];

  public static function getHoliday(Request $request)
  {
    $data = Holiday::get();

    //dd($attendance);

    $response['message'] = 'Berhasil';
    $response['data'] = $data;

    return response()->json($response, 200);
  }

  protected static function isWeekendToday()
  {
    $dayOfWeek = date('w');
    return ($dayOfWeek == 0 || $dayOfWeek == 6); // 6 = Saturday & 0 = Sunday
  }



  public function getHolidayToday(Request $request)
  {
    $today = now()->toDateString();
    $data = Holiday::where('holiday_date', $today)->get();

    $attendance = Attendance::findOrFail(1);

    //libur nasional
    $getLiburApi = $attendance->data->holiday;

    if ($data->count() > 0) {
      $response['message'] = 'Berhasil';
      $response['data'] = $data;
    } elseif (!empty($getLiburApi)) {
      // Create a new Holiday instance for API data
      $isHolidayToday = \Illuminate\Database\Eloquent\Collection::make([
        new \App\Models\Holiday([
          'id' => 1,
          'title' => $getLiburApi->title,
          'description' => $getLiburApi->description,
          'holiday_date' => now()->toDateString(),
          'created_at' => now()->toDateTimeString(),
          'updated_at' => now()->toDateTimeString(),
        ]),
      ]);

      $response['message'] = 'Berhasil';
      $response['data'] = $isHolidayToday;
    } elseif (self::isWeekendToday()) {
      $isHolidayToday = \Illuminate\Database\Eloquent\Collection::make([
        new \App\Models\Holiday([
          'id' => 1,
          'title' => 'Libur Akhir Pekan',
          'description' => 'Hari Libur Sabtu & Minggu',
          'holiday_date' => now()->toDateString(),
          'created_at' => now()->toDateTimeString(),
          'updated_at' => now()->toDateTimeString(),
        ]),
      ]);
      $response['message'] = 'Berhasil';
      $response['data'] = $isHolidayToday;
    } else {
      $response['message'] = 'Berhasil';
      $response['data'] = [];
    }

    return response()->json($response, 200);
  }
}
