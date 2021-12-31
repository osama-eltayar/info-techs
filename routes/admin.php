<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['guest']], function () {
    Route::get('login', [LoginController::class, 'show'])->name('login.show');
    Route::post('login', [LoginController::class, 'login'])->name('login');
});

Route::group(['middleware' => ['auth','role:admin']], function () {
    Route::get('logout', [LoginController::class, 'logout'])->name('logout'); // for dev
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

});
