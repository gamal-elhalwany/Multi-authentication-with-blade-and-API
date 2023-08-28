<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/user', [MainController::class, 'userPage'])->name('user.page');
    Route::get('/admin', [MainController::class, 'adminPage'])->name('admin.page');
});

Route::get('/admin/login', [MainController::class, 'adminLoginPage'])->name('admin.login.page');

Route::post('/admin/login', [MainController::class, 'adminLogin'])->name('admin.login');

Route::post('/admin/logout', [MainController::class, 'logout'])->name('admin.logout')->middleware('auth:admin');

require __DIR__.'/auth.php';
