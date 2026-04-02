@extends('app', ['pageTitle' => 'Editar guía'])
@section('content')
<x-card class="mb-3">
    <form action="{{ route('guias.update', $guia) }}" method="post" autocomplete="off">
        @csrf
        @method('put')

        @include('guias.form.input-direccion-seleccionada')
        @include('guias._form')
        
        @if ( $guia->status != 'recibido' )
        <div class="mb-3">
            <label class="form-label">Status</label><br>
            <select class="form-select text-capitalize {{ bsInputInvalid('status') }}" name="status" id="statusSelect">
                @foreach ($statusSeleccionables as $status)
                <option value="{{ $status }}" @selected($guia->status == $status->value)>{{ $status }}</option>
                @endforeach
            </select>
            <x-invalid-feedback name="status" />
        </div>
        @endif

        <button type="submit" class="btn btn-success">Actualizar guía</button>
        <a href="{{ request()->has('volver') ? request('volver') : route('guias.show', $guia) }}" class="btn btn-outline-secondary">Volver</a>
    </form>
</x-card>

<div class="text-end">
    <a href="{{ route('guias.confirmar-eliminacion', $guia) }}" class="link-danger">Eliminar guía</a>
</div>
@endsection
