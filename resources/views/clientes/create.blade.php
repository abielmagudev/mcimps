@extends('app', ['pageTitle' => 'Nuevo cliente'])
@section('content')
<x-card>
    <form action="{{ route('clientes.store') }}" method="post">
        @csrf
        @method('post')
        @include('clientes._form')
        <button type="submit" class="btn btn-success">Guardar cliente</button>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</x-card>
@endsection
