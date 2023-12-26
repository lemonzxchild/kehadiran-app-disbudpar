<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\PermissionController;

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
