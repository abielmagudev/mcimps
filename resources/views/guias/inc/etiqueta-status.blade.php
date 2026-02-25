<?php 
$colors = [
    'recibido' => 'text-bg-primary',
    'pendiente' => 'text-bg-warning fst-italic',
    'transito' => 'text-bg-warning',
    'entregado' => 'text-bg-success',
];
?>

<span class="badge {{ $colors[$guia->status] }} text-uppercase">{{ $guia->status }}</span>
