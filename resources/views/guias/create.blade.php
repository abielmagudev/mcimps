@extends('app', ['pageTitle' => 'Nueva guía'])
@section('content')
<x-card>
    <form action="{{ route('guias.store') }}" method="post" autocomplete="off">
        @csrf
        @include('guias.form.input-direccion-seleccionada')
        @include('guias._form')
        <button type="submit" class="btn btn-success">Guardar guia</button>
        <a href="{{ route('guias.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>
</x-card>
@endsection
