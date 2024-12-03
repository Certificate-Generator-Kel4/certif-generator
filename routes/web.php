<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\superadmin\{
    EventController,
    ParticipantController,
    CertifController,
    UserController
};
use App\Http\Controllers\Auth\{
    ForgotPasswordController,
    RegisterController
};
use App\Http\Controllers\HomeController;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\{Auth, Mail, Storage};

// Authentication Routes
Auth::routes();

// Home Route
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', fn() => view('home'));

// Registration Routes
Route::prefix('register')->group(function () {
    Route::get('/', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/', [RegisterController::class, 'register'])->name('register.post');
});

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
    Route::get('event/destroy/{id}', [EventController::class, 'destroy'])->name('superadmin.event.destroy');
    Route::get('participant/destroy_all/{id}', [ParticipantController::class, 'destroy_all'])->name('superadmin.participant.destroy_all');

    // Participant Routes
    Route::prefix('participant')->group(function () {
        Route::get('export', [ParticipantController::class, 'export_template'])->name('superadmin.participant.export_template');
        Route::get('import/create/{id}', [ParticipantController::class, 'import_create'])->name('superadmin.participant.import.create');
        Route::post('import/store', [ParticipantController::class, 'import_store'])->name('superadmin.participant.import.store');
    });

    // Certificate Routes
    Route::prefix('certificate')->group(function () {
        Route::get('store/{id}', [CertifController::class, 'store'])->name('superadmin.certificate.store');
        Route::get('show/{id}', [CertifController::class, 'show'])->name('superadmin.certificate.show');
        Route::get('pdf/{id}', [CertifController::class, 'pdf'])->name('superadmin.certificate.pdf');
    });

    // User Management Routes
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('superadmin.user');
        Route::get('create', [UserController::class, 'create'])->name('superadmin.user.create');
        Route::post('store', [UserController::class, 'store'])->name('superadmin.user.store');
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('superadmin.user.edit');
        Route::put('update/{id}', [UserController::class, 'update'])->name('superadmin.user.update');
        Route::get('destroy/{id}', [UserController::class, 'destroy'])->name('superadmin.user.destroy');
    });
});

// Admin Routes
Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {
    Route::get('/', [HomeController::class, 'admin'])->name('admin.home');

    // Event Routes
    Route::resource('event', App\Http\Controllers\admin\EventController::class);
    Route::get('participant/export', [App\Http\Controllers\admin\ParticipantController::class, 'export_template'])->name('admin.participant.export_template');
    Route::post('participant/import/store', [App\Http\Controllers\admin\ParticipantController::class, 'import_store'])->name('admin.participant.import.store');
});
//generate bar
Route::get('certificate/generate', function () {
    return view('superadmin.certificate.generate');
})->name('superadmin.certificate.generate');

//data bar
Route::get('/data', function () {
    return view('data');
})->name('data');

//template bar
Route::group(['middleware' => ['role:super-admin'], 'prefix' => 'superadmin'], function () {
    Route::get('/certificate/template', [CertifController::class, 'template'])->name('certificate.template');
});

//add template
Route::group(['middleware' => ['role:super-admin'], 'prefix' => 'superadmin'], function () {
    Route::post('/certificate/store', [CertifController::class, 'store'])->name('certificate.store');
});
Route::get('/templates', [CertifController::class, 'index'])->name('templates.index');
Route::get('/generate/{template_id}', [CertifController::class, 'generate'])->name('generate');











// Certificate Generation and Emailing
Route::post('/send-certificate', function (Illuminate\Http\Request $request) {
    $data = $request->only(['name', 'achievement', 'email']);
    $pdf = Pdf::loadView('templates.modern', $data);
    $filePath = 'certificates/' . $data['name'] . '_certificate.pdf';

    Storage::put('public/' . $filePath, $pdf->output());
    $data['certificate_path'] = $filePath;

    Mail::to($data['email'])->send(new App\Mail\CertificateMail($data));
    return response()->json(['message' => 'Certificate sent successfully!']);
});

// Certificate Verification
Route::get('/certificate/verification', fn() => view('check'))->name('certificate.verification');
Route::get('/certificate/result', fn() => view('virified', [
    'certificateHolder' => 'John Doe',
    'uid' => 'Cert1234-5678-ABCD',
    'eventName' => 'UI/UX Design',
    'issuedBy' => 'Maxy Academy',
    'issueDate' => 'November 20, 2024',
]))->name('virified');
