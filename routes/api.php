<?php

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

route::get('/participant',[App\Http\Controllers\superadmin\ParticipantController::class, 'index']);
route::get('/event',[App\Http\Controllers\superadmin\EventController::class, 'index']);
route::get('/event/{id}',[App\Http\Controllers\superadmin\EventController::class, 'show']);
route::delete('/event/{id}/delete',[App\Http\Controllers\superadmin\EventController::class, 'destroy']);
