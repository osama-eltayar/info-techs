<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\OwnerController;
use App\Http\Controllers\Admin\RegisteredUserController;
use App\Http\Controllers\Admin\ShoppingCartController;
use App\Http\Controllers\Admin\SpeakerController;
use App\Http\Controllers\Admin\SponsorController;
use App\Http\Controllers\Admin\SponsorMaterialController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'dashboard/owners');

Route::group(['middleware' => ['guest']], function () {
    Route::get('login', [LoginController::class, 'show'])->name('login.show');
    Route::post('login', [LoginController::class, 'login'])->name('login');
});

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('logout', [LoginController::class, 'logout'])->name('logout'); // for dev
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::resource('owners', OwnerController::class);
    Route::post('owners/export/excel', [OwnerController::class, 'exportExcel'])->name('owners.export.excel');
    Route::post('owners/export/pdf', [OwnerController::class, 'exportPdf'])->name('owners.export.pdf');
    Route::get('owners/{owner}/material/download', [OwnerController::class, 'downloadMaterial'])->name('owners.martial.download');

    //    Route::post('owners/{owner}/courses/export/excel',[ CourseController::class, 'exportExcel'])->name('owners.courses.export.excel');
    //    Route::post('owners/{owner}/courses/export/pdf',[ CourseController::class, 'exportPdf'])->name('owners.courses.export.pdf');

    Route::resource('sponsors', SponsorController::class);
    Route::post('sponsors/export/excel', [SponsorController::class, 'exportExcel'])->name('sponsors.export.excel');
    Route::post('sponsors/export/pdf', [SponsorController::class, 'exportPdf'])->name('sponsors.export.pdf');
    Route::get('sponsors/{sponsor}/material/{material}/download', [SponsorMaterialController::class, 'download'])->name('sponsors.martial.download');
    //    Route::post('sponsors/{sponsor}/courses/export/excel',[ CourseController::class, 'exportExcel'])->name('sponsors.courses.export.excel');
    //    Route::post('sponsors/{sponsor}/courses/export/pdf',[ CourseController::class, 'exportPdf'])->name('sponsors.courses.export.pdf');

    Route::resource('events', EventController::class);
    Route::post('events/{event}/users/export/excel',[ RegisteredUserController::class, 'exportExcel'])->name('registered-users.export.excel');
    Route::post('events/{event}/users/export/pdf',[ RegisteredUserController::class, 'exportPdf'])->name('registered-users.export.pdf');
    Route::get('events/{event}/users/{user}', [RegisteredUserController::class, 'show'])->name('registered-users.show');
    Route::post('events/{event}/users/{user}/export/excel',[ RegisteredUserController::class, 'progressExportPdf'])->name('course-progress.export.excel');
    Route::post('events/{event}/users/{user}/export/pdf',[ RegisteredUserController::class, 'progressExportExcel'])->name('course-progress.export.pdf');
    
    Route::put('/events/{event}/upload-certificate',[EventController::class,'uploadCertificate'])->name('events.upload-certificate');


    Route::post('{resource_type}/{resource_id}/courses/export/excel', [CourseController::class, 'exportExcel'])
        ->name('courses.export.excel')->where('resource_type', 'owners|sponsors|speakers');

    Route::post('{resource_type}/{resource_id}/courses/export/pdf', [CourseController::class, 'exportPdf'])
        ->where('resource_type', 'owners|sponsors|speakers')->name('courses.export.pdf');


    //  Speakers
    Route::resource('speakers', SpeakerController::class);
    Route::post('speakers/export/excel',[SpeakerController::class,'exportExcel'])->name('speakers.export.excel');
    Route::post('speakers/export/pdf',[SpeakerController::class,'exportPdf'])->name('speakers.export.pdf');

    Route::resource('users', UserController::class);
    Route::post('users/export/pdf', [UserController::class, 'exportPdf'])->name('users.export.pdf');
    Route::post('users/export/excel', [UserController::class, 'exportExcel'])->name('users.export.excel');

    Route::resource('events', EventController::class);
    Route::post('events/{event}/zoom-links', [EventController::class, 'zoomLinks'])->name('events.zoom-links');

    Route::resource('discounts', DiscountController::class);

    Route::resource('shopping-carts', ShoppingCartController::class);
    Route::post('shopping-carts/export/pdf', [ShoppingCartController::class, 'exportPdf'])->name('shopping-carts.export.pdf');
    Route::post('shopping-carts/export/excel', [ShoppingCartController::class, 'exportExcel'])->name('shopping-carts.export.excel');
});
