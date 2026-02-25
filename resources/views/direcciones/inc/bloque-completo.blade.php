<span>{{ $direccion->calle }}</span>, 
<span>{{ $direccion->colonia }}</span><br>
<span>{{ $direccion->ciudad }}</span>, 
<span>{{ $direccion->estado }}</span>
<span>{{ $direccion->codigo_postal }}</span><br>
@if ($direccion->nombre_contacto || $direccion->telefono_contacto)
<span>Contacto: 
    {{ $direccion->nombre_contacto }}
    @isset ($direccion->telefono_contacto)
    , {{ $direccion->telefono_contacto }}
    @endisset
</span>
@endif
@isset($direccion->referencias) 
<br><small>Referencias:</small>
<p>{{ $direccion->referencias }}</p>
@endisset
