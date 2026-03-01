@extends('app', ['pageTitle' => 'Usuarios'])
@section('content')
<nav class="text-end mb-3">
    <a href="{{ route('usuarios.create') }}" class="link-primary">Nuevo usuario</a>
</nav>
<x-card>
    <x-table>
        <x-slot name="thead">
            <tr>
                <th>Nombre</th>
                <th>Tipo</th>
                <th></th>
            </tr>
        </x-slot>

        @foreach ($usuarios as $usuario)
        <tr>
            <td class="text-nowrap">{{ $usuario->name }}</td>
            <td class="text-nowrap">{{ $usuario->typeEnum()->titulo() }}</td>
            <td class="text-end">
                <a href="{{ route('usuarios.edit', $usuario) }}" class="link-primary">Editar</a>
            </td>
        </tr>         
        @endforeach
    </x-table>
</x-card>
@endsection
