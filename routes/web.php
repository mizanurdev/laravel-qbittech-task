<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'home');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','role:user','verified'])->group(function () {
    Route::get('/dashboard',[UserController::class,'userDashboard'])->name('dashboard');
    Route::prefix('user')->group(function () {
        Route::get('/tasks', [TaskController::class, 'userTasks'])->name('user.tasks');
        Route::post('/tasks/{task}/status', [TaskController::class, 'updateStatus'])->name('tasks.updateStatus');

        Route::get('tasks/{task}/comments', [CommentController::class, 'showUserComment'])->name('user.tasks.comments.show');
        Route::post('tasks/{task}/comments', [CommentController::class, 'storeUserComment'])->name('user.tasks.comments.store');
        Route::get('tasks/{task}', [TaskController::class, 'userShowTask'])->name('user.tasks.show');
    });
});


Route::middleware(['auth','role:admin','verified'])->group(function () {
    Route::get('/admin/dashboard',[UserController::class,'adminDashboard'])->name('admin.dashboard');
    Route::prefix('admin')->group(function () {
        Route::resource('projects', ProjectController::class);
        Route::resource('tasks', TaskController::class);
        
        Route::get('tasks/{task}/comments', [CommentController::class, 'show'])->name('tasks.comments.show');
        Route::post('tasks/{task}/comments', [CommentController::class, 'store'])->name('tasks.comments.store');
    });
});


require __DIR__.'/auth.php';
