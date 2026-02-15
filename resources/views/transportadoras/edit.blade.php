@extends('app', ['pageTitle' => 'Editar transportadora'])
@section('content')
<x-card>
    <form action="{{ route('transportadoras.update', $transportadora) }}" method="post">
        @csrf
        @method('put')
        @include('transportadoras._form')
        <button type="submit" class="btn btn-warning">Actualizar transportadora</button>
        <a href="{{ route('transportadoras.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</x-card>
@endsection
