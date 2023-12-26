<?php

namespace App\Http\Controllers\Api;


use App\Models\User;
use App\Models\Location;
use App\Models\Attendance;
use App\Models\Presence;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\LoginRequests\LoginRequest;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ApiPresenceController
{
  private $response = [
    'message' => null,
    'data' => null
  ];

  public static function vincentyGreatCircleDistance(Request $request)
  {
    $location = Location::where('id', $request->location_id)->first();


    //$latitudeFrom = (float) -6.238872;
    //$longitudeFrom = (float) 106.992141;
    $latitudeFrom = (float) $location->latitude;
    $longitudeFrom = (float) $location->longitude;
    $latitudeTo = (float) $request->latitudeTo;
    $longitudeTo = (float) $request->longitudeTo;
    $earthRadius = 6371000;

    //var_dump($latitudeFrom);
    // convert from degrees to radians
    $latFrom = deg2rad($latitudeFrom);
    $lonFrom = deg2rad($longitudeFrom);
    $latTo = deg2rad($latitudeTo);
    $lonTo = deg2rad($longitudeTo);

    $lonDelta = $lonTo - $lonFrom;
    $a = pow(cos($latTo) * sin($lonDelta), 2) +
      pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
    $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);

    $angle = atan2(sqrt($a), $b);

    $response['message'] = 'Berhasil';
    $response['jarak'] = $angle * $earthRadius;
    if ($response['jarak'] > $location->distance) {
      $response['hasil'] = "Anda berada diluar radius presensi";
    } else {
      $response['hasil'] = "Sukses";
    }

    return response()->json($response, 200);
  }

  public static function storePresence(Request $request)
  {

    $now = Carbon::now();

    $presence = Presence::where('attendance_id', $request['attendance_id'])
      ->where('user_id', $request['id_user'])
      ->where('presence_date', $now->toDateString())
      ->first();

    $attendance = Attendance::where('id', 1)->first();

    $startTime = Carbon::createFromFormat('H:i:s', $attendance->start_time);
    $batasStartTime = Carbon::createFromFormat('H:i:s', $attendance->batas_start_time);
    $endTime = Carbon::createFromFormat('H:i:s', $attendance->end_time);
    $batasEndTime = Carbon::createFromFormat('H:i:s', $attendance->batas_end_time);



    if ($presence) {
      $totalWorkingHours = $now->diffInSeconds($presence->presence_enter_time);

      if ($presence->status = 'Tepat Waktu') {
        if ($now->gt($endTime) && $now->lt($batasEndTime)) {
          $statusKeluar = "Tepat Waktu";
        }
        //jika sebelum range 
        elseif ($now->lt($endTime)) {
          $statusKeluar = "Tepat Waktu";
        }
        //setelah range
        elseif ($now->gt($batasEndTime)) {
          $statusKeluar = "Overtime";
        } else {
          $statusKeluar = "Tepat Waktu";
        }
      } elseif ($presence->status = 'Terlambat') {
        if ($now->gt($endTime) && $now->lt($batasEndTime)) {
          $statusKeluar = "Terlambat";
        }
        //jika sebelum range 
        elseif ($now->lt($endTime)) {
          $statusKeluar = "Terlambat";
        }
        //setelah range
        elseif ($now->gt($batasEndTime)) {
          $statusKeluar = "Terlambat";
        } else {
          $statusKeluar = "Terlambat";
        }
      }

      DB::table('presences')
        ->where('id', $presence->id)
        ->update(array(
          'presence_out_time'     => $now,
          'working_hours' => gmdate('H:i:s', $totalWorkingHours),
          'status' => $statusKeluar
        ));
    } else {


      //tentukan tepat waktu / lembur / overtime
      //note:
      //lt = before, gt = after

      // //jika masuk pada range waktu yang ditentukan
      if ($now->gt($startTime) && $now->lt($batasStartTime)) {
        $statusMasuk = "Tepat Waktu";
      }
      //jika sebelum range 
      elseif ($now->lt($startTime)) {
        $statusMasuk = "Tepat Waktu";
      }
      //setelah range
      elseif ($now->gt($batasStartTime)) {
        $statusMasuk = "Terlambat";
      } else {
        $statusMasuk = "Tepat Waktu";
      }

      $data = DB::table('presences')->insert(array(
        'user_id'           => $request['id_user'],
        'attendance_id'     => $request['attendance_id'],
        'presence_date'     => $now,
        'presence_enter_time' => $now->format('H:i:s'),
        'status' => $statusMasuk
      ));
    }



    $response['message'] = "Berhasil";

    return response()->json($response, 200);
  }

  public static function updatePresence(Request $request)
  {

    $now = Carbon::now();

    DB::table('presences')
      ->where('id', $request['id'])
      ->update(array(
        'attendance_id'     => $request['attendance_id'],
        'presence_date'     => $now
      ));

    $response['hasil'] = "Sukses ";

    return response()->json($response, 200);
  }

  public static function regisface(Request $request)
  {


    User::where('id', $request['user'])->update(['facedata' => $request['faceData']]);

    $response['hasil'] = "Sukses ";

    return response()->json($response, 200);
  }

  // public static function getPresenceNow(Request $request)
  // {

  //   $now = Carbon::now();

  //   $data = DB::table('presences')->where('presence_date', $now->toDateString())
  //     ->where('attendance_id', $request['attendance_id'])
  //     ->get();

  //   $response['message'] = "Berhasil";
  //   $response['data'] = $data;
  //   return response()->json($response, 200);
  // }

  public static function getPresenceNow(Request $request)
  {

    $now = Carbon::now();

    $data = DB::table('presences')
      ->join('attendances', 'presences.attendance_id', '=', 'attendances.id')
      ->where('presence_date', $now->toDateString())
      ->where('attendance_id', $request['attendance_id'])
      ->select('presences.*', 'attendances.title', 'attendances.batas_start_time')
      ->get();

    $response['message'] = "Berhasil";
    $response['data'] = $data;
    return response()->json($response, 200);
  }

  public static function getPresenceByUser(Request $request)
  {

    $now = Carbon::now();

    $data = DB::table('presences')
      ->join('attendances', 'presences.attendance_id', '=', 'attendances.id')
      ->where('user_id', $request['user_id'])
      ->orderBy('presences.id', 'desc')
      ->get();

    $response['message'] = "Berhasil";
    $response['data'] = $data;
    return response()->json($response, 200);
  }
}
