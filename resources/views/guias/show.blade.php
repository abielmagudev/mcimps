@extends('app', ['pageTitle' => 'Guía'])
@section('content')
<x-card class="mb-3">
    <div class="d-flex justify-content-end gap-3 mb-3">
        <a href="{{ route('guias.imprimir-etiqueta', $guia) }}" target="_blank" class="link-primary">Imprimir etiqueta</a>
        <a href="{{ route('guias.edit', $guia) }}" class="link-primary">Editar</a>
    </div>

    <div class="row">
        {{-- Envio de Guia --}}
        <div class="col-lg">
            <h6 class="fw-bold">Envio</h6>
            <div class="mb-3">
                @include('guias.inc.etiqueta-status')
            </div>

            <div class="mb-3">
                <x-info title="Rastreo en USA">
                    {{ $guia->numero_rastreo_usa }}
                </x-info>

                <div class="mb-3">
                    <x-info title="Rastreo secundario">
                        {{ $guia->numero_rastreo_secundario }}
                    </x-info>
                </div>

                <div class="mb-3">
                    <x-info title="Número de consolidado">
                        {{ $guia->numero_consolidado }}
                    </x-info>
                </div>

                <div class="mb-3">
                    <x-info title="Secuencia de cajas">
                        {{ $guia->secuencia_cajas }}
                    </x-info>
                </div>
            </div>
        </div>

        <!-- Dirección -->
        <div class="col-lg">
            <hr class="d-block d-lg-none">
            <h6 class="fw-bold">Dirección</h6>
            @if ( $guia->tieneDireccion() )      
            <div class="mb-3">
                @include('direcciones.inc.info-completa-vertical', ['direccion' => $guia->direccion])
            </div>

            <div class="mb-3">
                <x-info title="Cliente">
                    <span>{{ $guia->nombre_cliente }}</span><br>
                    <span>{{ $guia->telefono_cliente }}</span>
                </x-info>
            </div>

            <div class="mb-3">
                <x-info title="Socio">
                    @include('socios.inc.info-vertical', ['socio' => $guia->direccion->socio])
                </x-info>
            </div>

            @else
            <p class="text-muted">* Pendiente</p>
            
            @endif
        </div>

        <!-- Transportadora -->
        <div class="col-lg">
            <hr class="d-block d-lg-none">
            <h6 class="fw-bold">Transportadora Americana</h6>
            @if ( $guia->tieneTransportadoraAmericana() )
            <div class="mb-3">
                @include('transportadoras.inc.info-vertical', ['transportadora' => $guia->transportadoraAmericana])
            </div>

            @else
            <p class="text-muted">* Pendiente</p>

            @endif

            <h6 class="fw-bold">Transportadora Mexicana</h6>
            @if ( $guia->tieneTransportadoraMexicana() )
            <div class="mb-3">
                @include('transportadoras.inc.info-vertical', ['transportadora' => $guia->transportadoraMexicana])
            </div>

            @else
            <p class="text-muted">* Pendiente</p>

            @endif
        </div>

        <!-- Proceso -->
        <div class="col-lg">
            <hr class="d-block d-lg-none">
            <h6 class="fw-bold">Proceso</h6>
            <x-info title="Recibido">
                <span>{{ $guia->created_at }}</span><br>   
                <span>{{ $guia->creadoPorUsuario->name }}</span>
            </x-info>

            <x-info title="Ingresado">
                <span>{{ $guia->ingresadoPorUsuario?->name }}</span><br>   
                <span>{{ $guia->fecha_ingreso }}</span>
            </x-info>
        </div>
    </div>

    @isset($guia->observaciones)
    <div class="alert alert-info my-3">
        <h6 class="alert-heading">Observaciones:</h6>
        {{ $guia->observaciones }}
    </div>
    @endisset
</x-card>
<p class="text-end text-secondary small">Actualizado: {{ $guia->updated_at }} por {{ $guia->actualizadoPorUsuario->name }}</p>
@endsection
