
@php

$argumentos = [];

if( $direccion->exists ) {
    $argumentos['buscar'] = $direccion->socio->nombre;
}

if( $guia->exists ) {
    $argumentos['guia'] = $guia->id;

    if( $guia->tieneDireccion() &&! isset($argumentos['buscar']) ) {
        $argumentos['buscar'] = $guia->direccion->socio->nombre;
    }
}

@endphp
<div class="mb-3">
    <div class="d-flex justify-content-between">
        <label class="form-label">Dirección</label>
        {{-- Links para seleccionar dirección --}}
        <div class="d-flex gap-3">
            <a href="{{ route('guias.seleccionar-direccion', $argumentos) }}" class="link-primary">
                {{ isset($argumentos['buscar']) ? 'Cambiar dirección' : 'Seleccionar dirección' }}
            </a>

            @if( $direccion->exists )
            <a href="{{ $guia->exists ? route('guias.edit', $guia) : route('guias.create')}}" class="link-secondary">Cancelar</a>
            @endif
        </div>   
    </div>

    @if ( $direccion->exists || $guia->tieneDireccion() )
    <div class="form-control">
        <div class="row">
            <div class="col-md mb-3">
                <h6>Dirección</h6>
                @include('direcciones.inc.info-completa-vertical', ['direccion' => $direccion->exists ? $direccion : $guia->direccion ])
                <div class="small">
                    <span>Cobertura:</span> <b class="text-capitalize">{{ $direccion?->cobertura ?? $guia->direccion->cobertura }}</b>
                </div>
            </div>
            <div class="col-md mb-3">
                <h6>Cliente predefinido</h6>
                <span>{{ $direccion?->prellenado('nombre_cliente') ?? $guia->direccion->prellenado('nombre_cliente') ?? '- Sin nombre -' }}</span><br>
                <span>{{ $direccion?->prellenado('telefono_cliente') ?? $guia->direccion->prellenado('telefono_cliente') ?? '- Sin teléfono -' }}</span>
            </div>
            <div class="col-md">
                <h6>Socio</h6>
                <span>{{ $direccion?->socio->nombre ?? $guia->direccion->socio->nombre }}</span><br>
                <span>{{ $direccion?->socio->telefono ?? $guia->direccion->socio->telefono }}</span>
            </div>
        </div>
        
        @if( $direccion->exists )
        <input type="hidden" name="direccion_id" value="{{ $direccion->id }}">   
        @endif
    </div>
    <x-invalid-feedback name="direccion_id" />

    @else
    <div class="form-control text-muted mb-3">- Dirección no seleccionada -</div>

    @endif
</div>
