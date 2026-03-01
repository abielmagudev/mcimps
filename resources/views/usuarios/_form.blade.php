<div class="mb-3">
  <label for="typeInput" class="form-label">Tipo</label>
  <select class="form-select {{ bsIsInvalidClass('type') }}" id="typeInput" name="type" required>
    @foreach ($types as $type)
    <option value="{{ $type }}" @selected($user->type == $type->value)>{{ $type->titulo() }}</option>
    @endforeach
  </select>
  <x-invalid-feedback name="type" />
</div>
<div class="mb-3">
  <label for="nameInput" class="form-label">Nombre</label>
  <input type="text" class="form-control {{ bsIsInvalidClass('name') }}" id="nameInput" name="name" value="{{ old('name', $user->name) }}" required>
  <x-invalid-feedback name="name" />
</div>
<div class="mb-3">
  <label for="passwordInput" class="form-label">{{ $user->exists ? 'Nueva contraseña (Opcional)' : 'Contraseña' }}</label>
  <input type="password" class="form-control {{ bsIsInvalidClass('password') }}" id="passwordInput" name="password" @required(!$user->exists)>
  <x-invalid-feedback name="password" />
</div>
<div class="mb-3">
  <label for="passwordConfirmationInput" class="form-label">{{ $user->exists ? 'Confirmar nueva contraseña (Opcional)' : 'Confirmar contraseña' }}</label>
  <input type="password" class="form-control {{ bsIsInvalidClass('confirm_password') }}" id="passwordConfirmationInput" name="password_confirmation" @required(!$user->exists)>
  <x-invalid-feedback name="password_confirmation" />
</div>
