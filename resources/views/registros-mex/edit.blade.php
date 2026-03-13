@extends('app', ['pageTitle' => 'Registro en México'])
@section('content')
<x-card>
    <form action="{{ route('registros.mex.update', $guia) }}" method="post" autocomplete="off">
        @csrf
        @method('put')
        <div class="mb-3">
            <label class="form-label">Número de rastreo en USA</label>
            <div class="form-control">{{ $guia->numero_rastreo_usa }}</div>
        </div>
        <button type="submit" class="btn btn-success w-100">Registrar número de rastreo en México</button>
    </form>
</x-card>
@endsection
