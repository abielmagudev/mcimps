@extends('app', ['pageTitle' => 'Nueva guía'])
@section('content')

<div class="alert alert-secondary mb-3">
    <h5 class="alert-heading mb-3">Destino</h5>
    @include('guias.inc.destino')
</div>

<x-card>
    <form action="{{ route('guias.store', [$cliente, $direccion]) }}" method="post">
        @csrf
        @include('guias._form')
        <button type="submit" class="btn btn-success">Crear guia</button>
        <a href="{{ route('guias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</x-card>
@endsection
