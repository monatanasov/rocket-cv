<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CvController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\TechSkillController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/search', [CvController::class, 'index'])->middleware(['auth', 'verified'])->name('search');
Route::get('/dashboard', [CvController::class, 'create'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/dashboard', [CvController::class, 'store'])->middleware(['auth', 'verified'])->name('dashboard.store');

Route::get('/universities', [UniversityController::class, 'index'])->middleware(['auth', 'verified'])->name('university.index');
Route::post('/universities', [UniversityController::class, 'store'])->middleware(['auth', 'verified'])->name('university.store');

Route::get('/tech-skills', [TechSkillController::class, 'index'])->middleware(['auth', 'verified'])->name('tech-skills.index');
Route::post('/tech-skills', [TechSkillController::class, 'store'])->middleware(['auth', 'verified'])->name('tech-skills.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
