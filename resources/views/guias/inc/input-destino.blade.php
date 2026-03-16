<div class="mb-3">
    <div class="d-flex justify-content-between">
        <label class="form-label">Destino</label>
        <div class="d-flex gap-3">
            @if( $guia->tieneDireccion() || $direccion->exists )
            <?php $socio = $guia->tieneDireccion() ? $guia->direccion->socio : $direccion->socio; ?>
            <a href="{{ route('guias.seleccionar-direccion', ['buscar' => $socio->nombre]) }}" class="link-primary">Cambiar destino</a>
        
            @if( isset($request) && $request->has('direccion') || request()->has('direccion'))
            <a href="{{ $guia->exists ? route('guias.edit', $guia) : route('guias.create')}}" class="link-secondary">Cancelar</a>
            @endif
        
            @else
            <a href="{{ route('guias.seleccionar-direccion') }}" class="link-primary">Seleccionar destino</a>
        
            @endif
        </div>
    </div>

    @if ($guia->tieneDireccion() || $direccion->exists)
    <div class="form-control">
        <div class="row">
            <div class="col-md">
                <h6>Dirección</h6>
                @include('direcciones.inc.info-completa-vertical', ['direccion' => $guia->direccion ?? $direccion])
                <div class="small">
                    <span>Cobertura:</span> <b class="text-capitalize">{{ $guia->direccion?->cobertura ?? $direccion->cobertura }}</b>
                </div>
            </div>
            <div class="col-md">
                <h6>Cliente predefinido</h6>
                <span>{{ $guia->direccion?->prellenado('nombre_cliente') ?? $direccion->prellenado('nombre_cliente') ?? '- Sin nombre -' }}</span><br>
                <span>{{ $guia->direccion?->prellenado('telefono_cliente') ?? $direccion->prellenado('telefono_cliente') ?? '- Sin teléfono -' }}</span>
            </div>
            <div class="col-md">
                <h6>Socio</h6>
                <span>{{ $guia->direccion?->socio->nombre ?? $direccion->socio->nombre }}</span><br>
                <span>{{ $guia->direccion?->socio->telefono ?? $direccion->socio->telefono }}</span>
            </div>
        </div>
        
        @if( isset($request) && $request->has('direccion') || request()->has('direccion'))
        <input type="hidden" name="direccion_id" value="{{ $direccion->id }}">   
        @endif
    </div>
    <x-invalid-feedback name="direccion_id" />

    @else
    <div class="form-control text-muted mb-3">- Sin destino definido -</div>

    @endif
</div>
