@extends('app', ['pageTitle' => 'Socios'])
@section('content')
<nav class="text-end mb-3">
    <a href="{{ route('socios.create') }}" class="link-primary">Nuevo socio</a>
</nav>
<x-card class="mb-3">
    <x-table>
        <x-slot name="thead">
            <tr>
                <th style="min-width: 240px">Nombre</th>
                <th>Teléfono</th>
                <th></th>
            </tr>
        </x-slot>

        @foreach ($socios as $socio)
        <tr>
            <td class="text-nowrap">{{ $socio->nombre }}</td>
            <td class="text-nowrap">{{ $socio->telefono }}</td>
            <td class="text-end">
                <a href="{{ route('socios.show', $socio) }}" class="link-primary">Ver</a>
            </td>
        </tr>         
        @endforeach
    </x-table>
</x-card>

<div class="d-flex justify-content-end">
    <x-pagination :collection="$socios" />
</div>
@endsection
