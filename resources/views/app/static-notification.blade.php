<?php

$colors = [
    'success' => 'alert-success',
    'info' => 'alert-info',
    'warning' => 'alert-warning',
    'error' => 'alert-danger',
];

?>

<div>
    @foreach($colors as $key => $bootstrapClass)
    @if(session()->has($key))
        <div class="alert {{ $bootstrapClass }} alert-dismissible fade show" role="alert">
            {{ session($key) }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @endforeach
</div>
