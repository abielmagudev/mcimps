@extends('app', ['pageTitle' => 'Editar socio'])
@section('content')
<x-card>
    <form action="{{ route('socios.update', $socio) }}" method="post" autocomplete="off">
        @csrf
        @method('put')
        @include('socios._form')
        <button type="submit" class="btn btn-success">Actualizar socio</button>
        <a href="{{ route('socios.show', $socio) }}" class="btn btn-secondary">Cancelar</a>
    </form>
</x-card>
@endsection
