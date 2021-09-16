<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| auth Routes
|--------------------------------------------------------------------------
|
|
*/
Route::get('reset-password', [ ResetPasswordController::class, 'show' ]);

Route::group([ 'middleware' => [ 'guest' ] ], function () {

    Route::get('register', [ RegisterController::class, 'show' ])->name('register');
    Route::post('register', [ RegisterController::class, 'register' ])->name('register');

    Route::get('login', [ LoginController::class, 'show' ])->name('login');
    Route::post('login', [ LoginController::class, 'login' ])->name('login');

    Route::post('forget-password', [ ForgetPasswordController::class, 'sendResetLink' ])->name('password.forget');
    Route::get('forget-password', [ ForgetPasswordController::class, 'show' ]);
    Route::post('reset-password', [ ResetPasswordController::class, 'passwordReset' ])->name('password.reset');
});

Route::group([ 'middleware' => [ 'auth' ] ], function () {
    Route::post('logout', [ LoginController::class, 'logout' ])->name('logout');
//    Route::get('reset-password', [ResetPasswordController::class, 'show']);
    Route::post('auth/reset-password', [ ResetPasswordController::class, 'passwordResetForAuthUser' ])->name('auth.password.reset');
    Route::get('email/verify/{id}/{hash}', [ EmailVerificationController::class, 'verify' ])->middleware([ 'signed' ])->name('verification.verify');
    Route::post('email/verify/resend', [ EmailVerificationController::class, 'resend' ])->name('verification.resend');

});
