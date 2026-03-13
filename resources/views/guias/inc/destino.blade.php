<address>
    @isset($guia->nombre_cliente)
    <x-info title="Contacto">
        <span>{{ $guia->nombre_cliente }}, {{ $guia->telefono_cliente }}</span><br>
    </x-info>
    @endisset
    
    @include('direcciones.inc.info-completa-vertical', ['direccion' => $guia->direccion])
</address>

<x-info title="Cobertura">
    <span class="text-capitalize">{{ $guia->direccion->cobertura }}</span>  
</x-info>
