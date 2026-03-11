@extends('app', ['pageTitle' => 'Editar dirección'])
@section('content')
<x-info title="Socio">
    <span>{{ $socio->nombre }}</span>
    <span class="text-secondary mx-1">|</span>
    <a href="{{ route('socios.show', $socio) }}" class="link-primary">Ver Socio</a>
</x-info>

<x-card>
    <form action="{{ route('socios.direcciones.update', [$socio, $direccion]) }}" method="post" autocomplete="off">
        @csrf
        @method('put')
        @include('direcciones._form')
        <button type="submit" class="btn btn-success">Actualizar dirección</button>
        <a href="{{ route('socios.show', $socio) }}" class="btn btn-secondary">Cancelar</a>
    </form>
</x-card>
@endsection
