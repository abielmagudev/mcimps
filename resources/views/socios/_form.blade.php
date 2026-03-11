<div class="mb-3">
  <label for="nombreInput" class="form-label">Nombre</label>
  <input type="text" class="form-control {{ bsInputInvalid('nombre') }}" id="nombreInput" name="nombre" value="{{ old('nombre', $socio->nombre) }}" autofocus required>
  <x-invalid-feedback name="nombre" />
</div>
<div class="mb-3">
  <label for="telefonoInput" class="form-label">Teléfono</label>
  <input type="text" class="form-control {{ bsInputInvalid('telefono') }}" id="telefonoInput" name="telefono" value="{{ old('telefono', $socio->telefono) }}" required>
  <x-invalid-feedback name="telefono" />
</div>
