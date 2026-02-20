@extends('app', ['pageTitle' => 'Nueva guía'])
@section('content')

@if ( $request->filled('cliente') && $clientes->count() == 0)
<div class="alert alert-warning text-center">
    <span>No hay clientes con el nombre o teléfono: <strong><em>"{{ $request->get('cliente') }}"</em></strong></span>
</div>
@endif

@if ($clientes->count() )
<x-card>
    <p>
        <span class="badge bg-dark">{{ $clientes->count() }}</span>
        <span class="align-middle">Encontrados con <strong>"{{ $request->get('cliente') }}"</strong></span>
    </p>
    <x-table>
        <x-slot name="thead">
            <th>Nombre</th>
            <th>Teléfono</th>
            <th></th>
        </x-slot>
        <tbody>
            @foreach ($clientes as $cliente)
            <tr>
                <td>{{ $cliente->nombre_completo }}</td>
                <td>{{ $cliente->telefono }}</td>
                <td class="text-end">
                    <a href="{{ route('guias.create', ['cliente' => $cliente]) }}" class="link-primary">Seleccionar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </x-table>
</x-card>
<nav class="text-end my-3">
    <span class="text-secondary me-1">No es el cliente que buscabas?</span>
    <a href="{{ route('clientes.create') }}" class="link-primary">Nuevo cliente</a>
</nav>

@else
<x-card>
    <form action="{{ route('guias.create') }}" method="get">
        <div class="mb-3">
            <label class="form-label">Nombre o teléfono del cliente</label>
            <input type="text" class="form-control" name="cliente" value="{{ $request->get('cliente') }}" autofocus required>
        </div>
        <button type="submit" class="btn btn-primary">Buscar cliente</button>
        <a href="{{ route('guias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</x-card>
<nav class="text-end my-3">
    <a href="{{ route('clientes.create') }}" class="link-primary">Nuevo cliente</a>
</nav>

@endif

@endsection
