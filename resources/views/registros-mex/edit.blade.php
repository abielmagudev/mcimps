@extends('app', ['pageTitle' => 'Registro de salidas (México)'])
@section('content')
<div style="max-width: 1024px" class="mx-auto">
    <div class="alert alert-secondary mb-3">
        <h5 class="alert-heading mb-3">Guia</h5>
        <div class="row">
            <div class="col-md">
                <h6>Destino</h6>
                <div class="mb-1">
                    @includeWhen($guia->tieneDireccion(), 'direcciones.inc.info-vertical', ['direccion' => $guia->direccion])<br>
                </div>
                <small class="text-capitalize">Cobertura: {{ $guia->direccion?->cobertura }}</small>
            </div>
            <div class="col-md">
                <h6>Transportadora</h6>
                @includeWhen($guia->tieneTransportadora(), 'transportadoras.inc.info-vertical', ['transportadora' => $guia->transportadora])
            </div>
            <div class="col-md">
                <h6>Números de rastreo</h6>
                <table class="table table-borderless table-sm">
                    <tbody>
                        <tr>
                            <td class="bg-transparent" style="width:1%">Origen</td>
                            <td class="bg-transparent">{{ $guia->numero_rastreo_origen }}</td>
                        </tr>
                        <tr>
                            <td class="bg-transparent" style="width:1%">USA</td>
                            <td class="bg-transparent">{{ $guia->numero_rastreo_usa }}</td>
                        </tr>
                        <tr>
                            <td class="bg-transparent" style="width:1%">MEX</td>
                            <td class="bg-transparent">{{ $guia->numero_rastreo_mex }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if ( $guia->tieneStatusEntregado() )
    <div class="alert alert-success text-center">
        <strong>Guía registrada con salida</strong><br>
        <a href="{{ route('registros.mex.search') }}" class="link-primary">Registra otra guía</a>
    </div>

    @elseif ( $guia->puedeTenerRegistroSalida() )
    <x-card>
        <form action="{{ route('registros.mex.update', $guia) }}" method="post" autocomplete="off">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="registroSalidaInput" class="form-label">Escanea o ingresa el codigo para el registro de salida</label>
                <input type="text" class="form-control {{ bsIsInvalidClass('registro_salida') }}" id="registroSalidaInput" name="registro_salida" value="{{ old('registro_salida') }}" autofocus required>
                <x-invalid-feedback name="registro_salida" />
            </div>
            <button type="submit" class="btn btn-success w-100">Registrar salida de guía</button>
        </form>
    </x-card>

    @else
    <div class="alert alert-danger text-center">
        <strong>Guía con información INCOMPLETA. No se puede registrar salida.</strong><br>
        <a href="{{ route('registros.mex.search') }}" class="link-primary">Registra otra guía</a>
    </div>

    @endif
</div>
@endsection
