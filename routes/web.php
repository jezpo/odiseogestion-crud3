<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\Auth\AuthController;
use Modules\Hermes\Http\Controllers\HermesController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\GestionController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RolesController;
  
  
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
  
// Rutas públicas
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 

// Rutas protegidas (solo para usuarios autenticados)
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [AuthController::class, 'dashboard']);
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/sidebar', [AuthController::class, 'sidebar'])->name('sidebar');
    Route::get('/hermes', [HermesController::class, 'index'])->name('hermes::documents.index');
    Route::get('/change-password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('password.change');
    Route::post('/change-password', 'Auth\ChangePasswordController@changePassword')->name('password.change.submit');

    Route::get('roles', [RolesController::class, 'roles'])->name('roles');
    Route::get('permisos', [PermissionController::class, 'permisos'])->name('permisos');
    Route::get('asignar-permisos', [RoleController::class, 'asignarPermisos'])->name('hermes.asignarPermisos');

    Route::get('user/{userId}/foto', [AuthController::class, 'showFoto']);
    Route::get('/gestion', [GestionController::class, 'mostrarGestion'])->name('gestion.mostrar');
});