<?php

use App\Http\Controllers\WebinarController;
use App\Http\Controllers\CertificateController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Webinar Registration & Certificate Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'webinar'], function () {
    // Registration Routes
    Route::get('/register', [WebinarController::class, 'showRegistrationForm'])->name('webinar.register');
    Route::post('/register', [WebinarController::class, 'processRegistration'])->name('webinar.register.store');
    Route::get('/registration/success', [WebinarController::class, 'registrationSuccess'])->name('webinar.register.success');
    
    // Certificate Routes
    Route::group(['prefix' => 'certificate'], function () {
        Route::get('/verify/{token}', [CertificateController::class, 'verify'])->name('certificate.verify');
        Route::get('/download/{token}', [CertificateController::class, 'download'])->name('certificate.download');
        Route::get('/generate/{participantId}', [CertificateController::class, 'generate'])
            ->name('certificate.generate')
            ->middleware('auth'); // Protect certificate generation
    });
});

// Redirect root to registration page
Route::redirect('/', '/webinar/register');