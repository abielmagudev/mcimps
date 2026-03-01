{{ $direccion->calle }},
{{ $direccion->colonia }},
{{ $direccion->ciudad }},
{{ $direccion->estado }} 
C.P. {{ $direccion->codigo_postal }}

@isset($direccion->referencias) 
<div>
    <small class="text-secondary">Referencias:</small> 
    <small>{{ $direccion->referencias }}</small>
</div>
@endisset   
