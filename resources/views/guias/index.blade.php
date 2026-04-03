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
                <th style="min-width: 248px;">Dirección</th>
                <th class="text-nowrap">Socio</th>
                <th class="text-nowrap">Transportadora Americana</th>
                {{-- <th class="text-nowrap">Transportadora Mexicana</th> --}}
                <th class="text-nowrap">Número de rastreo en USA</th>
                {{-- @if ($request->get('buscar-por') == 'rastreo') --}}
                <th class="text-nowrap">Número de rastreo secundario</th>
                {{-- @endif --}}
                @if ($request->get('buscar-por') == 'consolidado')
                <th class="text-nowrap">Número de consolidado</th>
                @endif
                <th>Status</th>
                <th></th>
            </tr>
        </x-slot>

        @foreach ($guias as $guia)
        <tr>
            <td class="small text-muted">{{ ($indicePaginacion++) }}</td>
            <td class="text-nowrap">
                {{-- Nombre del cliente directo en la Guia --}}
                <div class="mb-1">
                    @if ( $request->get('buscar-por') == 'cliente' )
                    <span>{!! marker($request->get('buscar'), $guia->nombre_cliente ?? '') !!}</span>
                    
                    @else
                    <span>{{ $guia->nombre_cliente }}</span>
                    
                    @endif
                    <span>{{ $guia->telefono_cliente ? "($guia->telefono_cliente)" : '' }}</span>
                </div>

                {{-- Direccion de la Guia --}}
                @if( $guia->tieneDireccion() )
                <div>
                    @include('direcciones.inc.info-basica-horizontal', [
                        'direccion' => $guia->direccion, 
                        'marcar' => $request->get('buscar-por') == 'direccion' ? $request->get('buscar') : null
                    ])
                    <br>
                    @isset($guia->direccion->codigo_postal)
                    <small>C.P. {{ $guia->direccion->codigo_postal }}</small>
                    @endisset
                    <small><strong class="text-capitalize">({{ $guia->direccion->cobertura }})</strong></small>
                </div>
                @endif
            </td>
            <td class="text-nowrap">
                @if ($guia->tieneDireccion())
                {{ $guia->direccion->socio->nombre }}
                @endif
            </td>
            <td>
                @if($guia->tieneTransportadoraAmericana())
                <a href="{{ $guia->transportadoraAmericana->sitio_web }}" target="_blank" class="link-primary">{{ $guia->transportadoraAmericana->nombre }}</a>
                @endif
            </td>
            {{-- 
            <td>
                @if($guia->tieneTransportadoraMexicana())
                <a href="{{ $guia->transportadoraMexicana->sitio_web }}" target="_blank" class="link-primary">{{ $guia->transportadoraMexicana->nombre }}</a>
                @endif
            </td> 
            --}}
            <td>{!! marker(request('buscar', ''), $guia->numero_rastreo_usa ?? '') !!}</td>
            {{-- @if ($request->get('buscar-por') == 'rastreo') --}}
            <td>{!! marker(request('buscar', ''), $guia->numero_rastreo_secundario ?? '') !!}</td>
            {{-- @endif --}}
            @if ($request->get('buscar-por') == 'consolidado')
            <td>{!! marker(request('buscar', ''), $guia->numero_consolidado ?? '') !!}</td>
            @endif
            <td>
                @include('guias.inc.etiqueta-status')
            </td>
            <td class="text-nowrap text-end" style="width:1%">
                <div class="d-flex gap-2">
                    <a href="{{ route('guias.show', $guia) }}" class="link-primary">Ver</a>
                    <a href="{{ route('guias.edit', [$guia, 'volver' => url()->full()]) }}" class="link-primary">Editar</a>
                    <a href="{{ route('guias.imprimir.etiqueta', $guia) }}" class="link-primary d-none" target="_blank">Imprimir</a>
                </div>

                <div class="dropdown d-none">
                    <button class="btn btn-sm btn-outline-dark border-0 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Opciones
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('guias.show', $guia) }}" class="dropdown-item">Ver</a>
                        </li>
                        <li>
                            <a href="{{ route('guias.edit', [$guia, 'volver' => url()->full()]) }}" class="dropdown-item">Editar</a>
                        </li>
                        <li>
                            <a href="{{ route('guias.imprimir.etiqueta', $guia) }}" class="dropdown-item" target="_blank">Imprimir</a>
                        </li>
                    </ul>
                </div>
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
    <h3 class="mt-5">{{ request()->has('buscar') ? 'Sin resultados de busqueda' : 'No hay guias' }}</h3>
</div>

@endif

@endsection
