<?php

use App\Http\Controllers\User\AttendanceReportController;
use App\Http\Controllers\User\CourseController;
use App\Http\Controllers\User\CourseSessionTrackerController;
use App\Http\Controllers\User\CourseVideoTrackerController;
use App\Http\Controllers\User\PaymentController;
use App\Http\Controllers\User\InvoiceController;
use App\Http\Controllers\User\CourseSessionController;
use App\Http\Controllers\User\ShoppingCartDetailsController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\ShoppingCartController;
use App\Http\Controllers\User\SurveyUserAnswerController;
use App\Http\Controllers\User\UserCertificateController;
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
                        'middleware' => [ 'auth' ]
                      ],
    function () {
        Route::get('profile/edit', [ ProfileController::class, 'edit' ])->name('profile.edit');
        Route::put('profile', [ ProfileController::class, 'update' ])->name('profile.update');
        Route::post('favourite-courses/{course}', UserFavouriteCourseController::class)->name('courses.favourite');

        Route::resource('shopping-cart', ShoppingCartController::class)->only('index', 'store', 'destroy');
        Route::get('shopping-cart-details', ShoppingCartDetailsController::class)->name('shopping-cart.details');

        Route::get('payment/callback',[ PaymentController::class, 'callback'])->name('payment.callback');
        Route::post('payment/checkout',[ PaymentController::class, 'checkout'])->name('payment.checkout');
        Route::resource('invoices', InvoiceController::class)->only('index');
        Route::get('invoices/{course}', [ InvoiceController::class, 'print' ])->name('invoices.print');

        Route::resource('certificates', UserCertificateController::class)->only('index');
        Route::post('courses/{course}/certificate/print', [UserCertificateController::class,'print'])->name('certificates.print');
        Route::post('courses/{course}/certificate/send', [UserCertificateController::class,'send'])->name('certificates.send');
        Route::put('courses/videos/tracker', [CourseVideoTrackerController::class,'update']);
        Route::put('courses/sessions/tracker', [ CourseSessionTrackerController::class, 'update'])->name('courses.sessions.tracker.update');
        Route::get('courses/{course}/attendance-report',[AttendanceReportController::class,'index'])->name('attendance-report');
        //*** debug route only
        Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout']);

        //Route::view('course-sessions','user.course-sessions.zoom-meetings');
        Route::view('course-sessions/leave','user.course-sessions.leave')->name('course-sessions.leave');
        Route::get('course-sessions/{course_session}',[ CourseSessionController::class, 'show'])->name('course-sessions.show');
        Route::get('course-sessions/{course_session}/join',[ CourseSessionController::class, 'joinMeeting'])->name('course-sessions.join-meeting');

        Route::post('courses/{course}/surveys/{survey}/answers',[SurveyUserAnswerController::class, 'store'])->name('courses.survey.answers.store');

    });

Route::get('migrate',function (){
    \Illuminate\Support\Facades\Artisan::call('migrate:fresh');
});


