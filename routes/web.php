<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('clientes', \App\Http\Controllers\ClienteController::class);
Route::resource('clientes.direcciones', \App\Http\Controllers\DireccionController::class)
->parameters(['direcciones' => 'direccion'])
->except(['show']);
