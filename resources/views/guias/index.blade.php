@extends('app', ['pageTitle' => 'Guías'])
@section('content')

@include('guias.index.barra-filtros-links')
@if ( $guias->count() )
<x-card class="mb-3">
    <p>
        <span class="badge bg-dark">{{ $guias->total() }}</span>
        <span class="align-middle">Guías encontradas</span>   
    </p>
    <x-table class="table-sm table-hover">
        <x-slot name="thead">
            <tr>
                <th></th>
                <th style="min-width: 248px;">Destino</th>
                <th class="text-nowrap">Transportadora Americana</th>
                <th class="text-nowrap">Transportadora Mexicana</th>
                <th class="text-nowrap">Número de rastreo en USA</th>
                @if ($request->has('rastreo'))
                <th class="text-nowrap">Número de rastreo secundario</th>
                @endif
                <th>Status</th>
                <th></th>
            </tr>
        </x-slot>

        @foreach ($guias as $index => $guia)
        <tr>
            <td class="small text-muted">{{ ($index+1) }}</td>
            <td class="text-nowrap">
                @if( $guia->tieneDireccion() )
                <div>
                    @isset ( $guia->nombre_cliente )
                    <span>{{ $guia->nombre_cliente }}</span>
                    <span>{{ $guia->telefono_cliente ? "($guia->telefono_cliente)" : '' }}</span><br>
                    @endisset
                    
                    @include('direcciones.inc.info-basica-horizontal', ['direccion' => $guia->direccion])
                </div>
                <small>C.P. {{ $guia->direccion->codigo_postal ?? '' }} <strong class="text-capitalize">({{ $guia->direccion->cobertura }})</strong></small>
                @endif
            </td>
            <td>
                @if($guia->tieneTransportadoraAmericana())
                <a href="{{ $guia->transportadoraAmericana->sitio_web }}" target="_blank" class="link-primary">{{ $guia->transportadoraAmericana->nombre }}</a>
                @endif
            </td>
            <td>
                @if($guia->tieneTransportadoraMexicana())
                <a href="{{ $guia->transportadoraMexicana->sitio_web }}" target="_blank" class="link-primary">{{ $guia->transportadoraMexicana->nombre }}</a>
                @endif
            </td>
            <td>{!! marker(request('rastreo', ''), $guia->numero_rastreo_usa ?? '') !!}</td>
            @if ($request->has('rastreo'))
            <td>{!! marker(request('rastreo', ''), $guia->numero_rastreo_secundario ?? '') !!}</td>
            @endif
            <td>
                @include('guias.inc.etiqueta-status')
            </td>
            <td class="text-nowrap text-end" style="width:1%">
                <a href="{{ route('guias.show', $guia) }}" class="link-primary me-1">Ver</a>
                <a href="{{ route('guias.edit', $guia) }}" class="link-primary">Editar</a>
            </td>
        </tr>         
        @endforeach
    </x-table>
</x-card>

<div class="d-flex justify-content-end">
    <x-pagination :collection="$guias" />
</div>

@else
<div class="text-center">
    <h3 class="mt-5">{{ request()->has('rastreo') ? 'Sin resultados' : 'No hay guías activas' }}</h3>
</div>
@endif

@endsection
