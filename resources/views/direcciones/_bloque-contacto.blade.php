@isset($direccion->nombre_contacto)
<span class="d-block">{{ $direccion->nombre_contacto }}</span>
@endisset

@isset($direccion->telefono_contacto)
<span>{{ $direccion->telefono_contacto }}</span>
@endisset
