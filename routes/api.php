<?php

use App\Http\Controllers\Api\LeaveRequestController;
use App\Http\Controllers\Api\LeaveTypeController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserSalaryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('salaries',UserSalaryController::class);
    Route::apiResource('leavetypes',LeaveTypeController::class);
    Route::apiResource('leave-requests',LeaveRequestController::class);
});
