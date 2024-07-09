<?php


use App\Http\Controllers\Backend\AdminController;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    /** Admin Routes */
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashbaord');
});
