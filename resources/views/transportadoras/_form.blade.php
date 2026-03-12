<div class="mb-3">
  <label for="nombreInput" class="form-label">Nombre</label>
  <input type="text" class="form-control {{ bsInputInvalid('nombre') }}" id="nombreInput" name="nombre" value="{{ old('nombre', $transportadora->nombre) }}" required>
  <x-invalid-feedback name="nombre" />
</div>
<div class="mb-3">
  <label for="sitioWebInput" class="form-label">Sitio Web</label>
  <input type="url" class="form-control {{ bsInputInvalid('sitio_web') }}" id="sitioWebInput" name="sitio_web" value="{{ old('sitio_web', $transportadora->sitio_web) }}" required>
  <x-invalid-feedback name="sitio_web" />
</div>
<div class="mb-3">
  <label for="telefonoInput" class="form-label">Teléfono</label>
  <input type="tel" class="form-control {{ bsInputInvalid('telefono') }}" id="telefonoInput" name="telefono" value="{{ old('telefono', $transportadora->telefono) }}" required>
  <x-invalid-feedback name="telefono" />
</div>
<div class="mb-3">
  <label for="nacionalidadInput" class="form-label">Nacionalidad</label>
  <select class="form-select text-capitalize {{ bsInputInvalid('nacionalidad') }}" id="nacionalidadInput" name="nacionalidad" required>
    @foreach ($nacionalidades as $nacionalidad)
    <option value="{{ $nacionalidad }}" {{ old('nacionalidad', $transportadora->nacionalidad) === $nacionalidad->value ? 'selected' : '' }}>{{ $nacionalidad->value }}</option>
    @endforeach
  </select>
  <x-invalid-feedback name="nacionalidad" />
</div>
