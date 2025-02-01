<?php

use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/products', function () {
    return view('products');
})->name('products');





Route::group(['prefix' => 'account'], function(){

    // for guest 
    Route::group(['middleware' => 'guest'], function(){
    Route::get('/login', [loginController::class, 'index'])->name('login');
   Route::get('/register', [loginController::class, 'register'])->name('account.register');
    Route::post('/register', [loginController::class, 'registerProcess'])->name('account.registerProcess');
    Route::post('/authenticate', [loginController::class, 'authenticate'])->name('account.authenticate');
    });
    // for auth 
    Route::group(['middleware' => 'auth'], function(){
        Route::post('logout', [loginController::class, 'logout'])->name('account.logout');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('account.dashboard');
    });
   
});
 Route::get('admin/login', [AdminLoginController::class, 'index'])->name('admin.login');










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