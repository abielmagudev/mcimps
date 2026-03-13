@extends('app', ['pageTitle' => 'Socio'])
@section('content')
<div class="row">
    <div class="col-lg col-lg-3 mb-3">
        <x-card>
            <div class="text-end">
                <a href="{{ route('socios.edit', $socio->id) }}" class="link-primary">Editar</a>
            </div>
            <div>
                @include('socios.inc.info-vertical')
            </div>
        </x-card>
    </div>

    <div class="col-lg">
        <x-card>
            <div class="row mb-3">
                <div class="col">
                    <h1 class="fs-5">Direcciones</h1>
                </div>
                <div class="col text-end">
                    <a href="{{ route('socios.direcciones.create', $socio) }}">Nueva dirección</a>
                </div>
            </div>

            @if ( $socio->direcciones->count() > 0 )
            <x-table>
                <x-slot name="thead">
                    <tr>
                        <th>Cliente</th>
                        <th>Dirección</th>
                        <th>Código Postal</th>
                        <th>Cobertura</th>
                        <th></th>
                    </tr>
                </x-slot>

                @foreach ($socio->direcciones->reverse() as $direccion)
                <tr>
                    <td>
                        <span>{{ $direccion->prellenados['nombre_cliente'] }}</span>
                    </td>
                    <td>
                        <div class="text-nowrap">
                            @include('direcciones.inc.info-basica-horizontal', ['direccion' => $direccion])
                        </div>
                    </td>
                    <td>{{ $direccion->codigo_postal }}</td>
                    <td class="text-capitalize">{{ $direccion->cobertura }}</td>
                    <td class="text-end">
                        <a href="{{ route('socios.direcciones.edit', [$socio, $direccion]) }}" class="link-primary">Editar</a>
                    </td>
                </tr>
                @endforeach
            </x-table>
            @endif
        </x-card>
    </div>
</div>
@endsection
