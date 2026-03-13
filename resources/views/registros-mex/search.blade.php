@extends('app', ['pageTitle' => 'Registro en México'])
@section('content')
<div>
    @if ( $request->has('guia') )
    <x-alert color="danger">
        <div class="text-center">
            <strong>Número de rastreo en USA no encontrado</strong>
        </div>
    </x-alert>
    @endif

    <x-card class="mb-3">
        <form action="{{ route('registros.mex.search') }}" method="get" autocomplete="off">
            <div class="mb-3">
                <label for="guiaInput" class="form-label">Escanea o ingresa el número de rastreo en USA</label>
                <input type="text" class="form-control" id="guiaInput" name="guia" value="{{ $request->get('guia') }}" autofocus required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Buscar número de rastreo en USA</button>
        </form>
    </x-card>
</div>
@endsection
