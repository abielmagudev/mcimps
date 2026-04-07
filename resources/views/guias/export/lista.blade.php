<table>
    <thead>
        <tr>
            <th style="background-color: #f5f5f5;">#</th>
            <th style="background-color: #f5f5f5;">Cliente</th>
            <th style="background-color: #f5f5f5;">Dirección</th>
            <th style="background-color: #f5f5f5;">Cobertura</th>
            <th style="background-color: #f5f5f5;">Socio</th>
            <th style="background-color: #f5f5f5;">Transportadora Americana</th>
            <th style="background-color: #f5f5f5;">Número de rastreo en USA</th>
            <th style="background-color: #f5f5f5;">Número de rastreo secundario</th>
            <th style="background-color: #f5f5f5;">Número de consolidado</th>
            <th style="background-color: #f5f5f5;">Status</th>
            {{-- <th style="background-color: #f5f5f5;">Fecha de recibido</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($guias as $index => $guia)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>
                @isset ($guia->nombre_cliente)  
                {{ $guia->nombre_cliente }}
                @endisset

                @isset ($guia->telefono_cliente)
                ({{ $guia->telefono_cliente }})
                @endisset
            </td>
            <td>
                @if( $guia->tieneDireccion() )
                {{ $guia->direccion->calle }}, 
                {{ $guia->direccion->ciudad }}, 
                {{ $guia->direccion->estado }}, 
                {{ $guia->direccion->codigo_postal }}
                @endif
            </td>
            <td>{{ $guia->direccion?->cobertura ?? '' }}</td>
            <td>
                @if( $guia->tieneDireccion() )
                {{ $guia->direccion->socio->nombre ?? '' }}
                @endif
            </td>
            <td>{{ $guia->transportadoraAmericana?->nombre ?? '' }}</td>
            {{-- 
            <td>
                @if($guia->tieneTransportadoraMexicana())
                <a href="{{ $guia->transportadoraMexicana->sitio_web }}" target="_blank" class="link-primary">{{ $guia->transportadoraMexicana->nombre }}</a>
                @endif
            </td> 
            --}}
            <td>{{ $guia->numero_rastreo_usa ?? '' }}</td>
            <td>{{ $guia->numero_rastreo_secundario ?? '' }}</td>
            <td>{{ $guia->numero_consolidado ?? '' }}</td>
            <td>
                @include('guias.inc.etiqueta-status')
            </td>
            {{-- <td>{{ $guia->created_at->format('d/m/Y') }}</td> --}}
        </tr>         
        @endforeach
</table>
