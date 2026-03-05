@extends('app', ['pageTitle' => 'Guía'])
@section('content')
<x-card class="mb-3">
    <div class="d-flex justify-content-between mb-3">
        <div>
            @include('guias.inc.etiqueta-status')
        </div>
        <div>
            <a href="{{ route('guias.edit', $guia) }}" class="link-primary">Editar</a>
        </div>
    </div>

    <div class="row">
        {{-- Cliente y Contacto --}}
        <div class="col-lg">
            <hr class="d-block d-lg-none">
            <h6>Cliente</h6>
            @if ( $guia->tieneDireccion() )
            <div class="mb-3">
                <div class="mb-3">
                    @include('clientes.inc.info-vertical', ['cliente' => $guia->direccion->cliente])
                </div>

                @isset( $guia->numero_rastreo_origen )
                <div class="mb-3">
                    <x-info title="Rastreo de Origen">
                        {{ $guia->numero_rastreo_origen }}
                    </x-info>
                </div>
                @endisset

                @isset( $guia->numero_rastreo_usa )
                <div casa="mb-3">
                    <x-info title="Rastreo en USA">
                        {{ $guia->numero_rastreo_usa }}
                    </x-info>
                </div>
                @endisset
            </div>

            @else  
            <p class="text-muted">* Pendiente</p>

            @endif

            @isset($guia->observaciones)
            <x-info title="Observaciones">
                {{ $guia->observaciones }}
            </x-info>
            @endisset
        </div>

        <!-- Dirección -->
        <div class="col-lg">
            <h6>Dirección</h6>
            @if ( $guia->tieneDireccion() )      
            <address>
                @isset($guia->nombre_contacto)
                <x-info title="Contacto">
                    <span>{{ $guia->nombre_contacto }}, {{ $guia->telefono_contacto }}</span><br>
                </x-info>
                @endisset
                
                @include('direcciones.inc.info-completa-vertical', ['direccion' => $guia->direccion])
            </address>

            <x-info title="Cobertura">
                <span class="text-capitalize">{{ $guia->direccion->cobertura }}</span>  
            </x-info>

            @else
            <p class="text-muted">* Pendiente</p>
            
            @endif
        </div>

        <!-- Transportadora -->
        <div class="col-lg">
            <hr class="d-block d-lg-none">
            <h6>Transportadora</h6>
            @if ( $guia->tieneTransportadora() )
            <div class="mb-3">
                <div class="mb-3">
                    @include('transportadoras.inc.info-vertical', ['transportadora' => $guia->transportadora])
                </div>
                
                <x-info title="Rastreo en México">
                    {{ $guia->numero_rastreo_mex }}
                </x-info>
            </div>

            @else
            <p class="text-muted">* Pendiente</p>

            @endif
        </div>

        <!-- Proceso -->
        <div class="col-lg">
            <hr class="d-block d-lg-none">
            <h6>Proceso</h6>
            <x-info title="Recibido">
                <span>{{ $guia->created_at }}</span><br>   
                <span>{{ $guia->creadoPorUsuario->name }}</span>
            </x-info>

            <x-info title="Salida">
                <span>{{ $guia->registro_salida }}</span><br>
                <span>{{ $guia->fecha_salida }}</span><br>
                <span>{{ $guia->salidaPorUsuario?->name }}</span>
            </x-info>
        </div>
    </div>

    <div class="text-end">
        <a href="{{ route('guias.imprimir', $guia) }}" target="_blank" class="link-primary">Imprimir etiqueta</a>
    </div>
</x-card>
<p class="text-end text-secondary small">Actualizado: {{ $guia->updated_at }} por {{ $guia->actualizadoPorUsuario->name }}</p>
@endsection
