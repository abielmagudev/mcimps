@extends('app', ['pageTitle' => 'Editar dirección'])
@section('content')
<x-card>
    <div class="mb-3">
        <label class="form-label">Cliente</label>
        <input class="form-control" value="{{ $cliente->nombre_completo }} ({{ $cliente->telefono }})" disabled>
    </div>
    <form action="{{ route('clientes.direcciones.update', [$cliente, $direccion]) }}" method="post">
        @csrf
        @method('put')
        @include('direcciones._form')
        <button type="submit" class="btn btn-success">Actualizar dirección</button>
        <a href="{{ route('clientes.show', $cliente) }}" class="btn btn-secondary">Cancelar</a>
    </form>
</x-card>
@endsection
