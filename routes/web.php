<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/event/{id}', [EventController::class, 'show'])->name('event-detail');

Route::get('/event', function () {
    return redirect('/');
});

Route::get('/search', [SearchController::class, 'search'])->name('search');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::get('/register', [RegisterUserController::class, 'create'])
    ->name('register');

Route::post('/register', [RegisterUserController::class, 'store']);

Route::get('/login', [AuthController::class, 'create'])
    ->name('login.create');

Route::post('/login', [AuthController::class, 'store'])
    ->name('login.store');

Route::post('/logout', [AuthController::class, 'destroy'])
    ->name('logout');

require __DIR__ . '/auth.php';
