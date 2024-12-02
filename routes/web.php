<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\superadmin\{
    EventController,
    ParticipantController,
    CertifController
};
use App\Http\Controllers\Auth\{
    ForgotPasswordController,
    RegisterController,
    SocialLoginController
};
use App\Http\Controllers\HomeController;
use App\Mail\CertificateMail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\{
    Auth,
    Mail,
    Storage
};
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where web routes for your application are defined.
| Routes are loaded by the RouteServiceProvider within the "web" group.
|
*/

// Authentication Routes
Auth::routes();

// Home Route
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Frontend Home
Route::get('/', fn() => view('home'));

// Registration Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

// Login Route
Route::get('/login', fn() => view('auth.login'))->name('login');

// Forgot Password Routes
Route::prefix('password')->group(function () {
    Route::get('reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('reset', [ForgotPasswordController::class, 'reset'])->name('password.update');
});

// FAQ Route
Route::get('/faq', fn() => view('faq'))->name('faq');

// Superadmin Routes
Route::group(['middleware' => ['role:super-admin'], 'prefix' => 'superadmin'], function () {
    Route::get('/', [HomeController::class, 'superadmin'])->name('superadmin.home');
    
    // Event Routes
    Route::resource('event', EventController::class)->except(['destroy']);
    Route::get('/event/destroy/{id}', [EventController::class, 'destroy'])->name('superadmin.event.destroy');
    Route::get('/event/destroy_all/{id}', [ParticipantController::class, 'destroy_all'])->name('superadmin.participant.destroy_all');

    // Participant Routes
    Route::prefix('participant')->group(function () {
        Route::get('export', [ParticipantController::class, 'export_template'])->name('superadmin.participant.export_template');
        Route::get('import/create/{id}', [ParticipantController::class, 'import_create'])->name('superadmin.participant.import.create');
        Route::post('import/store', [ParticipantController::class, 'import_store'])->name('superadmin.participant.import.store');
        Route::resource('/', ParticipantController::class)->except(['index', 'create', 'store', 'show']);
    });

    // Certificate Routes
    Route::prefix('certificate')->group(function () {
        Route::get('store/{id}', [CertifController::class, 'store'])->name('superadmin.certificate.store');
        Route::get('show/{id}', [CertifController::class, 'show'])->name('superadmin.certificate.show');
    });
});

// Admin Routes
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin', [HomeController::class, 'admin'])->name('admin.home');
});
//GET DATA DI DASBOARD
Route::get('/data', function () {
    return view('data');
})->name('data');

// Certificate Management Routes
Route::prefix('certificate')->group(function () {
    Route::get('/', fn() => view('superadmin.certificate.generate'))->name('certificate');
    Route::get('templates', [CertifController::class, 'index'])->name('certificate.templates');
    Route::get('create', [CertifController::class, 'create'])->name('certificate.create');
    Route::post('store', [CertifController::class, 'store'])->name('certificate.store');
    Route::get('edit/{id}', [CertifController::class, 'edit'])->name('certificate.edit');
    Route::post('update/{id}', [CertifController::class, 'update'])->name('certificate.update');
    Route::get('generate', [CertifController::class, 'generate'])->name('generate.certificate');
    Route::get('/superadmin/certificate/template', [CertifController::class, 'template'])->name('certificate.template');
    Route::get('superadmin/certificate/generate/{template_id}', [CertifController::class, 'generate'])->name('certificate.generate');
    Route::get('/superadmin/certificate/get-template/{templateId}', [CertifController::class, 'getTemplate']);

});

// Certificate Generation and Emailing
Route::post('/send-certificate', function (Illuminate\Http\Request $request) {
    $data = $request->only(['name', 'achievement', 'email']);
    $pdf = Pdf::loadView('templates.modern', $data);
    $filePath = 'certificates/' . $data['name'] . '_certificate.pdf';

    Storage::put('public/' . $filePath, $pdf->output());
    $data['certificate_path'] = $filePath;

    Mail::to($data['email'])->send(new CertificateMail($data));
    return response()->json(['message' => 'Certificate sent successfully!']);
});

// LinkedIn Integration
Route::prefix('linkedin')->group(function () {
    Route::get('redirect', fn() => Socialite::driver('linkedin')->redirect())->name('linkedin.redirect');
    Route::get('callback', fn() => redirect()->route('linkedin.share'))->name('linkedin.callback');
    Route::get('share', fn() => redirect()->route('dashboard'))->name('linkedin.share');
});

// Route untuk Certificate Verification System
Route::get('/certificate/verification', function () {
    return view('check');
})->name('certificate.verification');

// rutt sementara
Route::get('/certificate/result', function () {
    return view('virified', [
        'certificateHolder' => 'John Doe',
        'uid' => 'Cert1234-5678-ABCD',
        'eventName' => 'UI/UX Design',
        'issuedBy' => 'Maxy Academ',
        'issueDate' => 'November 20, 2024',
    ]);
})->name('virified');