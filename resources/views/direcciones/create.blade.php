@extends('app', ['pageTitle' => 'Agregar dirección'])
@section('content')
<x-info title="Cliente">
    <span>{{ $cliente->nombre_completo }}</span>
</x-info>

<x-card>
    <form action="{{ route('clientes.direcciones.store', [$cliente, ...request()->query()]) }}" method="post" autocomplete="off">
        @csrf
        @include('direcciones._form')
        <button type="submit" class="btn btn-success">Agregar dirección</button>
        <a href="{{ route('clientes.show', $cliente) }}" class="btn btn-secondary">Cancelar</a>
    </form>
</x-card>
@endsection
