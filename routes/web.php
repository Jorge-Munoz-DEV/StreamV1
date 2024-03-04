<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<<<<<<< Updated upstream
Route::get('/clientes', [App\Http\Controllers\ClienteController::class, 'index'])->name('cliente');

Route::resource('clientess', \App\Http\Controllers\ClienteController::class);
=======
Route::resource('cuentas', \App\Http\Controllers\CuentaController::class);
Route::resource('cuentas', \App\Http\Controllers\CuentaController::class)->except(['update']);
Route::put('cuentas/{id}', [\App\Http\Controllers\CuentaController::class, 'update'])->name('cuentas.update');

Route::resource('clientes', \App\Http\Controllers\ClienteController::class);
Route::resource('clientes', \App\Http\Controllers\ClienteController::class)->except(['update']);
Route::put('clientes/{id}', [\App\Http\Controllers\ClienteController::class, 'update'])->name('clientes.update');
>>>>>>> Stashed changes

Route::get('/tipos', [App\Http\Controllers\TipoController::class, 'index'])->name('tipos');
