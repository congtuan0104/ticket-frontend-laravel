<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserTicketController;

Route::get('/', [EventController::class, 'index'])->name('home');

Route::get('/event/{id}', [EventController::class, 'show'])->name('event-detail');

Route::get('/event', function () {
    return redirect('/');
});

Route::get('/search', [SearchController::class, 'search'])->name('search');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/register', [RegisterUserController::class, 'create'])
    ->name('register');

Route::post('/register', [RegisterUserController::class, 'store']);

Route::get('/login', [AuthController::class, 'create'])
    ->name('login.create');

Route::post('/login', [AuthController::class, 'store'])
    ->name('login.store');

Route::post('/logout', [AuthController::class, 'destroy'])
    ->name('logout');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
Route::patch('/update-password', [ProfileController::class, 'updatePassword'])->name('password.update');

Route::get('/my-ticket', [UserTicketController::class, 'index'])->name('user-ticket');
Route::get('/my-ticket/{id}', [UserTicketController::class, 'detail'])->name('ticket-detail');
Route::get('/booking', [BookingController::class, 'index'])->name('booking');

Route::get('/payment/result', [PaymentController::class, 'result'])->name('payment-result');

// require __DIR__ . '/auth.php';
