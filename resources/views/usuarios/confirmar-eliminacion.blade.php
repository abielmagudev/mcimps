@extends('app')
@section('content')
<div style="max-width: 1024px" class="mx-auto">
    <x-card>
        <div class="text-center mb-3">
            <h1 class="text-danger mb-3">ADVERTENCIA</h1>
            <p class="mb-5">¿Deseas continuar con la eliminación del usuario <br> <strong>{{ $user->name }} ({{ $user->typeEnum()->titulo() }})</strong>?</p>

            <form action="{{ route('usuarios.destroy', $user) }}" method="post" class="text-center">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-outline-danger">Eliminar usuario</button>
                <a href="{{ route('usuarios.edit', $user) }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </x-card>
</div>
@endsection
