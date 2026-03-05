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
                <th style="min-width: 248px;">Direccion</th>
                <th class="text-nowrap">Origen</th>
                <th class="text-nowrap">Estados Unidos</th>
                <th class="text-nowrap">México</th>
                <th class="text-nowrap">Salida</th>
                <th>Transportadora</th>
                <th>Cobertura</th>
                <th>Status</th>
                <th></th>
            </tr>
        </x-slot>

        @foreach ($guias as $index => $guia)
        <tr>
            <td class="small text-muted">{{ ($index+1) }}</td>

            <td>
                @includeWhen($guia->tieneDireccion(), 'direcciones.inc.info-basica-horizontal', ['direccion' => $guia->direccion])
            </td>
            <td>{!! marker(request('rastreo', ''), $guia->numero_rastreo_origen ?? '') !!}</td>
            <td>{!! marker(request('rastreo', ''), $guia->numero_rastreo_usa ?? '') !!}</td>
            <td>{!! marker(request('rastreo', ''), $guia->numero_rastreo_mex ?? '') !!}</td>
            <td>{!! marker(request('rastreo', ''), $guia->registro_salida ?? '') !!}</td>
            <td>
                @if($guia->tieneTransportadora())
                <a href="{{ $guia->transportadora->sitio_web }}" target="_blank" class="link-primary">{{ $guia->transportadora->nombre }}</a>
                @endif
            </td>
            <td class="text-capitalize">{{ $guia->direccion?->cobertura }}</td>
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
