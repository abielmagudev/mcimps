@extends('app', ['pageTitle' => 'Registro de salidas (México)'])
@section('content')
<div class="mx-auto">
    <div class="alert alert-secondary mb-3">
        <h5 class="alert-heading mb-3">Guia</h5>
        <div class="row">

            {{-- Socio --}}
            <div class="col-lg">
                <h6>Socio</h6>
                <div class="mb-3">{{ $guia->direccion?->socio->nombre }}</div>
                <x-info title="Rastreo en USA">
                    {{ $guia->numero_rastreo_usa }}
                </x-info>
            </div>

            {{-- Destino --}}
            <div class="col-lg">
                <h6>Destino</h6>
                @if ($guia->tieneDireccion())              
                <address>
                    @isset($guia->nombre_contacto)
                    <x-info title="Contacto">
                        <span>{{ $guia->nombre_contacto }}</span>
                    </x-info>
                    @endisset
                    
                    @include('direcciones.inc.info-completa-vertical', ['direccion' => $guia->direccion])
                </address>

                @endif
            </div>

            {{-- Transportadora --}}
            <div class="col-lg">
                <h6>Transportadora</h6>
                <div class="mb-3">
                    @if ($guia->tieneTransportadora())
                    {{ $guia->transportadora->nombre }}
                    @endif
                </div>
                <x-info title="Rastreo en México">
                    {{ $guia->numero_rastreo_mex }}
                </x-info>
            </div>
        </div>
    </div>

    @if ( $guia->tieneStatusEntregado() )
    <div class="alert alert-success text-center">
        <strong>Guía registrada con salida</strong><br>
        <a href="{{ route('registros.mex.search') }}" class="link-primary">Registra salida deotra guía</a>
    </div>

    @elseif ( $guia->puedeTenerRegistroSalida() )
    <x-card>
        <form action="{{ route('registros.mex.update', $guia) }}" method="post" autocomplete="off">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="registroSalidaInput" class="form-label">Escanea o ingresa el codigo para el registro de salida</label>
                <input type="text" class="form-control {{ bsInputInvalid('registro_salida') }}" id="registroSalidaInput" name="registro_salida" value="{{ old('registro_salida') }}" autofocus required>
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
