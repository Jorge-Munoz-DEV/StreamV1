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

Route::resource('cuentas', \App\Http\Controllers\CuentaController::class);
Route::resource('cuentas', \App\Http\Controllers\CuentaController::class)->except(['update']);
Route::put('cuentas/{id}', [\App\Http\Controllers\CuentaController::class, 'update'])->name('cuentas.update');


// Route::get('/ventas', [App\Http\Controllers\TipoController::class, 'index'])->name('ventas');
// Route::get('ventas/{id}/perfiles', [\App\Http\Controllers\VentaController::class, 'perfiles'])->name('ventas.perfiles');
// // Mantén esta línea para la actualización, pero ajusta el nombre de la ruta si es necesario
// Route::put('ventas/{id}', [\App\Http\Controllers\VentaController::class, 'update'])->name('ventas.update');
// Route::resource('ventas', \App\Http\Controllers\VentaController::class)->except(['update']);
// Route::put('ventas/{id}', [\App\Http\Controllers\VentaController::class, 'update'])->name('ventas.update');
// Route::put('ventas/{id}/{id_cuenta}', [\App\Http\Controllers\VentaController::class, 'update'])->name('ventas.update');

// // Route::post('/ventas/store/{id}', 'VentaController@store')->name('ventas.store');
// Route::resource('ventas', \App\Http\Controllers\VentaController::class);



Route::get('/ventas', [App\Http\Controllers\TipoController::class, 'index'])->name('ventas');
Route::get('ventas/{id}/perfiles', [\App\Http\Controllers\VentaController::class, 'perfiles'])->name('ventas.perfiles');

// Rutas para actualizar una venta
Route::put('ventas/{id}', [\App\Http\Controllers\VentaController::class, 'update'])->name('ventas.update');
Route::put('ventas/{id}/{id_cuenta}', [\App\Http\Controllers\VentaController::class, 'updateWithAccount'])->name('ventas.updateWithAccount');

// Resto de las rutas para ventas
Route::resource('ventas', \App\Http\Controllers\VentaController::class)->except(['update']);


Route::resource('clientes', \App\Http\Controllers\ClienteController::class);
Route::resource('clientes', \App\Http\Controllers\ClienteController::class)->except(['update']);
Route::put('clientes/{id}', [\App\Http\Controllers\ClienteController::class, 'update'])->name('clientes.update');

Route::resource('perfiles', \App\Http\Controllers\PerfilesController::class);
Route::resource('perfiles', \App\Http\Controllers\PerfilesController::class)->except(['update']);
Route::put('perfiles/{id}', [\App\Http\Controllers\PerfilesController::class, 'update'])->name('perfiles.update');

Route::get('/tipos', [App\Http\Controllers\TipoController::class, 'index'])->name('tipos');

Auth::routes();
