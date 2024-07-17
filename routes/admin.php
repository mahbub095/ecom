<?php


use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\CategoryController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    /** Admin Routes */
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashbaord');

    /** Profile Routes */
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('profile/update/password', [ProfileController::class, 'updatePassword'])->name('password.update');
    /** Category Route */
    Route::put('change-status', [CategoryController::class, 'changeStatus'])->name('category.change-status');
    Route::resource('category', CategoryController::class);
});
