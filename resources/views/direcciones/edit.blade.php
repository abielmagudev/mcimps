@extends('app', ['pageTitle' => 'Editar dirección'])
@section('content')
@include('clientes.inc.bloque-info')
<x-card>
    <form action="{{ route('clientes.direcciones.update', [$cliente, $direccion]) }}" method="post">
        @csrf
        @method('put')
        @include('direcciones._form')
        <button type="submit" class="btn btn-warning">Actualizar dirección</button>
        <a href="{{ route('clientes.show', $cliente) }}" class="btn btn-secondary">Cancelar</a>
    </form>
</x-card>
@endsection
