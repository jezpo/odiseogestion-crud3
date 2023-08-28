<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Modules\Hermes\Http\Controllers\HermesController;

use Modules\Hermes\Http\Controllers\TipoDeTramiteController;
use Modules\Hermes\Http\Controllers\ProgramasController;
use Modules\Hermes\Http\Controllers\DocumentosController;
use Modules\Hermes\Http\Controllers\FlujoDeDocumentosController;
use Modules\Hermes\Http\Controllers\FlujoDeTramiteController;
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
Route::prefix('hermes')->group(function() {
    
    Route::get('/', 'HermesController@index')->name('index');
    Route::get('/create', 'HermesController@create')->name('create');
    Route::post('store', 'HermesController@store')->name('store');
    Route::get('/show', 'HermesController@show')->name('show');
    Route::get('/edit/{id}', 'HermesController@edit')->name('edit');
    Route::post('/update/{id}', 'HermesController@update')->name('update');
    Route::get('/destroy/{id}', 'HermesController@destroy')->name('destroy');


    //ingresando la vista de programas 
    Route::get('programas', [ProgramasController::class, 'index'])->name('programas.index');
    Route::post('programas/create', [ProgramasController::class, 'create'])->name('programas.create');
    Route::post('programas', [ProgramasController::class, 'store'])->name('programas.store');
    Route::get('programas/{id}', [ProgramasController::class, 'show'])->name('programas.show');
    Route::post('programas/edit/{id}', [ProgramasController::class, 'edit'])->name('programas.edit');
    Route::post('programas/{id}', [ProgramasController::class, 'update'])->name('programas.update');
    Route::get('programas/{id}', [ProgramasController::class, 'destroy'])->name('programas.destroy');
    //llamando a flujo de tramite controller 
    
    //ruta de flujo de tramite 
    Route::get('flujotramite',[FlujoDeTramiteController::class, 'index'])->name('flujotramite.index');
    Route::post('flujotramite/create', [FlujoDeTramiteController::class, 'create'])->name('flujotramite.create');
    Route::post('flujotramite', [FlujoDeTramiteController::class, 'store'])->name('flujotramite.store');
    Route::get('flujotramite/{id}', [FlujoDeTramiteController::class, 'show'])->name('flujotramite.show');
    Route::post('flujotramite/edit/{id}', [FlujoDeTramiteController::class, 'edit'])->name('flujotramite.edit');
    Route::post('flujotramite/{id}', [FlujoDeTramiteController::class, 'update'])->name('flujotramite.update');
    Route::get('flujotramite/destroy/{id}', [FlujoDeTramiteController::class, 'destroy'])->name('flujotramite.destroy');

    //ruta para flujo de documentos
    Route::get('flujodocumentos', [FlujoDeDocumentosController::class, 'index'])->name('flujodocumentos.index');
    Route::post('flujodocumentos/create', [FlujoDeDocumentosController::class, 'create'])->name('flujodocumentos.create');
    Route::post('flujodocumentos', [FlujoDeDocumentosController::class, 'store'])->name('flujodocumentos.store');
    Route::get('flujodocumentos/{id}', [FlujoDeDocumentosController::class, 'show'])->name('flujodocumentos.show');
    Route::post('flujodocumentos/edit/{id}', [FlujoDeDocumentosController::class, 'edit'])->name('flujodocumentos.edit');
    Route::post('flujodocumentos/{id}', [FlujoDeDocumentosController::class, 'update'])->name('flujodocumentos.update');
    Route::get('flujodocumentos/destroy/{id}', [FlujoDeDocumentosController::class, 'destroy'])->name('flujodocumentos.destroy');


    //ruta para tipo de tramite 
    Route::get('tipotramite/',[TipoDeTramiteController::class,'index'])->name('tipotramite.index');
    Route::post('tipotramite/create', [TipoDeTramiteController::class, 'create'])->name('tipotramite.create');
    Route::post('tipotramite', [TipoDeTramiteController::class, 'store'])->name('tipotramite.store');
    Route::get('tipotramite/{id}', [TipoDeTramiteController::class, 'show'])->name('tipotramite.show');
    Route::get('tipotramite/edit/{id}', [TipoDeTramiteController::class, 'edit'])->name('tipotramite.edit');
    Route::put('tipotramite/{id}', [TipoDeTramiteController::class, 'update'])->name('tipotramite.update');
    Route::get('tipotramite/destroy/{id}', [TipoDeTramiteController::class, 'destroy'])->name('tipotramite.destroy');

   
    Route::get('/documentos', [DocumentosController::class, 'index'])->name('documentos.index');
    Route::get('documentos/fetchall', [DocumentosController::class, 'fetchAll'])->name('documentos-fetchAll');
    Route::post('documentos/store', 'DocumentosController@store')->name('documentos.store');
    Route::get('documentos/{id}', 'DocumentosController@show')->name('documentos.show');
    Route::get('documentos/edit/{id}', 'DocumentosController@edit')->name('documentos.edit');
    Route::post('documentos/update/{id}', 'DocumentosController@update')->name('documentos.update');
    Route::get('documentos/destroy/{id}', [DocumentosController::class, 'destroy'])->name('documentos.destroy');

    Route::get('documentos/preview-pdf/{id}', 'GeneratepdfController@previewPDF')->name('documentos.preview-pdf');
});



