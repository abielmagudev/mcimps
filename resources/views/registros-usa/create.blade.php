@extends('app', ['pageTitle' => 'Registro en Estados Unidos'])
@section('content')
<div style="max-width: 1024px" class="mx-auto">
    <x-card>
        <form action="{{ route('registros.usa.store') }}" method="post" autocomplete="off">
            @csrf
            <div class="mb-3">
                <label for="numeroRastreoUsaInput" class="form-label">Escanea o ingresa el número de rastreo en USA</label>
                <input type="text" class="form-control {{ bsIsInvalidClass('numero_rastreo_usa') }}" id="numeroRastreoUsaInput" name="numero_rastreo_usa" value="{{ old('numero_rastreo_usa') }}" autofocus required>
                <x-invalid-feedback name="numero_rastreo" />
            </div>
            <div class="mb-3">
                <label for="numeroRastreoOrigenInput" class="form-label">
                    Escanea o ingresa el número de rastreo de origen
                    <span class="text-secondary">(Opcional)</span>
                </label>
                <input type="text" class="form-control {{ bsIsInvalidClass('numero_rastreo_origen') }}" id="numeroRastreoOrigenInput" name="numero_rastreo_origen" value="{{ old('numero_rastreo_origen') }}">
                <x-invalid-feedback name="numero_rastreo_origen" />
            </div>
            <button type="submit" class="btn btn-success w-100">Guardar entrada</button>
        </form>
    </x-card>
</div>
<script>
// let timer;
// const inputs = document.querySelectorAll('.auto-next');

// inputs.forEach((input, index) => {
//     input.addEventListener('input', () => {
//         // Limpiamos el temporizador cada vez que se escribe una letra
//         clearTimeout(timer);

//         // Si el input tiene contenido, iniciamos la cuenta regresiva
//         if (input.value.length > 0) {
//             timer = setTimeout(() => {
//                 const nextInput = inputs[index + 1];
//                 if (nextInput) {
//                     nextInput.focus();
//                 }
//             }, 750); // 1000 milisegundos = 1 segundo
//         }
//     });
// });
</script>
@endsection
