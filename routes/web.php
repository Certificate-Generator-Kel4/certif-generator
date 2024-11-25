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


    Route::get('/participant/export', [App\Http\Controllers\superadmin\ParticipantController::class, 'export_template'])->name('superadmin.participant.export_template');
    Route::get('/participant/import/create/{id}', [App\Http\Controllers\superadmin\ParticipantController::class, 'import_create'])->name('superadmin.participant.import.create');
    Route::get('/event/destroy_all/{id}', [App\Http\Controllers\superadmin\ParticipantController::class, 'destroy_all'])->name('superadmin.participant.destroy_all');
    Route::post('/participant/import/store', [App\Http\Controllers\superadmin\ParticipantController::class, 'import_store'])->name('superadmin.participant.import.store');
    Route::get('/participant/edit/{id}', [App\Http\Controllers\superadmin\ParticipantController::class, 'edit'])->name('superadmin.participant.edit');
    Route::put('/participant/update/{id}', [App\Http\Controllers\superadmin\ParticipantController::class, 'update'])->name('superadmin.participant.update');
    Route::get('/participant/destroy/{id}', [App\Http\Controllers\superadmin\ParticipantController::class, 'destroy'])->name('superadmin.participant.destroy');

});


Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home');
});