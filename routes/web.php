<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    // USUARIOS
    // Route::get('usuarios/{user}/confirmar-eliminacion', [\App\Http\Controllers\UsuarioController::class, 'confirmarEliminacion'])
    // ->name('usuarios.confirmar-eliminacion')
    // ->middleware('can:viewAny,App\Models\Usuario');
    Route::resource('usuarios', \App\Http\Controllers\UsuarioController::class)->parameter('usuarios', 'user')
    ->middleware('can:viewAny,App\Models\Usuario');

    // SOCIOS
    Route::resource('socios', \App\Http\Controllers\SocioController::class)
    ->middleware('can:viewAny,App\Models\Socio');

    // DIRECCIONES
    Route::resource('socios.direcciones', \App\Http\Controllers\DireccionController::class)
    ->middleware('can:viewAny,App\Models\Direccion')
    ->parameters(['direcciones' => 'direccion'])
    ->except(['show']);

    // TRANSPORTADORAS
    Route::resource('transportadoras', \App\Http\Controllers\TransportadoraController::class)
    ->except(['show'])
    ->middleware('can:viewAny,App\Models\Transportadora');

    // GUIAS
    Route::get('guias/exportar', [\App\Http\Controllers\GuiaExportarController::class, 'lista'])
    ->name('guias.exportar.lista')
    ->middleware('can:viewAny,App\Models\Guia');

    Route::get('guias/seleccionar-direccion', [\App\Http\Controllers\GuiaProcesoController::class, 'seleccionarDireccion'])
    ->name('guias.seleccionar-direccion')
    ->middleware('can:viewAny,App\Models\Guia');

    Route::resource('guias', \App\Http\Controllers\GuiaController::class)
    ->middleware('can:viewAny,App\Models\Guia');

    Route::get('guias/{guia}/imprimir/etiqueta', [\App\Http\Controllers\GuiaImpresionController::class, 'etiqueta'])
    ->name('guias.imprimir.etiqueta')
    ->middleware('can:viewAny,App\Models\Guia');

    Route::get('guias/{guia}/confirmar-eliminacion', [\App\Http\Controllers\GuiaController::class, 'confirmarEliminacion'])
    ->name('guias.confirmar-eliminacion')
    ->middleware('can:viewAny,App\Models\Guia');

    // REGISTRO USA
    Route::get('registros/usa', [\App\Http\Controllers\RegistroUsa::class, 'create'])->name('registros.usa.create')
    ->middleware('can:registrar-usa');
    Route::post('registros/usa', [\App\Http\Controllers\RegistroUsa::class, 'store'])->name('registros.usa.store')
    ->middleware('can:registrar-usa');

    // REGISTRO MEX
    Route::get('registros/mex', [\App\Http\Controllers\RegistroMex::class, 'search'])->name('registros.mex.search')
    ->middleware('can:registrar-mex');
    Route::get('registros/mex/{guia}', [\App\Http\Controllers\RegistroMex::class, 'edit'])->name('registros.mex.edit')
    ->middleware('can:registrar-mex');
    Route::match(['put', 'patch'], 'registros/mex/{guia}', [\App\Http\Controllers\RegistroMex::class, 'update'])
    ->name('registros.mex.update')->middleware('can:registrar-mex');

    // PAGINA DE INICIO
    Route::get('/', fn () => redirect()->route( auth()->user()->typeEnum()->routePaginaInicial() ));
});
