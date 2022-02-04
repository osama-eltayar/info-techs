<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\OwnerController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['guest']], function () {
    Route::get('login', [LoginController::class, 'show'])->name('login.show');
    Route::post('login', [LoginController::class, 'login'])->name('login');
});

Route::group(['middleware' => ['auth','role:admin']], function () {
    Route::get('logout', [LoginController::class, 'logout'])->name('logout'); // for dev
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::resource('owners', OwnerController::class);
    Route::post('owners/export/excel',[OwnerController::class,'exportExcel'])->name('owners.export.excel');
    Route::post('owners/export/pdf',[OwnerController::class,'exportPdf'])->name('owners.export.pdf');
    Route::get('owners/{owner}/material/download',[OwnerController::class,'downloadMaterial'])->name('owners.martial.download');



    Route::post('owners/{owner}/courses/export/excel',[ CourseController::class, 'exportExcel'])->name('owners.courses.export.excel');
    Route::post('owners/{owner}/courses/export/pdf',[ CourseController::class, 'exportPdf'])->name('owners.courses.export.pdf');
});
