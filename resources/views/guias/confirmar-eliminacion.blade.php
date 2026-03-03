@extends('app')
@section('content')
<div style="max-width: 1024px" class="mx-auto">
    <x-card>
        <div class="text-center mb-3">
            <h1 class="text-danger mb-3">ADVERTENCIA</h1>

            <p class="mb-5">
                ¿Deseas continuar con la eliminación de la guía <br> 
                número de rastreo en Estados Unidos<br>
                <strong>{{ $guia->numero_rastreo_usa }}</strong>?
            </p>

            <form action="{{ route('guias.destroy', $guia) }}" method="post" class="text-center">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-outline-danger">Eliminar guía</button>
                <a href="{{ route('guias.edit', $guia) }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </x-card>
</div>
@endsection
