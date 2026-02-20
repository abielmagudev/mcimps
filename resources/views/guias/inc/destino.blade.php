<address>
    <div class="mb-3">
        <small class="text-secondary">Cliente</small><br>
        <span>{{ $cliente->nombre_completo }} ({{ $cliente->telefono }})</span>
    </div>
    <div class="mb-3">
        <small class="text-secondary">Dirección</small><br>
        <span>{{ $direccion->lineal }}</span><br>
        @isset($direccion->referencias)                  
        <small class="d-block">Referencias: {{ $direccion->referencias }}</small>
        @endisset

        @if($direccion->nombre_contacto || $direccion->telefono_contacto)
        <small class="d-block">Contacto:
            @isset($direccion->nombre_contacto)
            {{ $direccion->nombre_contacto }}
            @endisset
            @isset($direccion->telefono_contacto)
            ({{ $direccion->telefono_contacto }})
            @endisset
        </small>
        @endif
    </div>
    <div>
        <small class="text-secondary">Cobertura</small><br>
        <strong class="text-uppercase">{{ $direccion->cobertura }}</strong>
    </div>
</address>
