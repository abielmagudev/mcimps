@extends('app', ['pageTitle' => 'Nuevo cliente'])
@section('content')
<x-card>
    <form action="{{ route('clientes.store', request()->query()) }}" method="post">
        @csrf
        @include('clientes._form')
        <button type="submit" class="btn btn-success">Guardar cliente</button>
        <a href="{{ request()->filled('guia') ? route('guias.edit', request()->get('guia')) : route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</x-card>
@endsection
