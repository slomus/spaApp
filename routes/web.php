<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/students', [StudentController::class, 'index'])->name('students');
    Route::get('/students/edit/{student}', [StudentController::class, 'edit'])->name('students.edit');
    Route::post('/students/update/{student}', [StudentController::class,'update'])->name('students.update');
    Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');
    Route::post('/students/set_paid/{student}', [StudentController::class, 'set_paid'])->name('students.set_paid');
    Route::delete('/students/delete/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

});

require __DIR__.'/auth.php';
