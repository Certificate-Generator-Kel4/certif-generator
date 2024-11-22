<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\superadmin\ParticipantController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['role:super-admin'], 'prefix' => 'superadmin'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'superadmin'])->name('superadmin.home');
    Route::get('/event', [App\Http\Controllers\superadmin\EventController::class, 'index'])->name('superadmin.event');
    Route::get('/event/create', [App\Http\Controllers\superadmin\EventController::class, 'create'])->name('superadmin.event.create');
    Route::post('/event/store', [App\Http\Controllers\superadmin\EventController::class, 'store'])->name('superadmin.event.store');
    Route::get('/event/edit/{id}', [App\Http\Controllers\superadmin\EventController::class, 'edit'])->name('superadmin.event.edit');
    Route::put('/event/update/{id}', [App\Http\Controllers\superadmin\EventController::class, 'update'])->name('superadmin.event.update');
    Route::get('/event/show/{id}', [App\Http\Controllers\superadmin\EventController::class, 'show'])->name('superadmin.event.show');
    Route::get('/event/destroy/{id}', [App\Http\Controllers\superadmin\EventController::class, 'destroy'])->name('superadmin.event.destroy');
});


Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home');
});