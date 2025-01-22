<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');





Route::get('/login', [loginController::class, 'index'])->name('login');
Route::get('/account/login', [loginController::class, 'index'])->name('account.login');
Route::get('/register', [loginController::class, 'register'])->name('account.register');
Route::post('/register', [loginController::class, 'registerProcess'])->name('account.registerProcess');

Route::post('/account/authenticate', [loginController::class, 'authenticate'])->name('account.authenticate');
Route::post('logout', [loginController::class, 'logout'])->name('account.logout');
Route::get('/account/dashboard', [DashboardController::class, 'index'])->name('account.dashboard');





// Route::get('/register',[loginController::class, 'register'])->name('account.register');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';