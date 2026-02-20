@extends('app', ['pageTitle' => 'Guías'])
@section('content')

@if ( $guias->count() )
<nav class="text-end mb-3">
    <a href="{{ route('guias.create') }}" class="link-primary">Nueva guia</a>
</nav>
<x-card>
    <x-table>
        <x-slot name="thead">
            <tr>
                <th>Número</th>
                <th>Direccion</th>
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
            <td>{{ $guia->transportadora?->nombre }}</td>
            <td class="text-capitalize">{{ $guia->direccion->cobertura }}</td>
            <td>
                @include('guias.inc.etiqueta-status')
            </td>
            <td class="text-end">
                <a href="{{ route('guias.edit', $guia) }}" class="link-primary">Editar</a>
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
