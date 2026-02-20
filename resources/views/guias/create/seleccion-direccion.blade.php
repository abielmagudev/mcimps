@extends('app', ['pageTitle' => 'Nueva guía'])
@section('content')

<div class="alert alert-secondary mb-3">
    <h5 class="alert-heading mb-3">Destino</h5>
    <small class="text-secondary">Cliente</small><br>
    <span>{{ $cliente->nombre_completo }} ({{ $cliente->telefono }})</span>
</div>

<x-card>
    @if ( $cliente->direcciones->count() )
    <p>Seleccione una dirección</p>
    <x-table>
        <x-slot name="thead">
            <th>Información</th>
            <th>Contacto</th>
            <th>Cobertura</th>
            <th></th>
        </x-slot>
        <tbody>
            @foreach ($cliente->direcciones as $direccion)
            <tr>
                <td>
                    @include('direcciones.inc.bloque-info')
                </td>
                <td>
                    @include('direcciones.inc.bloque-contacto')
                </td>
                <td>
                    <span class="text-capitalize">{{ $direccion->cobertura }}</span>
                </td>
                <td class="text-end">
                    <a href="{{ route('guias.create', ['cliente' => $cliente, 'direccion' => $direccion]) }}" class="link-primary">Seleccionar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </x-table>

    @else
    <p>No hay direcciones para este cliente</p>

    @endif
</x-card>

<nav class="text-end my-3">
    <span class="text-secondary me-1">No es la dirección que buscabas?</span>
    <a href="{{ route('clientes.direcciones.create', $cliente) }}" class="link-primary">Nueva dirección</a>
</nav>
@endsection
