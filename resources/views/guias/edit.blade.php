@extends('app', ['pageTitle' => 'Editar guía #' . $guia->id])
@section('content')

<div class="alert alert-secondary mb-3">
    <h5 class="alert-heading mb-3">Destino</h5>
    @include('guias.inc.destino')
</div>

<x-card>
    <form action="{{ route('guias.update', $guia) }}" method="post">
        @csrf
        @method('put')
        @include('guias._form')
        <div class="mb-3">
            <label for="statusSelect" class="form-label">Status</label>
            <select class="form-select text-capitalize {{ bsIsInvalidClass('status') }}" id="statusSelect" name="status" required>
                @foreach ($statuses as $status)
                <option value="{{ $status->value }}" @selected( old('status', $guia->status) == $status->value)>{{ $status->value }}</option>
                @endforeach
            </select>
            <x-invalid-feedback name="status" />
        </div>

        <button type="submit" class="btn btn-success">Actualizar guia</button>
        <a href="{{ route('guias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</x-card>
@endsection
