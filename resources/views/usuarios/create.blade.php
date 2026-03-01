@extends('app', ['pageTitle' => 'Nuevo usuario'])
@section('content')
<x-card>
    <form action="{{ route('usuarios.store') }}" method="post" autocomplete="off">
        @csrf
        @include('usuarios._form')
        <button type="submit" class="btn btn-success">Guardar usuario</button>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</x-card>
@endsection
