<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Middleware\Authenticate;

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


Route::get('/admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('/admin/users/login/store', [LoginController::class, 'store']);

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [MainController::class, 'index']);
    Route::get('/admin/main', [MainController::class, 'index'])->name('admin');
});
