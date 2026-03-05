<address>
    @isset($guia->nombre_contacto)
    <x-info title="Contacto">
        <span>{{ $guia->nombre_contacto }}, {{ $guia->telefono_contacto }}</span><br>
    </x-info>
    @endisset
    
    @include('direcciones.inc.info-completa-vertical', ['direccion' => $guia->direccion])
</address>

<x-info title="Cobertura">
    <span class="text-capitalize">{{ $guia->direccion->cobertura }}</span>  
</x-info>
