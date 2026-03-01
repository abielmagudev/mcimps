<div class="mb-3">
{{ $direccion->calle }}
{{ $direccion->colonia }}<br>
{{ $direccion->ciudad }},
{{ $direccion->estado }}<br>
C.P. {{ $direccion->codigo_postal }}
</div>

@isset($direccion->referencias) 
<small class="text-secondary">Referencias:</small><br>
<span>{{ $direccion->referencias }}</span>
@endisset   
