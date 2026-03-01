@extends('app', ['pageTitle' => 'Agregar dirección'])
@section('content')
<x-card>
    @include('direcciones.inc._pseudo-input-cliente')
    <form action="{{ route('clientes.direcciones.store', [$cliente, ...request()->query()]) }}" method="post">
        @csrf
        @include('direcciones._form')
        <button type="submit" class="btn btn-success">Agregar dirección</button>
        <a href="{{ route('clientes.show', $cliente) }}" class="btn btn-secondary">Cancelar</a>
    </form>
</x-card>
@endsection
