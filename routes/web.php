<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::resource('clientes', \App\Http\Controllers\ClienteController::class);

Route::resource('clientes', \App\Http\Controllers\ClienteController::class)->except(['update']);
Route::put('clientes/{id}', [\App\Http\Controllers\ClienteController::class, 'update'])->name('clientes.update');

Route::get('/tipos', [App\Http\Controllers\TipoController::class, 'index'])->name('tipos');

Auth::routes();