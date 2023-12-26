<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\ApiHolidayController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\ApiLocationController;
use App\Http\Controllers\Api\ApiPresenceController;
use App\Http\Controllers\Api\ApiAttendanceController;
use App\Http\Controllers\Api\ApiPermissionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::post('login', [AuthController::class, 'loginApi']);
Route::post('loginapi', [ApiAuthController::class, 'loginApi']);

Route::get('getDistance',    [ApiPresenceController::class, 'vincentyGreatCircleDistance']);
Route::get('getPresenceNow', [ApiPresenceController::class, 'getPresenceNow']);
Route::post('regisface',     [ApiPresenceController::class, 'regisface']);
Route::post('storePresence', [ApiPresenceController::class, 'storePresence']);
Route::get('getPresenceByUser', [ApiPresenceController::class, 'getPresenceByUser']);

Route::get('getByPosition',  [ApiAttendanceController::class, 'getByPosition']);
Route::get('getLocation',    [ApiLocationController::class,   'getLocation']);
Route::get('getHoliday',     [ApiHolidayController::class,    'getHoliday']);

Route::get('getPermissionByUser',     [ApiPermissionController::class,    'getPermissionByUser']);
Route::post('storePermission',     [ApiPermissionController::class,    'storePermission']);

Route::get('getById',  [ApiAttendanceController::class, 'getById']);
Route::get('getHolidayToday',     [ApiHolidayController::class, 'getHolidayToday']);

// Route::group(['middleware' => ['auth:sanctum']], function () {
// });

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [AuthController::class, 'userApi']);
    Route::post('logout', [AuthController::class, 'logoutApi']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('permissions/detail', [PermissionController::class, 'show'])->name('api.permissions.show');
