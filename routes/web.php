<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('clientes', \App\Http\Controllers\ClienteController::class);

Route::resource('clientes.direcciones', \App\Http\Controllers\DireccionController::class)
->parameters(['direcciones' => 'direccion'])
->except(['show']);

Route::resource('transportadoras', \App\Http\Controllers\TransportadoraController::class)->except(['show']);

// Route::resource('guias', \App\Http\Controllers\GuiaController::class);
Route::resource('guias', \App\Http\Controllers\GuiaController::class)->except(['create', 'store', 'show']);
Route::get('guias/create/{cliente?}/{direccion?}', \App\Http\Controllers\GuiaController::class . '@create')->name('guias.create');
Route::post('guias/store/{cliente}/{direccion}', \App\Http\Controllers\GuiaController::class . '@store')->name('guias.store');
