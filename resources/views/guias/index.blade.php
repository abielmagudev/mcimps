@extends('app', ['pageTitle' => 'Guías'])
@section('content')

@if ( $guias->count() )
<nav class="text-end mb-3">
    <a href="{{ route('guias.create') }}" class="link-primary">Nueva guia</a>
</nav>
<x-card>
    <p>
        @foreach ($statuses as $status)
        <a href="{{ route('guias.index', ['status' => $status]) }}" class="link-primary me-2">
            <span>({{ $contadores[$status->value] }})</span>
            {{ ucfirst($status->value) }}
        </a>
        @endforeach
    </p>

    <x-table>
        <x-slot name="thead">
            <tr>
                <th>#</th>
                <th style="min-width: 248px;">Direccion</th>
                <th class="text-nowrap">Rastreo Origen</th>
                <th class="text-nowrap">Rastreo USA</th>
                <th class="text-nowrap">Rastreo MEX</th>
                <th>Transportadora</th>
                <th>Cobertura</th>
                <th>Status</th>
                <th></th>
            </tr>
        </x-slot>

        @foreach ($guias as $guia)
        <tr>
            <td>{{ $guia->id }}</td>
            <td>{{ $guia->direccion->lineal }}</td>
            <td>{!! marker(request('rastreo', ''), $guia->numero_rastreo_origen ?? '') !!}</td>
            <td>{!! marker(request('rastreo', ''), $guia->numero_rastreo_usa ?? '') !!}</td>
            <td>{!! marker(request('rastreo', ''), $guia->numero_rastreo_mex ?? '') !!}</td>
            <td>
                @isset($guia->transportadora)
                <a href="{{ $guia->transportadora->sitio_web }}" target="_blank" class="link-primary">{{ $guia->transportadora->nombre }}</a>
                @endisset
            </td>
            <td class="text-capitalize">{{ $guia->direccion->cobertura }}</td>
            <td>
                @include('guias.inc.etiqueta-status')
            </td>
            <td>
                <div class="d-flex justify-content-between flex-nowrap gap-1">
                    <!-- <a href="{{ route('guias.show', $guia) }}" class="link-primary">Ver</a> -->
                    <a href="{{ route('guias.edit', $guia) }}" class="link-primary">Editar</a>
                </div>
            </td>
        </tr>         
        @endforeach
    </x-table>
</x-card>

@else
<div class="text-center">
    <h3>No hay guías activas</h3>
    <a href="{{ route('guias.create') }}" class="link-primary">Crear nueva guia</a>
</div>
@endif


@endsection
