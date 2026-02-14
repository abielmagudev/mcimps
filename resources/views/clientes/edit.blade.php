@extends('app', ['pageTitle' => 'Editar cliente'])
@section('content')
<x-card>
    <form action="{{ route('clientes.update', $cliente) }}" method="post">
        @csrf
        @method('put')
        @include('clientes._form')
        <button type="submit" class="btn btn-warning">Actualizar cliente</button>
        <a href="{{ route('clientes.show', $cliente) }}" class="btn btn-secondary">Cancelar</a>
    </form>
</x-card>
@endsection
