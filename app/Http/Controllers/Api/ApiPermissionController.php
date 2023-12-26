<?php

namespace App\Http\Controllers\Api;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ApiPermissionController extends Controller
{

    public static function getPermissionByUser(Request $request)
    {
        $now = Carbon::now();

        $data = DB::table('permissions')
            ->where('user_id', $request['user_id'])
            ->where('attendance_id', $request['attendance_id'])
            ->where('permission_date', $now->toDateString())
            ->get();

        $response['message'] = "Berhasil";
        $response['data'] = $data;
        return response()->json($response, 200);
    }

    public function storePermission(Request $request)
    {

        $data = Permission::create([
            'user_id' => $request->user_id,
            'attendance_id' => $request->attendance_id,
            'title' => $request->title,
            'description' => $request->description,
            'permission_date' => now()
        ]);


        $response['message'] = 'Berhasil';
        $response['data'] = $data;

        return response()->json($response, 200);
    }
}
