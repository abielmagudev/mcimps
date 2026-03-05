<div class="mb-3">
  <label for="nombreCompletoInput" class="form-label">Nombre completo</label>
  <input type="text" class="form-control {{ bsInputInvalid('nombre_completo') }}" id="nombreCompletoInput" name="nombre_completo" value="{{ old('nombre_completo', $cliente->nombre_completo) }}" autofocus required>
  <x-invalid-feedback name="nombre_completo" />
</div>
<div class="mb-3">
  <label for="telefonoInput" class="form-label">Teléfono</label>
  <input type="text" class="form-control {{ bsInputInvalid('telefono') }}" id="telefonoInput" name="telefono" value="{{ old('telefono', $cliente->telefono) }}" required>
  <x-invalid-feedback name="telefono" />
</div>
