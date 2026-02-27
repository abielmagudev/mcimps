@extends('app', ['pageTitle' => 'Registro en México'])
@section('content')
<div style="max-width: 1024px" class="mx-auto">
    <x-card class="mb-3">
        <form action="{{ route('registros.mex.search') }}" method="get" autocomplete="off">
            <div class="mb-3">
                <label for="guiaInput" class="form-label">Escanea o ingresa el número de guía</label>
                <input type="text" class="form-control" id="guiaInput" name="guia" value="{{ old('guia') }}" autofocus required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Buscar guía para registrar salida</button>
        </form>
    </x-card>

    @if ( $request->filled('guia') )
    <div class="alert alert-warning text-center">
        <span>No existe guia: <strong>{{ $request->get('guia') }}</strong></span>
    </div>
    @endif
</div>
@endsection
