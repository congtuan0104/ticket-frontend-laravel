<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;

use App\Http\Controllers\TicketController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\EventCategoryController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserTicketController;

Route::get('/', [EventController::class, 'index'])->name('home');
Route::get('/event/create-step-one', [EventController::class, 'create'])->name('event.create');
Route::post('/event/create-step-one', [EventController::class, 'store'])->name('event.store');
Route::get('/event/create-step-two', [EventController::class, 'createStepTwo'])->name('event.create.step.two');
Route::post('event/create-event-step-two', [EventController::class, 'postCreateStepTwo'])->name('event.create.step.two.post');
Route::get('event/{id}/edit', [EventController::class, 'edit'])->name('event.edit');
Route::put('event/{id}', [EventController::class, 'update'])->name('event.update');


Route::delete('/event/{id}', [EventController::class, 'destroy'])->name('event.destroy');
Route::get('/event/{id}', [EventController::class, 'show'])->name('event-detail');
// Route::put('/event/{id}', [EventController::class, 'update'])->name('event.update');

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
Route::post('/ticket/create', [TicketController::class, 'store'])->name('ticket.store');

Route::get('/booking', [BookingController::class, 'index'])->name('booking');

Route::get('/event/{id}/booking', [BookingController::class, 'index'])->name('booking');
Route::post('/event/booking', [BookingController::class, 'store'])->name('booking.store');

Route::get('/payment/result', [PaymentController::class, 'result'])->name('payment-result');
Route::get('/organization/event', [OrganizationController::class, 'index'])->name('organization-event');
// require __DIR__ . '/auth.php';
//Route::get('/admin/city', [CityController::class,'city'])->name('city');
Route::get('/cities', [CityController::class, 'city'])->name('cities');
Route::post('/cities/add', [CityController::class, 'addCity'])->name('add.city');
Route::delete('/cities/delete', [CityController::class, 'deleteCity'])->name('delete.city');
Route::get('/cities/edit', [CityController::class, 'editCity'])->name('edit.city');
Route::put('/cities/update', [CityController::class, 'updateCity'])->name('update.city');

Route::get('users', [UserController::class,'user'])->name('users');

Route::get('/organizations', [OrganizationController::class,'organization'])->name('organizations');
Route::post('/organizations/add', [OrganizationController::class, 'addOrganization'])->name('add.organization');
Route::delete('/organizations/delete', [OrganizationController::class, 'deleteOrganization'])->name('delete.organization');
Route::get('/organizations/edit', [OrganizationController::class, 'editOrganization'])->name('edit.organization');
Route::put('/organizations/update', [OrganizationController::class, 'updateOrganization'])->name('update.organization');

Route::get('/eventCategories', [EventCategoryController::class,'eventCategory'])->name('eventCategories');
Route::post('/eventCategories/add', [EventCategoryController::class, 'addEventCategory'])->name('add.eventCategory');
Route::delete('/eventCategories/delete', [EventCategoryController::class, 'deleteEventCategory'])->name('delete.eventCategory');
Route::get('/eventCategories/edit', [EventCategoryController::class, 'editEventCategory'])->name('edit.eventCategory');
Route::put('/eventCategories/update', [EventCategoryController::class, 'updateEventCategory'])->name('update.eventCategory');

Route::get('/adminDashboard', [AdminDashboardController::class,'index'])->name('adminDashboard');