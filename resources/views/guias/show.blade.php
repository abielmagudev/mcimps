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
        <!-- Destino -->
        <div class="col-md col-md-4">
            <h6>Destino</h6>
            @if ( $guia->tieneDireccion() )      
            <address>
                @include('direcciones.inc.info-completa-vertical', ['direccion' => $guia->direccion])
            </address>
            <small class="text-muted">Cliente:</small><br>
            <span>{{ $guia->direccion->cliente->nombre_completo }}</span><br>
            <span>({{ $guia->direccion->cliente->telefono }})</span>

            @else
            <p class="fst-italic">* Sin dirección...</p>

            @endif
        </div>

        <!-- Transportadora -->
        <div class="col-md">
            <hr class="d-block d-md-none">
            <h6>Transportadora</h6>
            @if ( $guia->tieneTransportadora() )
            <div class="mb-2">
                <span>{{ $guia->transportadora->nombre }}</span><br>
                <small>{{ $guia->transportadora->telefono }} |</small>
                <a href="{{ $guia->transportadora->sitio_web }}" target="_blank" class="link-primary small">Sitio Web</a>
            </div>

            @else
            <p class="fst-italic">* Sin transportadora...</p>

            @endif

            <x-info title="Número de rastreo">
                <span>{{ $guia->numero_rastreo_mex }}</span>    
            </x-info>

            <x-info title="Cobertura">
                @if( $guia->tieneDireccion() )
                <span class="text-capitalize">{{ $guia->direccion->cobertura }}</span>  
                
                @else
                <span class="fst-italic">* Requiere dirección...</span>  

                @endif
            </x-info>

            @isset($guia->observaciones)
            <x-info title="Observaciones">
                {{ $guia->observaciones }}    
            </x-info>
            @endisset
        </div>

        <!-- Proceso -->
        <div class="col-md">
            <hr class="d-block d-md-none">
            <h6>Proceso</h6>
            <x-info title="Recibido">
                <span>{{ $guia->created_at }}</span><br>   
                <span>{{ $guia->creado_por_usuario }}</span>   
            </x-info>

            @isset($guia->numero_rastreo_origen)
            <x-info title="Número de rastreo de origen">
                <span>{{ $guia->numero_rastreo_origen }}</span>   
            </x-info>
            @endisset

            <x-info title="Número de rastreo en USA">
                <span>{{ $guia->numero_rastreo_usa }}</span>   
            </x-info>

            <x-info title="Registro de salida">
                <span>{{ $guia->registro_salida }}</span><br>
                <span>{{ $guia->fecha_salida }}</span><br>
                <span>{{ $guia->salida_por_usuario }}</span>
            </x-info>
        </div>
    </div>
</x-card>
<div class="mt-3 text-end text-secondary small">Actualizado: {{ $guia->updated_at }} <br> {{ $guia->actualizado_por_usuario }}</div>
@endsection
