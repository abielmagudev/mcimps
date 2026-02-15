@extends('app', ['pageTitle' => 'Nuevo transportadora'])
@section('content')
<x-card>
    <form action="{{ route('transportadoras.store') }}" method="post">
        @csrf
        @method('post')
        @include('transportadoras._form')
        <button type="submit" class="btn btn-success">Guardar transportadora</button>
        <a href="{{ route('transportadoras.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</x-card>
@endsection
