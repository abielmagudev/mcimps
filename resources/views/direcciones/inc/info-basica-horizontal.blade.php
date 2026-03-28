@isset($marcar)
{!! marker($marcar, $direccion->calle) !!}, 
  
@else
{{ $direccion->calle }},

@endisset
{{ $direccion->colonia }},
{{ $direccion->ciudad }}, 
{{ $direccion->estado }} 
