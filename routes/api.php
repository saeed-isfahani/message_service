<?php

use App\Http\Controllers\MessageController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->middleware(['throttle:20,1'])->group(function () {
    Route::apiResource('messages', MessageController::class)->only(['store']);
    Route::get('check-health', function () {
        return response()->json(['data' => ['message' => 'Service is working properly.'], 'server_time' => Carbon::now()]);
    });
});
