<?php

use App\Http\Controllers\Admin\BuildingController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\SponsorshipController;
use App\Http\Controllers\ProfileController;
use App\Models\Sponsorship;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('admin/dashboard');
});

Route::get('admin/dashboard', function () {
    return view('admin/dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('buildings', BuildingController::class);
    Route::resource('messages', MessageController::class);
    Route::resource('sponsorships', SponsorshipController::class)->only('index', 'show');
    // Route::resource('payments', PaymentController::class)->only('index');
    // Route::get('/sponsorships/payment', 'Admin/SponsorshipController@payment');
    // Route::resource('/sponsorships/payment', SponsorshipController::class)->only('payment');


    Route::any('/payments/token', [PaymentController::class, 'token'])->name('payments.token');
    Route::get('/payments/process', [PaymentController::class, 'process'])->name('payments.process');
});

// Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');





require __DIR__ . '/auth.php';
