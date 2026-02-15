@extends('app', ['pageTitle' => 'Nueva dirección'])
@section('content')
<x-card>
    <form action="{{ route('clientes.direcciones.store', $cliente) }}" method="post">
        @csrf
        @method('post')
        @include('direcciones._form')
        <button type="submit" class="btn btn-success">Guardar dirección</button>
        <a href="{{ route('clientes.show', $cliente) }}" class="btn btn-secondary">Cancelar</a>
    </form>
</x-card>
@endsection
