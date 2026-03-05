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
                <th>Contacto</th>
                <th style="min-width: 248px;">Direccion</th>
                <th>Cobertura</th>
                <th>Transportadora</th>
                @if ($request->has('rastreo'))
                <th class="text-nowrap">Rastreo de origen</th>
                @endif
                <th class="text-nowrap">Rastreo en Estados Unidos</th>
                <th class="text-nowrap">Rastreo en México</th>
                <th class="text-nowrap">Registro de salida</th>
                <th>Status</th>
                <th></th>
            </tr>
        </x-slot>

        @foreach ($guias as $index => $guia)
        <tr>
            <td class="small text-muted">{{ ($index+1) }}</td>
            <td class="text-nowrap">
                <span>{{ $guia->nombre_contacto ?? '' }}</span><br>
                <span>{{ $guia->telefono_contacto ?? '' }}</span>
            </td>
            <td>
                @includeWhen($guia->tieneDireccion(), 'direcciones.inc.info-basica-horizontal', ['direccion' => $guia->direccion])
            </td>
            <td class="text-capitalize">{{ $guia->direccion?->cobertura }}</td>
            <td>
                @if($guia->tieneTransportadora())
                <a href="{{ $guia->transportadora->sitio_web }}" target="_blank" class="link-primary">{{ $guia->transportadora->nombre }}</a>
                @endif
            </td>
            @if ($request->has('rastreo'))
            <td>{!! marker(request('rastreo', ''), $guia->numero_rastreo_origen ?? '') !!}</td>
            @endif
            <td>{!! marker(request('rastreo', ''), $guia->numero_rastreo_usa ?? '') !!}</td>
            <td>{!! marker(request('rastreo', ''), $guia->numero_rastreo_mex ?? '') !!}</td>
            <td>{!! marker(request('rastreo', ''), $guia->registro_salida ?? '') !!}</td>
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
    <h3>{{ request()->has('rastreo') ? 'Sin resultados' : 'No hay guías activas' }}</h3>
    <a href="{{ route('guias.create') }}" class="link-primary">Crear nueva guia</a>
</div>
@endif

@endsection
