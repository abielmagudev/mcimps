@extends('app', ['pageTitle' => 'Guía'])
@section('content')
<x-card>
    <div class="d-flex justify-content-between mb-3">
        <div>
            @include('guias.inc.etiqueta-status')
        </div>
        <div>
            <a href="{{ route('guias.edit', $guia) }}" class="link-primary">Editar guía</a>
        </div>
    </div>

    <div class="row">
        <!-- Dirección -->
        <div class="col-lg">
            <h6>Dirección</h6>
            @if ( $guia->tieneDireccion() )      
            <address>
                @include('direcciones.inc.direccion-completa-vertical', ['direccion' => $guia->direccion])
            </address>

            <x-info title="Cobertura">
                <span class="text-capitalize">{{ $guia->direccion->cobertura }}</span>  
            </x-info>

            @else
            <p class="text-muted">* Pendiente</p>
            
            @endif
        </div>
        
        {{-- Cliente y Contacto --}}
        <div class="col-lg">
            <hr class="d-block d-lg-none">
            <h6>Cliente</h6>
            @if ( $guia->tieneDireccion() )
            <div class="mb-3">
                @include('clientes.inc.info-vertical', ['cliente' => $guia->direccion->cliente])
            </div>

            <x-info title="Contacto">
                <span>{{ $guia->nombre_contacto }}</span><br>
                <span>{{ $guia->telefono_contacto }}</span>
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
                @include('transportadoras.inc.info-vertical', ['transportadora' => $guia->transportadora])
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

        {{-- Números de rastreo --}}
        <div class="col-lg">
            <hr class="d-block d-lg-none">
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
                <span>{{ $guia->salida_por_usuario }}</span>
            </x-info>
        </div>
    </div>
</x-card>
<div class="mt-3 text-end text-secondary small">Actualizado: {{ $guia->updated_at }} por {{ $guia->actualizadoPorUsuario->name }}</div>
@endsection
