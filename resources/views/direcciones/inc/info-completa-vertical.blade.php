<div class="mb-3">
    {{ $direccion->calle }}
    {{ $direccion->colonia }}<br>

    @isset($direccion->referencias) 
    <small>Referencias: {{ $direccion->referencias }}</small>
    <br>
    @endisset   

    {{ $direccion->ciudad }},
    {{ $direccion->estado }}<br>
    C.P. {{ $direccion->codigo_postal }}
</div>
