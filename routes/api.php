<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\LeaveProposalController;
use App\Http\Controllers\Api\SalaryController;
use App\Http\Controllers\Api\TimeEventController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Auth\Events\Login;
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
    Route::post('/login',[AuthController::class, 'login']);
    //Admin
    Route::group(['prefix'=>'users'], function() {
        Route::get('/',[UserController::class, 'index'])->middleware(['auth:sanctum','ability:getUsers']);
        Route::get('/{id}',[UserController::class, 'show']);
        Route::post('/',[UserController::class, 'store'])->middleware(['auth:sanctum','ability:getUsers']);
        Route::patch('/{id}',[UserController::class, 'update']);
        Route::delete('/{id}',[UserController::class, 'destroy']);
    });

    Route::apiResource('leave-proposals', LeaveProposalController::class);
    Route::apiResource('time-events', TimeEventController::class);
    Route::apiResource('salaries', SalaryController::class);
});
