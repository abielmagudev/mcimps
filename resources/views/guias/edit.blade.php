@extends('app', ['pageTitle' => 'Editar guía'])
@section('content')
<x-card>
    <p class="text-end">
        <a href="{{ route('guias.show', $guia) }}" class="link-primary">Ver guía</a>
    </p>
    <form action="{{ route('guias.update', $guia) }}" method="post">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="direccionInput" class="form-label">Destino</label>
            <div class="form-control">

                @if( $direccion->exists )
                <input type="hidden" name="direccion_id" value="{{ $direccion->id }}">
                @include('guias.inc.destino')
                <a href="{{ route('guias.edit', [$guia, 'seleccionar-direccion' => $direccion->cliente->nombre_completo]) }}" class="link-primary">Cambiar dirección</a>
                <span class="text-secondary mx-1">|</span>
                <a href="{{ route('clientes.direcciones.create', [$direccion->cliente, 'guia' => $guia->id]) }}" class="link-primary">Nueva dirección</a>
                <span class="text-secondary mx-1">|</span>
                <a href="{{ route('guias.edit', $guia) }}" class="link-primary">Cancelar</a>

                @elseif ( $guia->tieneDireccion() )
                @include('guias.inc.destino', ['direccion' => $guia->direccion])
                <a href="{{ route('guias.edit', [$guia, 'seleccionar-direccion' => $guia->direccion->cliente->nombre_completo]) }}" class="link-primary">Cambiar dirección</a>
                <span class="text-secondary mx-1">|</span>
                <a href="{{ route('clientes.direcciones.create', [$guia->direccion->cliente, 'guia' => $guia->id]) }}" class="link-primary">Nueva dirección</a>
                
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
@endsection
