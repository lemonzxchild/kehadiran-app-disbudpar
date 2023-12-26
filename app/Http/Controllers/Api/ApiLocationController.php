<?php

namespace App\Http\Controllers\Api;


use App\Models\User;
use App\Models\Role;
use App\Models\Location;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\LoginRequests\LoginRequest;
use DB;


class ApiLocationController
{
    private $response = [
        'message' => null,
        'data' => null
    ];

public static function getLocation(Request $request)
  {
    $data = Location::get();

    //dd($attendance);

    $response['message'] = 'Berhasil';
    $response['data'] = $data;

    return response()->json($response,200);
  }

  

}
