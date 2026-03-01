@extends('app', ['pageTitle' => 'Editar usuario'])
@section('content')
<x-card class="mb-3">
    <form action="{{ route('usuarios.update', $user) }}" method="post" autocomplete="off">
        @csrf
        @method('put')
        @include('usuarios._form')
        <button type="submit" class="btn btn-success">Actualizar usuario</button>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</x-card>
<div class="text-end">
    <a href="{{ route('usuarios.confirmar-eliminacion', $user) }}" class="link-danger">Eliminar usuario</a>
</div>
@endsection
