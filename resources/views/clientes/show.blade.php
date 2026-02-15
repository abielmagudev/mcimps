@extends('app', ['pageTitle' => 'Cliente'])
@section('content')
<div class="row">
    <div class="col-lg col-lg-3">
        <x-card>
            <div class="text-end mb-3">
                <a href="{{ route('clientes.edit', $cliente->id) }}" class="link-primary">Editar</a>
            </div>
            <div>
                <span class="fw-bold">{{ $cliente->nombre_completo }}</span><br>
                <span>{{ $cliente->telefono }}</span>
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
                    <a href="{{ route('clientes.direcciones.create', $cliente) }}">Agregar</a>
                </div>
            </div>

            <x-table>
                <x-slot name="thead">
                    <tr>
                        <th>Calle</th>
                        <th>Colonia</th>
                        <th class="text-nowrap">Código Postal</th>
                        <th>Ciudad</th>
                        <th>Estado</th>
                        <th>Contacto</th>
                        <th>Teléfono</th>
                        <th>Cobertura</th>
                        <th>Referencias</th>
                        <th></th>
                    </tr>
                </x-slot>

                @foreach ($cliente->direcciones->reverse() as $direccion)
                <tr class="small">
                    <td>{{ $direccion->calle }}</td>
                    <td>{{ $direccion->colonia }}</td>
                    <td>{{ $direccion->codigo_postal }}</td>
                    <td>{{ $direccion->ciudad }}</td>
                    <td>{{ $direccion->estado }}</td>
                    <td>{{ $direccion->nombre_contacto }}</td>
                    <td>{{ $direccion->telefono_contacto }}</td>
                    <td class="text-capitalize">{{ $direccion->cobertura }}</td>
                    <td>{{ $direccion->referencias }}</td>
                    <td class="text-end">
                        <a href="{{ route('clientes.direcciones.edit', [$cliente, $direccion]) }}" class="link-primary">Editar</a>
                    </td>
                </tr>
                @endforeach
            </x-table>
        </x-card>
    </div>
</div>
@endsection
