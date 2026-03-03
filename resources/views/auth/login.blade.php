@extends('app')
@section('content')
<div style="max-width: 320px" class="mt-3 mx-auto px-3">
    <x-card>
        <form action="{{ route('login') }}" method="post" autocomplete="off">
            @csrf
            <div class="mb-3">
                <label for="nomnbreUsuarioInput" class="form-label">Usuario</label>
                <input type="name" class="form-control {{ bsIsInvalidClass('name') }}" id="nomnbreUsuarioInput" name="name" value="{{ old('name') }}" autofocus required>
                <x-invalid-feedback name="name" />
            </div>
            <div class="mb-3">
                <label for="passwordInput" class="form-label">Contraseña</label>
                <input type="password" class="form-control {{ bsIsInvalidClass('password') }}" id="passwordInput" name="password" required>
                <x-invalid-feedback name="password" />
            </div>
            <button type="submit" class="btn btn-primary w-100">Ingresar</button>
        </form>
    </x-card>
</div>
@endsection
