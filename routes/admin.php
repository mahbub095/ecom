<?php


use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    /** Admin Routes */
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashbaord');

    /** Profile Routes */
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('profile/update/password', [ProfileController::class, 'updatePassword'])->name('password.update');
});
