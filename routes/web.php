<?php

use App\Http\Controllers\User\CourseController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\UserFavouriteCourseController;
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

Route::redirect('/', 'courses');

Route::resource('courses', CourseController::class)->only('index', 'show');

Route::group([
                 'middleware' => ['auth']
             ],
    function () {
        Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('favourite-courses/{course}', UserFavouriteCourseController::class)->name('courses.favourite');
    });


//*** debug route only
Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout']);
