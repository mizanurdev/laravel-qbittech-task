<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','role:user','verified'])->group(function () {
    Route::get('/dashboard',[UserController::class,'userDashboard'])->name('dashboard');
});

Route::middleware(['auth','role:admin','verified'])->group(function () {
    Route::get('/admin/dashboard',[UserController::class,'adminDashboard'])->name('admin.dashboard');
});


require __DIR__.'/auth.php';
