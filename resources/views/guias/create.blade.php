@extends('app', ['pageTitle' => 'Nueva guía'])
@section('content')
<x-card>
    <form action="{{ route('guias.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="direccionInput" class="form-label">Destino</label>
            <div class="form-control">
                @if( $direccion->exists )
                <input type="hidden" name="direccion_id" value="{{ $direccion->id }}">
                @include('guias.inc.destino')
                <a href="{{ route('guias.create', ['seleccionar-direccion' => $direccion->cliente->nombre_completo]) }}" class="link-primary">Cambiar dirección</a>
                <span class="text-secondary mx-1">|</span>
                <a href="{{ route('clientes.direcciones.create', [$direccion->cliente]) }}" class="link-primary">Nueva dirección</a>

                @else
                <a href="{{ route('guias.create', ['seleccionar-direccion']) }}" class="link-primary">Seleccionar cliente y dirección</a>
                
                @endif
            </div>
        </div>
        @include('guias._form')
        <button type="submit" class="btn btn-success">Crear guia</button>
        <a href="{{ route('guias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</x-card>
@endsection
