@extends('app', ['pageTitle' => 'Nuevo socio'])
@section('content')
<x-card>
    <form action="{{ route('socios.store', request()->query()) }}" method="post" autocomplete="off">
        @csrf
        @include('socios._form')
        <button type="submit" class="btn btn-success">Guardar socio</button>
        <a href="{{ request()->filled('guia') ? route('guias.edit', request()->get('guia')) : route('socios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</x-card>
@endsection
