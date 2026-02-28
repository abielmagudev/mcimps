@extends('app', ['pageTitle' => 'Guías'])
@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
    <div>
        <div class="d-flex flex-wrap gap-3 mb-3 mb-md-0">
            {{-- Fecha --}}
            <form action="{{ route('guias.index') }}" method="get">
                <input type="date" class="form-control" name="fecha" value="{{ $request->get('fecha') }}" placeholder="Fecha" onchange="this.form.submit()" required>
            </form>   

            {{-- Trasnportadora --}}
            <form action="{{ route('guias.index') }}" method="get">
                <select class="form-select" name="transportadora" onchange="this.form.submit()" required>
                    <option label="Transportadoras"></option>
                    @foreach ($transportadoras as $transportadora)
                    <option value="{{ $transportadora->id }}" @selected($request->get('transportadora') == $transportadora->id)>{{ $transportadora->nombre }}</option>
                    @endforeach
                </select>
            </form>   
            
            {{-- Status --}}
            <form action="{{ route('guias.index') }}" method="get">
                <select class="form-select text-capitalize" name="status" onchange="this.form.submit()" required>
                    @foreach ($statuses as $status)
                    <option value="{{ $status->value }}" @selected($request->get('status') == $status->value)>
                        {{ $status->value }}
                        ({{ $contadores[$status->value] }})
                    </option>
                    @endforeach
                </select>
            </form>   
        </div>
    </div>
    <div>
        <a href="{{ route('guias.create') }}" class="link-primary">Nueva guia</a>
    </div>
</div>

@if ( $guias->count() )
<x-card>
    <p>
        <span class="badge bg-dark">{{ $guias->count() }}</span>
        <span class="align-middle">Guías encontradas</span>   
    </p>
    <x-table class="table-sm table-hover">
        <x-slot name="thead">
            <tr>
                <th></th>
                <th style="min-width: 248px;">Direccion</th>
                <th class="text-nowrap">Código Postal</th>
                <th class="text-nowrap">Rastreo Origen</th>
                <th class="text-nowrap">Rastreo USA</th>
                <th class="text-nowrap">Rastreo MEX</th>
                <th class="text-nowrap">Salida</th>
                <th>Transportadora</th>
                <th>Cobertura</th>
                <th>Status</th>
                <th></th>
            </tr>
        </x-slot>

        @foreach ($guias as $index =>$guia)
        <tr>
            <td class="small text-muted">{{ ($index+1) }}</td>
            <td>
                @if ($guia->tieneDireccion())
                <span>{{ $guia->direccion->calle }}</span>, 
                <span>{{ $guia->direccion->ciudad }}</span>, 
                <span>{{ $guia->direccion->estado }}</span>
                @endif
            </td>
            <td>{{ $guia->direccion->codigo_postal ?? '' }}</span></td>
            <td>{!! marker(request('rastreo', ''), $guia->numero_rastreo_origen ?? '') !!}</td>
            <td>{!! marker(request('rastreo', ''), $guia->numero_rastreo_usa ?? '') !!}</td>
            <td>{!! marker(request('rastreo', ''), $guia->numero_rastreo_mex ?? '') !!}</td>
            <td>{!! marker(request('rastreo', ''), $guia->registro_salida ?? '') !!}</td>
            <td>
                @isset($guia->transportadora)
                <a href="{{ $guia->transportadora->sitio_web }}" target="_blank" class="link-primary">{{ $guia->transportadora->nombre }}</a>
                @endisset
            </td>
            <td class="text-capitalize">{{ $guia->direccion?->cobertura }}</td>
            <td>
                @include('guias.inc.etiqueta-status')
            </td>
            <td class="text-nowrap text-end" style="width:1%">
                <a href="{{ route('guias.show', $guia) }}" class="link-primary me-1">Ver</a>
                <a href="{{ route('guias.edit', $guia) }}" class="link-primary">Editar</a>
            </td>
        </tr>         
        @endforeach
    </x-table>
</x-card>

@else
<div class="text-center">
    <h3>{{ request()->has('rastreo') ? 'Sin resultados' : 'No hay guías activas' }}</h3>
    <a href="{{ route('guias.create') }}" class="link-primary">Crear nueva guia</a>
</div>
@endif

@endsection
