@extends('app', ['pageTitle' => 'Nueva guía'])
@section('content')
<x-card>
    <form action="{{ route('guias.store') }}" method="post" autocomplete="off">
        @csrf

        <div class="mb-3">
            <label for="direccionInput" class="form-label">Dirección</label>
            <div class="form-control">
                @if( $direccion->exists )
                <div class="mb-3">
                    @include('direcciones.inc.info-completa-vertical', ['direccion' => $direccion])
                </div>
                <x-info title="Cobertura">
                    <span class="text-capitalize">{{ $direccion->cobertura }}</span>  
                </x-info>
                <div>
                    <a href="{{ route('guias.create', ['seleccionar-direccion' => $direccion->socio->nombre]) }}" class="link-primary">Cambiar dirección</a>
                    <span class="text-secondary mx-1">|</span>
                    <a href="{{ route('socios.direcciones.create', [$direccion->socio]) }}" class="link-primary">Nueva dirección</a>
                </div>
                <input type="hidden" name="direccion_id" value="{{ $direccion->id }}">

                @else
                <a href="{{ route('guias.create', ['seleccionar-direccion']) }}" class="link-primary">Seleccionar Socio y dirección</a>
                
                @endif
            </div>
        </div>

        @include('guias._form')
        <button type="submit" class="btn btn-success">Guardar guia</button>
        <a href="{{ route('guias.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>
</x-card>
@endsection
