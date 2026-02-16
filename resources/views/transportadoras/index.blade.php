@extends('app', ['pageTitle' => 'Transportadoras'])
@section('content')
<nav class="text-end mb-3">
    <a href="{{ route('transportadoras.create') }}" class="link-primary">Nueva transportadora</a>
</nav>
<x-card>
    <x-table>
        <x-slot name="thead">
            <tr>
                <th>Nombre</th>
                <th>Sitio Web</th>
                <th>Teléfono</th>
                <th></th>
            </tr>
        </x-slot>

        @foreach ($transportadoras as $transportadora)
        <tr>
            <td>{{ $transportadora->nombre }}</td>
            <td>
                <a href="{{ $transportadora->sitio_web }}" target="_blank" class="link-primary">{{ $transportadora->sitio_web }}</a>
            </td>
            <td>{{ $transportadora->telefono }}</td>
            <td class="text-end">
                <a href="{{ route('transportadoras.edit', $transportadora) }}" class="link-primary">Editar</a>
            </td>
        </tr>         
        @endforeach
    </x-table>
</x-card>
@endsection
