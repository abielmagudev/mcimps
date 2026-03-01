{{ $direccion->calle }}
{{ $direccion->colonia }}<br>
{{ $direccion->ciudad }},
{{ $direccion->estado }}<br>
C.P. {{ $direccion->codigo_postal }}

@isset($direccion->referencias) 
<br>
<small class="text-secondary">Referencias:</small><br>
<small>{{ $direccion->referencias }}</small>
@endisset   
