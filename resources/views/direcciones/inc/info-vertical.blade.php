{{ $direccion->calle }},
{{ $direccion->colonia }}<br>
{{ $direccion->ciudad }}
{{ $direccion->estado }}<br>
C.P. {{ $direccion->codigo_postal }}

@isset($direccion->referencias)
<br>
<small>Referencias</small><br>
<span>{{ $direccion->referencias }}</span>
@endisset   
