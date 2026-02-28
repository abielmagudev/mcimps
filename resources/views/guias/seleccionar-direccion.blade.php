@extends('app', ['pageTitle' => $guia->exists ? 'Cambiar dirección de esta guía' : 'Seleccionar dirección para nueva guía'])
@section('content')
<x-card class="mb-3">
    <form action="{{ $guia->exists ? route('guias.edit', $guia) : route('guias.create') }}" method="get" class="mb-3">
        <div class="mb-3">
            <label class="form-label">Escribe la calle de la dirección o el nombre del cliente</label>
            <input type="text" class="form-control" name="seleccionar-direccion" value="{{ $request->get('seleccionar-direccion') }}" autofocus required>
        </div>
        <button type="submit" class="btn btn-primary">Buscar</button>
        <a href="{{ $guia->exists ? route('guias.edit', $guia) : route('guias.create') }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>
    <div class="text-end">
        <a href="{{ route('clientes.create', $guia->exists ? ['guia' => $guia->id] : []) }}" class="link-primary">Nuevo cliente</a>
    </div>
</x-card>

@isset($direcciones)
@if( $direcciones->count() )
<x-card>
    <div class="mb-3">
        <span class="badge bg-dark">{{ $direcciones->count() }}</span>
        <span class="align-middle">Direcciones encontradas con <strong>"{{ $request->get('seleccionar-direccion') }}"</strong></span>
    </div>
    <x-table>
        <x-slot name="thead">
            <th>Información</th>
            <th>Cobertura</th>
            <th>Cliente</th>
            <th></th>
        </x-slot>
        <tbody>
            @foreach ($direcciones as $direccion)
            <tr>
                <td>
                    {!! marker($request->get('seleccionar-direccion'), $direccion->calle) !!}, 
                    {{ $direccion->colonia }}, 
                    col. {{ $direccion->ciudad }}, 
                    {{ $direccion->estado }} 
                    C.P. {{ $direccion->codigo_postal }}
                </td>
                <td>
                    <span class="text-capitalize">{{ $direccion->cobertura }}</span>
                </td>
                <td>
                    {!! marker($request->get('seleccionar-direccion'), $direccion->cliente->nombre_completo) !!}
                </td>
                <td class="text-end">
                    @if( $guia->exists )
                    <a href="{{ route('guias.edit', [$guia, 'direccion' => $direccion->id]) }}" class="link-primary">Seleccionar</a>
                    
                    @else
                    <a href="{{ route('guias.create', ['direccion' => $direccion->id]) }}" class="link-primary">Seleccionar</a>

                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </x-table>

    @if ($clientesDirecciones->count() == 1)
    <?php
        $parametros = [$direcciones->first()->cliente];

        if( $guia->exists ) {
            $parametros['guia'] = $guia->id;
        }
    ?>
    <div class="text-end">
        <a href="{{ route('clientes.direcciones.create', $parametros) }}" class="link-primary">Nueva dirección</a>
    </div>
    @endif
</x-card>

@else
<div class="alert alert-warning text-center">
    <span>No hay direcciones ni clientes: <strong><em>"{{ $request->get('seleccionar-direccion') }}"</em></strong></span><br>
</div>  

@endif
@endisset

@endsection
