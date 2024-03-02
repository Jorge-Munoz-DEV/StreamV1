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

Route::get('/clientes', [App\Http\Controllers\ClienteController::class, 'index'])->name('cliente');

Route::resource('clientess', \App\Http\Controllers\ClienteController::class);

Route::get('/tipos', [App\Http\Controllers\TipoController::class, 'index'])->name('tipos');
