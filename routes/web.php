<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User;

Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth', AdminMiddleware::class])->name('dashboard');


Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login']);
Route::get('dashboard/addCharity', [AdminController::class, 'addCharity']);
Route::post('dashboard/storeCharities', [AdminController::class, 'storeCharity']);
Route::get('dashboard/charities', [AdminController::class, 'charities']);
Route::get('dashboard/charities/{id}/edit', [AdminController::class, 'edit'])->name('charities.edit');
Route::put('/dashboardcharities/{id}', [AdminController::class, 'update'])->name('charities.update');
Route::delete('dashboard/charities/{id}', [AdminController::class, 'deleteCharity'])->name('charities.delete');
Route::get('dashboard/users', [AdminController::class, 'users'])->name('users.index');
Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->name('users.delete');
Route::get('dashboard/donations', [AdminController::class, 'donations'])->name('donations.index');
Route::patch('/donations/{id}/update-status', [AdminController::class, 'updateDeliveryStatus'])->name('donations.updateDeliveryStatus');

Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/', [User::class, 'home'])->name('home');
Route::get('/associations',[User::class,'AssociationsIndex']);
Route::get('/calculate-zakat',[User::class,'calculateZakatIndex']);
Route::post('/calculate-zakat', [User::class, 'calculate'])->name('calculate-zakat.calculate');

Route::middleware(['auth'])->group(function () {
    Route::get('/donate/{charity_id}', [User::class, 'create'])->name('donations.create');
    Route::post('/donate', [User::class, 'store'])->name('donations.store');
});


Route::get('/about-us', function () {
    return view('about-us');
});

