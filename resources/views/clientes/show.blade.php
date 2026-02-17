@extends('app', ['pageTitle' => 'Cliente'])
@section('content')
<div class="row">
    <div class="col-lg col-lg-3 mb-3">
        <x-card>
            <div>
                <span class="fw-bold">{{ $cliente->nombre_completo }}</span><br>
                <span>{{ $cliente->telefono }}</span>
            </div>
            <div class="text-end">
                <a href="{{ route('clientes.edit', $cliente->id) }}" class="link-primary">Editar</a>
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
                    <a href="{{ route('clientes.direcciones.create', $cliente) }}">Nueva</a>
                </div>
            </div>

            <x-table>
                <x-slot name="thead">
                    <tr>
                        <th>Dirección</th>
                        <th>Cobertura</th>
                        <th>Contacto</th>
                        <th></th>
                    </tr>
                </x-slot>

                @foreach ($cliente->direcciones->reverse() as $direccion)
                <tr>
                    <td class="text-nowrap">
                        <span class="d-block">{{ $direccion->lineal }}</span>
                        @isset($direccion->referencias)                  
                        <small class="text-secondary">Referencias: {{ $direccion->referencias }}</small>
                        @endisset
                    </td>
                    <td class="text-capitalize">{{ $direccion->cobertura }}</td>
                    <td>
                        @isset($direccion->nombre_contacto)
                        <span class="d-block">{{ $direccion->nombre_contacto }}</span>
                        @endisset

                        @isset($direccion->telefono_contacto)
                        <span>{{ $direccion->telefono_contacto }}</span>
                        @endisset
                    </td>
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
