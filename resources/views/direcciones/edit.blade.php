@extends('app', ['pageTitle' => 'Editar dirección'])
@section('content')
<x-info title="Cliente">
    <span>{{ $cliente->nombre_completo }}</span>
    <span class="text-secondary mx-1">|</span>
    <a href="{{ route('clientes.show', $cliente) }}" class="link-primary">Ver cliente</a>
</x-info>

<x-card>
    <form action="{{ route('clientes.direcciones.update', [$cliente, $direccion]) }}" method="post" autocomplete="off">
        @csrf
        @method('put')
        @include('direcciones._form')
        <button type="submit" class="btn btn-success">Actualizar dirección</button>
        <a href="{{ route('clientes.show', $cliente) }}" class="btn btn-secondary">Cancelar</a>
    </form>
</x-card>
@endsection
