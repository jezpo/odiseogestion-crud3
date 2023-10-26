<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Modules\Hermes\Http\Controllers\HermesController;

use Modules\Hermes\Http\Controllers\TipoDeTramiteController;
use Modules\Hermes\Http\Controllers\ProgramasController;

use Modules\Hermes\Http\Controllers\FlujoDeDocumentosController;
use Modules\Hermes\Http\Controllers\FlujoDeTramiteController;
use Modules\Hermes\Http\Controllers\DocumentsController;
use Modules\Hermes\Http\Controllers\PermissionController;
use Modules\Hermes\Http\Controllers\ReportController;


Route::prefix('hermes')->group(function () {

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
    Route::get('programas/edit/{id}', [ProgramasController::class, 'edit'])->name('programas.edit');
    Route::put('programas/update/{id}', [ProgramasController::class, 'update'])->name('programas.update');
    Route::get('programas/destroy/{id}', [ProgramasController::class, 'destroy'])->name('programas.destroy');
    //llamando a flujo de tramite controller 
    Route::get('documentos/recibidos', [DocumentsController::class, 'recibidos'])->name('documentos.recibidos');

    //ruta de flujo de tramite 
    Route::get('flujotramite', [FlujoDeTramiteController::class, 'index'])->name('flujotramite.index');
    Route::post('flujotramite/create', [FlujoDeTramiteController::class, 'create'])->name('flujotramite.create');
    Route::post('flujotramite/store', [FlujoDeTramiteController::class, 'store'])->name('flujotramite.store');
    Route::get('flujotramite/{id}', [FlujoDeTramiteController::class, 'show'])->name('flujotramite.show');
    Route::post('flujotramite/edit/{id}', [FlujoDeTramiteController::class, 'edit'])->name('flujotramite.edit');
    Route::post('flujotramite/update/{id}', [FlujoDeTramiteController::class, 'update'])->name('flujotramite.update');
    Route::delete('flujotramite/destroy/{id}', [FlujoDeTramiteController::class, 'destroy'])->name('flujotramite.destroy');

    //ruta para flujo de documentos
    Route::get('flujodocumentos', [FlujoDeDocumentosController::class, 'index'])->name('flujodedocumento.index'); // Cambia 'flujodocumentos' a 'flujodedocumento'
    Route::post('flujodocumentos/create', [FlujoDeDocumentosController::class, 'create'])->name('flujodocumentos.create');
    Route::post('flujodocumentos/store', [FlujoDeDocumentosController::class, 'store'])->name('flujodocumentos.store');
    Route::get('flujodocumentos/{id}', [FlujoDeDocumentosController::class, 'show'])->name('flujodocumentos.show');
    Route::get('flujodocumentos/edit/{id}', [FlujoDeDocumentosController::class, 'edit'])->name('flujodocumentos.edit');
    Route::put('flujodocumentos/update/{id}', [FlujoDeDocumentosController::class, 'update'])->name('flujodocumentos.update');
    Route::delete('flujodocumentos/destroy/{id}', [FlujoDeDocumentosController::class, 'destroy'])->name('flujodocumentos.destroy');

    //ruta para tipo de tramite 
    Route::get('tipotramite/', [TipoDeTramiteController::class, 'index'])->name('tipotramite.index');
    Route::post('tipotramite/create', [TipoDeTramiteController::class, 'create'])->name('tipotramite.create');
    Route::post('tipotramite/store', [TipoDeTramiteController::class, 'store'])->name('tipotramite.store');
    Route::get('tipotramite/{id}', [TipoDeTramiteController::class, 'show'])->name('tipotramite.show');
    Route::get('tipotramite/edit/{id}', [TipoDeTramiteController::class, 'edit'])->name('tipotramite.edit');
    Route::put('tipotramite/update/{id}', [TipoDeTramiteController::class, 'update'])->name('tipotramite.update');
    Route::delete('tipotramite/destroy/{id}', [TipoDeTramiteController::class, 'destroy'])->name('tipotramite.destroy');




    Route::get('documents', [DocumentsController::class, 'index'])->name('documents.index');
    Route::post('documents/store', [DocumentsController::class, 'store'])->name('documents.store');
    Route::get('documents/show/{id}', [DocumentsController::class, 'show'])->name('documents.show');
    Route::get('documents/edit/{id}', [DocumentsController::class, 'edit'])->name('documents.edit');
    Route::put('documents/update/{id}', [DocumentsController::class, 'update'])->name('documents.update');
    Route::get('documents/destroy/{id}', [DocumentsController::class, 'destroy'])->name('documents.destroy');

    Route::get('documents/downloadPdf/{id}', [DocumentsController::class, 'downloadPdf']);

    Route::get('documents/recibidos', [DocumentsController::class, 'recibidos'])->name('documents.recibidos');

   
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::post('/get-report-data', [ReportController::class, 'getReportData']);
});
