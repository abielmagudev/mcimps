<?php 
$colors = [
    'recibido' => 'text-bg-primary',
    'ingreso' => 'text-bg-success',
];
?>

<span class="badge {{ $colors[$guia->status] }} text-uppercase">{{ $guia->status }}</span>
