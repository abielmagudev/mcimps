<span>{{ $direccion->calle }}</span>, 
<span>{{ $direccion->colonia }}</span>, 
<span>{{ $direccion->ciudad }}</span>, 
<span>{{ $direccion->estado }}</span> 
C.P. <span>{{ $direccion->codigo_postal }}</span>

@isset($direccion->nombre_contacto)
<br>
<small class="text-secondary">Contacto:</small>
<span>{{ $direccion->nombre_contacto }} ({{ $direccion->telefono_contacto }})</span>
@endisset

@isset($direccion->referencias) 
<br>
<small class="text-secondary">Referencias:</small>
<span>{{ $direccion->referencias }}</span>
@endisset   
