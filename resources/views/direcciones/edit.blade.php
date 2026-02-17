@extends('app', ['pageTitle' => 'Editar dirección'])
@section('content')
<x-card>
    @include('clientes._bloque-lectura-formulario')

    <form action="{{ route('clientes.direcciones.update', [$cliente, $direccion]) }}" method="post">
        @csrf
        @method('put')
        @include('direcciones._form')
        <button type="submit" class="btn btn-warning">Actualizar dirección</button>
        <a href="{{ route('clientes.show', $cliente) }}" class="btn btn-secondary">Cancelar</a>
    </form>
</x-card>
@endsection
