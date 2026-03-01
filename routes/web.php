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

Route::resource('guias', \App\Http\Controllers\GuiaController::class);

Route::get('registros/usa', [\App\Http\Controllers\RegistroUsa::class, 'create'])->name('registros.usa.create');
Route::post('registros/usa', [\App\Http\Controllers\RegistroUsa::class, 'store'])->name('registros.usa.store');
Route::get('registros/mex', [\App\Http\Controllers\RegistroMex::class, 'search'])->name('registros.mex.search');
Route::get('registros/mex/{guia}', [\App\Http\Controllers\RegistroMex::class, 'edit'])->name('registros.mex.edit');
Route::match(['put', 'patch'], 'registros/mex/{guia}', [\App\Http\Controllers\RegistroMex::class, 'update'])->name('registros.mex.update');

Route::resource('usuarios', \App\Http\Controllers\UsuarioController::class)->parameter('usuarios', 'user');
Route::get('usuarios/{user}/confirmar-eliminacion', [\App\Http\Controllers\UsuarioController::class, 'confirmarEliminacion'])->name('usuarios.confirmar-eliminacion');
