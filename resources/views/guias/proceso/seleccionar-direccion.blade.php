@extends('app', ['pageTitle' => $guia->exists ? 'Cambiar dirección de guia' : 'Seleccionar dirección de guía'])
@section('content')
{{-- Formulario de búsqueda --}}
<x-card class="mb-3">
    <form action="{{ route('guias.seleccionar-direccion') }}" method="get" class="mb-3">
        <div class="mb-3">
            <label class="form-label">Escribe el nombre del socio, del cliente o la calle</label>
            <input type="text" class="form-control" name="buscar" value="{{ $request->get('buscar') }}" autofocus required>
        </div>
        <button type="submit" class="btn btn-primary">Buscar</button>
        
        @if( $guia->exists )
        <a href="{{ route('guias.edit', $guia)}}" class="btn btn-outline-secondary">Volver</a>
        <input type="hidden" name="guia" value="{{ $guia->id }}">

        @else
        <a href="{{ route('guias.create') }}" class="btn btn-outline-secondary">Cancelar</a>

        @endif
    </form>
    <div class="text-end">
        <a href="{{ route('socios.create', array_filter(['guia' => $guia->id])) }}" class="link-primary">Nuevo socio</a>
    </div>
</x-card>

{{-- Resultados de la busqueda --}}
@if($request->filled('buscar'))
<x-card>
    <div class="mb-3">
        <span class="badge bg-dark">{{ $direcciones->count() }}</span>
        <span class="align-middle">Direcciones encontradas con </span>
        <strong class="align-middle">"{{ $request->get('buscar') }}"</strong>
    </div>
    
    @if ($direcciones->count())
    <x-table>
        <x-slot name="thead">
            <th>Socio</th>
            <th>Dirección</th>
            <th>Cliente</th>
            <th>Cobertura</th>
            <th></th>
        </x-slot>
        <tbody>
            @foreach ($direcciones as $direccion)
            <tr>
                <td>{!! marker($request->get('buscar', ''), $direccion->socio->nombre) !!}</td>         
                <td>
                    @isset($direccion->prellenados['nombre'])
                    {{ $direccion->prellenados['nombre'] }},
                    @endisset
                    {!! marker($request->get('buscar', ''), $direccion->calle) !!}, 
                    {{ $direccion->colonia }}, 
                    {{ $direccion->ciudad }}, 
                    {{ $direccion->estado }}, 
                </td>
                <td>{!! marker($request->get('buscar', ''), $direccion->prellenados['nombre_cliente'] ?? '') !!}</td>
                <td>
                    <span class="text-capitalize">{{ $direccion->cobertura }}</span>
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
    @endif

    @if ($direccionesAgrupadosSocio->count() == 1)
    <?php 
    $parametros = [$direcciones->first()->socio];

    if ( $guia->exists ) {
        $parametros['guia'] = $guia->id;
    } 
    ?>

    <div class="text-end">
        <a href="{{ route('socios.direcciones.create', $parametros) }}" class="link-primary">Nueva dirección</a>
    </div>
    @endif

</x-card>
@endif

@endsection
