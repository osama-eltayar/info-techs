<?php

use App\Http\Controllers\User\CourseController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/','courses');

Route::resource('courses', CourseController::class )->only('index','show');
Route::get('profile/edit', [ProfileController::class,'edit'] )->name('profile.edit')->middleware('auth');
Route::put('profile', [ProfileController::class,'update'] )->name('profile.update')->middleware('auth');

Route::get('logout',[\App\Http\Controllers\Auth\LoginController::class,'logout']);
//Route::view('reset_password','user.auth.reset_password');
