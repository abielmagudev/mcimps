<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route( auth()->user()->typeEnum()->routePaginaInicial() );
    });

    Route::resource('clientes', \App\Http\Controllers\ClienteController::class)->middleware('can:viewAny,App\Models\Cliente');

    Route::resource('clientes.direcciones', \App\Http\Controllers\DireccionController::class)->middleware('can:viewAny,App\Models\Direccion')
    ->parameters(['direcciones' => 'direccion'])
    ->except(['show']);

    Route::resource('transportadoras', \App\Http\Controllers\TransportadoraController::class)->except(['show'])->middleware('can:viewAny,App\Models\Transportadora');

    Route::resource('guias', \App\Http\Controllers\GuiaController::class)->middleware('can:viewAny,App\Models\Guia');

    Route::get('registros/usa', [\App\Http\Controllers\RegistroUsa::class, 'create'])->name('registros.usa.create')->middleware('can:registrar-usa');
    Route::post('registros/usa', [\App\Http\Controllers\RegistroUsa::class, 'store'])->name('registros.usa.store')->middleware('can:registrar-usa');
    Route::get('registros/mex', [\App\Http\Controllers\RegistroMex::class, 'search'])->name('registros.mex.search')->middleware('can:registrar-mex');
    Route::get('registros/mex/{guia}', [\App\Http\Controllers\RegistroMex::class, 'edit'])->name('registros.mex.edit')->middleware('can:registrar-mex');
    Route::match(['put', 'patch'], 'registros/mex/{guia}', [\App\Http\Controllers\RegistroMex::class, 'update'])->name('registros.mex.update')->middleware('can:registrar-mex');

    Route::resource('usuarios', \App\Http\Controllers\UsuarioController::class)->parameter('usuarios', 'user')->middleware('can:viewAny,App\Models\Usuario');
    Route::get('usuarios/{user}/confirmar-eliminacion', [\App\Http\Controllers\UsuarioController::class, 'confirmarEliminacion'])->name('usuarios.confirmar-eliminacion')->middleware('can:viewAny,App\Models\Usuario');
});
