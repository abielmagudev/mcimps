@extends('app', ['pageTitle' => 'Cliente'])
@section('content')
<div class="row">
    <div class="col-lg col-lg-3 mb-3">
        <x-card>
            <div class="text-end">
                <a href="{{ route('clientes.edit', $cliente->id) }}" class="link-primary">Editar</a>
            </div>
            <div>
                @include('clientes.inc.info-vertical')
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
                    <a href="{{ route('clientes.direcciones.create', $cliente) }}">Nueva dirección</a>
                </div>
            </div>

            @if ( $cliente->direcciones->count() > 0 )
            <x-table>
                <x-slot name="thead">
                    <tr>
                        <th>Contacto</th>
                        <th>Dirección</th>
                        <th>Código Postal</th>
                        <th>Cobertura</th>
                        <th></th>
                    </tr>
                </x-slot>

                @foreach ($cliente->direcciones->reverse() as $direccion)
                <tr>
                    <td>
                        <span>{{ $direccion->prellenados['nombre_contacto'] }}</span>
                    </td>
                    <td>
                        <div class="text-nowrap">
                            @include('direcciones.inc.info-basica-horizontal', ['direccion' => $direccion])
                        </div>
                    </td>
                    <td>{{ $direccion->codigo_postal }}</td>
                    <td class="text-capitalize">{{ $direccion->cobertura }}</td>
                    <td class="text-end">
                        <a href="{{ route('clientes.direcciones.edit', [$cliente, $direccion]) }}" class="link-primary">Editar</a>
                    </td>
                </tr>
                @endforeach
            </x-table>
            @endif
        </x-card>
    </div>
</div>
@endsection
