<span>{{ $direccion->calle }}</span>, 
<span>{{ $direccion->colonia }}</span><br>
<span>{{ $direccion->ciudad }}</span>, 
<span>{{ $direccion->estado }}</span><br>
C.P. <span>{{ $direccion->codigo_postal }}</span>

@isset($direccion->referencias) 
<div class="mt-1">
    <small class="text-secondary">Referencias:</small><br>
    <span>{{ $direccion->referencias }}</span>
</div>
@endisset   

@isset($direccion->nombre_contacto)
<div class="mt-1">
    <small class="text-secondary">Contacto:</small><br>
    <span>{{ $direccion->nombre_contacto }}</span><br>
    <span>({{ $direccion->telefono_contacto }})</span>
</div>
@endisset
