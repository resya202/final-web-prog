<?php

use App\Http\Controllers\MilestoneController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth'])
    ->group(function() {
        Route::get('/user', [UserController::class, 'index'])->name('user.index');
        Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/user', [UserController::class, 'store'])->name('user.store');
        Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::get('/user/{id}/update', [UserController::class, 'update'])->name('user.update');
        Route::get('/user/{id}/destroy', [UserController::class, 'destroy'])->name('user.destroy');

        Route::get('/task', [TaskController::class, 'index'])->name('task.index');
        Route::get('/task/create', [TaskController::class, 'create'])->name('task.create');
        Route::post('/task', [TaskController::class, 'store'])->name('task.store');
        Route::get('/task/{id}/edit', [TaskController::class, 'edit'])->name('task.edit');
        Route::get('/task/{id}/update', [TaskController::class, 'update'])->name('task.update');
        Route::get('/task/{id}/destroy', [TaskController::class, 'destroy'])->name('task.destroy');

        Route::get('/milestone', [MilestoneController::class, 'index'])->name('milestone.index');
        Route::get('/milestone/create', [MilestoneController::class, 'create'])->name('milestone.create');
        Route::post('/milestone', [MilestoneController::class, 'store'])->name('milestone.store');
        Route::get('/milestone/{id}/edit', [MilestoneController::class, 'edit'])->name('milestone.edit');
        Route::get('/milestone/{id}/update', [MilestoneController::class, 'update'])->name('milestone.update');
        Route::get('/milestone/{id}/destroy', [MilestoneController::class, 'destroy'])->name('milestone.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
