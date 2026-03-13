@extends('print')
@section('content')
<div class="mb-3">
    <table class="table border-light mb-3">
        <tbody>
            <tr>
                <td class="bg-body-secondary" style="width:1%">Rastreo USA</td>
                <td>{{ $guia->numero_rastreo_usa }}</td>
            </tr>
            <tr>
                <td class="bg-body-secondary">Transportadora Americana</td>
                <td>{{ $guia->transportadoraAmericana?->nombre }}</td>
            </tr>
            <tr>
                <td class="bg-body-secondary">Transportadora Mexicana</td>
                <td>{{ $guia->transportadoraMexicana?->nombre }}</td>
            </tr>
            <tr>
                <td class="bg-body-secondary">Nombre</td>
                <td>{{ $guia->nombre_contacto }}</td>
            </tr>
            <tr>
                <td class="bg-body-secondary">Télefono</td>
                <td>{{ $guia->telefono_contacto }}</td>
            </tr>
            <tr>
                <td class="bg-body-secondary">Dirección</td>
                <td>{{ $guia->direccion?->calle }}, {{ $guia->direccion?->colonia }}</td>
            </tr>
            <tr>
                <td class="bg-body-secondary">Referencias</td>
                <td>{{ $guia->direccion?->referencias }}</td>
            </tr>
            <tr>
                <td class="bg-body-secondary">Ciudad</td>
                <td>{{ $guia->direccion?->ciudad }}</td>
            </tr>
            <tr>
                <td class="bg-body-secondary">Estado</td>
                <td>{{ $guia->direccion?->estado }}</td>
            </tr>
            <tr>
                <td class="bg-body-secondary">Cobertura</td>
                <td>{{ ucfirst($guia->direccion?->cobertura) }}</td>
            </tr>
        </tbody>
    </table>
</div>
<div class="text-center">
    {!! $barcode !!}
</div>
@endsection
