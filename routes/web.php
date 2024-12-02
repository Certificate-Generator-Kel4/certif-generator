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


    Route::get('/certificate/store/{id}', [App\Http\Controllers\superadmin\CertifController::class, 'store'])->name('superadmin.certificate.store');
    Route::get('/certificate/show/{id}', [App\Http\Controllers\superadmin\CertifController::class, 'show'])->name('superadmin.certificate.show');
    Route::get('/certificate/pdf/{id}', [App\Http\Controllers\superadmin\CertifController::class, 'pdf'])->name('superadmin.certificate.pdf');
   
    Route::get('/certificate/indexSearch', [App\Http\Controllers\superadmin\CertifController::class, 'indexSearch'])->name('superadmin.certificate.indexSearch');
    Route::get('/certificate/search', [App\Http\Controllers\superadmin\CertifController::class, 'search'])->name('superadmin.certificate.search');


    Route::get('/user', [App\Http\Controllers\superadmin\UserController::class, 'index'])->name('superadmin.user');
    Route::get('/user/create', [App\Http\Controllers\superadmin\UserController::class, 'create'])->name('superadmin.user.create');
    Route::post('/user/store', [App\Http\Controllers\superadmin\UserController::class, 'store'])->name('superadmin.user.store');
    Route::get('/user/edit/{id}', [App\Http\Controllers\superadmin\UserController::class, 'edit'])->name('superadmin.user.edit');
    Route::put('/user/update/{id}', [App\Http\Controllers\superadmin\UserController::class, 'update'])->name('superadmin.user.update');
    Route::get('/user/destroy/{id}', [App\Http\Controllers\superadmin\UserController::class, 'destroy'])->name('superadmin.user.destroy');
    

});


Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home');


    Route::get('/event', [App\Http\Controllers\admin\EventController::class, 'index'])->name('admin.event');
    Route::get('/event/create', [App\Http\Controllers\admin\EventController::class, 'create'])->name('admin.event.create');
    Route::post('/event/store', [App\Http\Controllers\admin\EventController::class, 'store'])->name('admin.event.store');
    Route::get('/event/edit/{id}', [App\Http\Controllers\admin\EventController::class, 'edit'])->name('admin.event.edit');
    Route::put('/event/update/{id}', [App\Http\Controllers\admin\EventController::class, 'update'])->name('admin.event.update');
    Route::get('/event/show/{id}', [App\Http\Controllers\admin\EventController::class, 'show'])->name('admin.event.show');
    Route::get('/event/destroy/{id}', [App\Http\Controllers\admin\EventController::class, 'destroy'])->name('admin.event.destroy');


    Route::get('/participant/export', [App\Http\Controllers\admin\ParticipantController::class, 'export_template'])->name('admin.participant.export_template');
    Route::get('/participant/import/create/{id}', [App\Http\Controllers\admin\ParticipantController::class, 'import_create'])->name('admin.participant.import.create');
    Route::get('/event/destroy_all/{id}', [App\Http\Controllers\admin\ParticipantController::class, 'destroy_all'])->name('admin.participant.destroy_all');
    Route::post('/participant/import/store', [App\Http\Controllers\admin\ParticipantController::class, 'import_store'])->name('admin.participant.import.store');
    Route::get('/participant/edit/{id}', [App\Http\Controllers\admin\ParticipantController::class, 'edit'])->name('admin.participant.edit');
    Route::put('/participant/update/{id}', [App\Http\Controllers\admin\ParticipantController::class, 'update'])->name('admin.participant.update');
    Route::get('/participant/destroy/{id}', [App\Http\Controllers\admin\ParticipantController::class, 'destroy'])->name('admin.participant.destroy');

    
    Route::get('/certificate/store/{id}', [App\Http\Controllers\admin\CertifController::class, 'store'])->name('admin.certificate.store');
    Route::get('/certificate/show/{id}', [App\Http\Controllers\admin\CertifController::class, 'show'])->name('admin.certificate.show');
    Route::get('/certificate/pdf/{id}', [App\Http\Controllers\admin\CertifController::class, 'pdf'])->name('admin.certificate.pdf');
});