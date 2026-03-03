@extends('app', ['pageTitle' => 'Nueva guía'])
@section('content')
<x-card>
    <form action="{{ route('guias.store') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="direccionInput" class="form-label">Dirección</label>
            <div class="form-control">
                @if( $direccion->exists )
                <x-info title="Cobertura">
                    <span class="text-capitalize">{{ $direccion->cobertura }}</span>  
                </x-info>
                <div class="mb-3">
                    @include('clientes.inc.info-horizontal', ['cliente' => $direccion->cliente])
                    @include('direcciones.inc.direccion-completa-vertical', ['direccion' => $direccion])
                </div>
                <div>
                    <a href="{{ route('guias.create', ['seleccionar-direccion' => $direccion->cliente->nombre_completo]) }}" class="link-primary">Cambiar dirección</a>
                    <span class="text-secondary mx-1">|</span>
                    <a href="{{ route('clientes.direcciones.create', [$direccion->cliente]) }}" class="link-primary">Nueva dirección</a>
                </div>
                <input type="hidden" name="direccion_id" value="{{ $direccion->id }}">

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
