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
// Ruta para mostrar el formulario de inicio de sesión
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Ruta para procesar el inicio de sesión
Route::post('/login', [LoginController::class, 'login'])->name('inicia-session');

// Ruta para mostrar el formulario de registro
Route::get('/register', [LoginController::class, 'showRegistrationForm'])->name('register');

// Ruta para procesar el registro
Route::post('/register', [LoginController::class, 'register']);

// Ruta para cerrar sesión
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');