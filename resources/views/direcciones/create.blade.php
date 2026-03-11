@extends('app', ['pageTitle' => 'Agregar dirección'])
@section('content')
<x-info title="Socio">
    <span>{{ $socio->nombre }}</span>
</x-info>

<x-card>
    <form action="{{ route('socios.direcciones.store', [$socio, ...request()->query()]) }}" method="post" autocomplete="off">
        @csrf
        @include('direcciones._form')
        <button type="submit" class="btn btn-success">Agregar dirección</button>
        <a href="{{ route('socios.show', $socio) }}" class="btn btn-secondary">Cancelar</a>
    </form>
</x-card>
@endsection
