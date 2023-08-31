<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Modules\Hermes\Http\Controllers\HermesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

*/
Route::get('/', function () {
    return view('welcome');
});

Route::view('/login', 'login')->name('login');
Route::view('/registro', "register")->name('registro');


Route::view ('/validar-registro', [LoginController::class, 'register'])->name('validar-registro');
Route::view ('/inicia-session', [LoginController::class, 'register'])->name('inicia-session');
Route::view ('/logout', [LoginController::class, 'logout'])->name('logout');
