<?php

namespace App\Http\Controllers\Api;


use App\Models\User;
use App\Models\Role;
use App\Models\Attendance;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\LoginRequests\LoginRequest;
use DB;


class ApiAttendanceController
{
  private $response = [
    'message' => null,
    'data' => null
  ];

  public static function getByPosition(Request $request)
  {
    $data = Attendance::join('attendance_position', 'attendance_position.attendance_id', '=', 'attendances.id')
      ->select(['attendance_position.attendance_id', 'attendances.title', 'attendances.description', 'attendances.start_time', 'attendances.batas_start_time', 'attendances.end_time', 'attendances.batas_end_time'])
      ->where('position_id', $request->position_id)
      ->get();

    //dd($attendance);

    $response['message'] = 'Berhasil';
    $response['data'] = $data;

    return response()->json($response, 200);
  }

  public static function getById(Request $request)
  {
    $data = Attendance::join('attendance_position', 'attendance_position.attendance_id', '=', 'attendances.id')
      ->select(['attendance_position.attendance_id', 'attendances.title', 'attendances.description', 'attendances.start_time', 'attendances.batas_start_time', 'attendances.end_time', 'attendances.batas_end_time'])
      ->where('attendances.id', $request->attendance_id)
      ->get();

    $response['message'] = 'Berhasil';
    $response['data'] = $data;

    return response()->json($response, 200);
  }
}
