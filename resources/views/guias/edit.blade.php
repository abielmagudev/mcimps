@extends('app', ['pageTitle' => 'Editar guía'])
@section('content')
<x-card class="mb-3">
    <p class="text-end">
        <a href="{{ route('guias.show', $guia) }}" class="link-primary">Ver guía</a>
    </p>
    <form action="{{ route('guias.update', $guia) }}" method="post">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="direccionInput" class="form-label">Destino</label>
            <div class="form-control">

                {{-- Nueva direccion --}}
                @if( $direccion->exists )
                <div class="mb-3">
                    @include('clientes.inc.info-horizontal', ['cliente' => $direccion->cliente])
                    @include('direcciones.inc.info-completa-vertical', ['direccion' => $direccion])
                </div>
                <x-info title="Cobertura">
                    <span class="text-capitalize">{{ $direccion->cobertura }}</span>  
                </x-info>
                <div>
                    <a href="{{ route('guias.edit', [$guia, 'seleccionar-direccion' => $direccion->cliente->nombre_completo]) }}" class="link-primary">Cambiar dirección</a>
                    <span class="text-secondary mx-1">|</span>
                    <a href="{{ route('clientes.direcciones.create', [$direccion->cliente, 'guia' => $guia->id]) }}" class="link-primary">Nueva dirección</a>
                    <span class="text-secondary mx-1">|</span>
                    <a href="{{ route('guias.edit', $guia) }}" class="link-primary">Cancelar</a>
                </div>
                <input type="hidden" name="direccion_id" value="{{ $direccion->id }}">

                {{-- Direccion actual --}}
                @elseif ( $guia->tieneDireccion() )

                <div class="mb-3">
                    @include('clientes.inc.info-horizontal', ['cliente' => $guia->direccion->cliente])
                    @include('direcciones.inc.info-completa-vertical', ['direccion' => $guia->direccion])
                </div>
                <x-info title="Cobertura">
                    <span class="text-capitalize">{{ $guia->direccion->cobertura }}</span>  
                </x-info>
                <div>
                    <a href="{{ route('guias.edit', [$guia, 'seleccionar-direccion' => $guia->direccion->cliente->nombre_completo]) }}" class="link-primary">Cambiar dirección</a>
                    <span class="text-secondary mx-1">|</span>
                    <a href="{{ route('clientes.direcciones.create', [$guia->direccion->cliente, 'guia' => $guia->id]) }}" class="link-primary">Nueva dirección</a>
                </div>

                {{-- Sin direccion --}}
                @else
                <a href="{{ route('guias.edit', [$guia, 'seleccionar-direccion']) }}" class="link-primary">Seleccionar cliente y dirección...</a>

                @endif
            </div>
            <x-invalid-feedback name="direccion_id" />
        </div>

        @include('guias._form')

        @if ( $guia->puedeTenerStatusEntregado() || $guia->tieneStatusEntregado() )
        <label class="form-label">Status</label>
        <div class="form-control mb-3">
            @include('guias.inc.etiqueta-status')
        </div>
        <div class="form-control mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="status_entregado" value="1" id="statusEntregadoInput" @checked($guia->tieneStatusEntregado())>
                <label class="form-check-label" for="statusEntregadoInput">
                    <b>ENTREGADO</b>: Activa la casilla para confirmar que la guía ha llegado a su destino.
                </label>
            </div>
        </div>

        @else
        <div class="mb-3">
            <label class="form-label">Status</label>
            <div class="form-control">
                @include('guias.inc.etiqueta-status')
            </div>
        </div>

        @endif

        <button type="submit" class="btn btn-success">Actualizar guia</button>
        <a href="{{ route('guias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</x-card>

<div class="text-end">
    <a href="{{ route('guias.confirmar-eliminacion', $guia) }}" class="link-danger">Eliminar guía</a>
</div>
@endsection
