<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
     if (FacadesAuth::check()){
         return redirect()->route('dashboard');
     } else { 
         return view('auth.register');
     }
    
});

Route::middleware('auth')->group(function () {
    Route::resource('tasks', TaskController::class)->except(['show']);
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');
    Route::get('/list', [TaskController::class, 'list'])->name('list');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
