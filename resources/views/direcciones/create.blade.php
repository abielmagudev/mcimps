@extends('app', ['pageTitle' => 'Agregar dirección'])
@section('content')
@include('clientes.inc.bloque-info')
<x-card>
    <form action="{{ route('clientes.direcciones.store', $cliente) }}" method="post">
        @csrf
        @method('post')
        @include('direcciones._form')
        <button type="submit" class="btn btn-success">Agregar dirección</button>
        <a href="{{ route('clientes.show', $cliente) }}" class="btn btn-secondary">Cancelar</a>
    </form>
</x-card>
@endsection
