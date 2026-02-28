@extends('app', ['pageTitle' => 'Agregar dirección'])
@section('content')
<x-card>
    <div class="mb-3">
        <label class="form-label">Cliente</label>
        <input class="form-control" value="{{ $cliente->nombre_completo }} ({{ $cliente->telefono }})" disabled>
    </div>

    <form action="{{ route('clientes.direcciones.store', [$cliente, ...request()->query()]) }}" method="post">
        @csrf
        @include('direcciones._form')
        <button type="submit" class="btn btn-success">Agregar dirección</button>
        <a href="{{ route('clientes.show', $cliente) }}" class="btn btn-secondary">Cancelar</a>
    </form>
</x-card>
@endsection
