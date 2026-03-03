@extends('app', ['pageTitle' => 'Clientes'])
@section('content')
<nav class="text-end mb-3">
    <a href="{{ route('clientes.create') }}" class="link-primary">Nuevo cliente</a>
</nav>
<x-card class="mb-3">
    <x-table>
        <x-slot name="thead">
            <tr>
                <th style="min-width: 240px">Nombre completo</th>
                <th>Teléfono</th>
                <th></th>
            </tr>
        </x-slot>

        @foreach ($clientes as $cliente)
        <tr>
            <td class="text-nowrap">{{ $cliente->nombre_completo }}</td>
            <td class="text-nowrap">{{ $cliente->telefono }}</td>
            <td class="text-end">
                <a href="{{ route('clientes.show', $cliente) }}" class="link-primary">Ver</a>
            </td>
        </tr>         
        @endforeach
    </x-table>
</x-card>

<div class="d-flex justify-content-end">
    <x-pagination :collection="$clientes" />
</div>
@endsection
