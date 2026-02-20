<?php 
$colors = [
    'recibido' => 'text-bg-primary',
    'en ruta' => 'text-bg-warning',
    'entregado' => 'text-bg-success',
    'cancelado' => 'text-bg-text-secondary',
];
?>

<span class="badge {{ $colors[$guia->status] }} text-uppercase">{{ $guia->status }}</span>
