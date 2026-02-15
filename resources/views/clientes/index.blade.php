@extends('app', ['pageTitle' => 'Clientes'])
@section('content')
<x-card>
    <div class="text-end mb-3">
        <a href="{{ route('clientes.create') }}" class="link-primary">Nuevo cliente</a>
    </div>
    <x-table>
        <x-slot name="thead">
            <tr>
                <th>Nombre completo</th>
                <th>Teléfono</th>
                <th></th>
            </tr>
        </x-slot>

        @foreach ($clientes as $cliente)
        <tr>
            <td>{{ $cliente->nombre_completo }}</td>
            <td>{{ $cliente->telefono }}</td>
            <td class="text-end">
                <a href="{{ route('clientes.show', $cliente) }}" class="link-primary">Ver</a>
            </td>
        </tr>         
        @endforeach
    </x-table>
</x-card>
@endsection
