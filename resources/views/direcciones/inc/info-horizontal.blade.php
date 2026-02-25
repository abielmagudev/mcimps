{{ $direccion->calle }},
{{ $direccion->colonia }},
{{ $direccion->ciudad }},
{{ $direccion->estado }} 
C.P. {{ $direccion->codigo_postal }}

@isset($direccion->referencias) 
<br>
<small>Referencias:</small> 
<span>{{ $direccion->referencias }}</span>
@endisset   