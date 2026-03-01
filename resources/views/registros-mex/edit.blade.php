@extends('app', ['pageTitle' => 'Registro de salidas (México)'])
@section('content')
<div style="max-width: 1024px" class="mx-auto">
    <div class="alert alert-secondary mb-3">
        <h5 class="alert-heading mb-3">Guia</h5>
        <div class="row">
            <div class="col-lg">
                <h6>Destino</h6>
                <div class="mb-3">
                    @includeWhen($guia->tieneDireccion(), 'direcciones.inc.direccion-completa-vertical', ['direccion' => $guia->direccion])<br>
                </div>
            </div>
            <div class="col-lg">
                <h6>Cliente</h6>
                <div class="mb-3">
                    @includeWhen($guia->tieneDireccion(), 'clientes.inc.info-vertical', ['cliente' => $guia->direccion->cliente])
                </div>
                <x-info title="Contacto">
                    <span>{{ $guia->nombre_contacto }}</span><br>
                    <span>{{ $guia->telefono_contacto }}</span>
                </x-info>
            </div>
            <div class="col-lg">
                <h6>Transportadora</h6>
                <div class="mb-3">
                    @includeWhen($guia->tieneTransportadora(), 'transportadoras.inc.info-vertical', ['transportadora' => $guia->transportadora])
                </div>
                <x-info title="Cobertura">
                    <span class="text-capitalize">{{ $guia->direccion?->cobertura }}</span>  
                </x-info>
            </div>
            <div class="col-lg">
                <h6>Números de rastreo</h6>
                <x-info title="Origen">
                    {{ $guia->numero_rastreo_origen }}
                </x-info>

                <x-info title="Estados Unidos">
                    {{ $guia->numero_rastreo_usa }}
                </x-info>

                <x-info title="México">
                    {{ $guia->numero_rastreo_mex }}
                </x-info>
            </div>
        </div>
    </div>

    @if ( $guia->tieneStatusEntregado() )
    <div class="alert alert-success text-center">
        <strong>Guía registrada con salida</strong><br>
        <a href="{{ route('registros.mex.search') }}" class="link-primary">Registra otra guía</a>
    </div>

    @elseif ( $guia->puedeTenerRegistroSalida() )
    <x-card>
        <form action="{{ route('registros.mex.update', $guia) }}" method="post" autocomplete="off">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="registroSalidaInput" class="form-label">Escanea o ingresa el codigo para el registro de salida</label>
                <input type="text" class="form-control {{ bsIsInvalidClass('registro_salida') }}" id="registroSalidaInput" name="registro_salida" value="{{ old('registro_salida') }}" autofocus required>
                <x-invalid-feedback name="registro_salida" />
            </div>
            <button type="submit" class="btn btn-success w-100">Registrar salida de guía</button>
        </form>
    </x-card>

    @else
    <div class="alert alert-danger text-center">
        <strong>Guía con información INCOMPLETA. No se puede registrar salida.</strong><br>
        <a href="{{ route('registros.mex.search') }}" class="link-primary">Registra otra guía</a>
    </div>

    @endif
</div>
@endsection
