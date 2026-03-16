@extends('app', ['pageTitle' => 'Editar guía'])
@section('content')
<x-card class="mb-3">
    <form action="{{ route('guias.update', $guia) }}" method="post" autocomplete="off">
        @csrf
        @method('put')

        @include('guias.inc.input-destino')
        @include('guias._form')

        @if ( $guia->status == 'ingreso' && false )
        <div class="mb-3">
            <label class="form-label">Status</label>
            <div class="form-control mb-3">
                @include('guias.inc.etiqueta-status')<br>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="status_entregado" value="1" id="statusEntregadoInput" @checked($guia)>
                    <label class="form-check-label" for="statusEntregadoInput">
                        <b>ENTREGADO</b>: Activa la casilla para confirmar que la guía ha llegado a su destino.
                    </label>
                </div>
            </div>
        </div>

        @else
        <div class="mb-3">
            <label class="form-label">Status</label><br>
            @include('guias.inc.etiqueta-status')
        </div>

        @endif

        <button type="submit" class="btn btn-success">Actualizar guía</button>
        <a href="{{ route('guias.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>
</x-card>

<div class="text-end">
    <a href="{{ route('guias.confirmar-eliminacion', $guia) }}" class="link-danger">Eliminar guía</a>
</div>
@endsection
