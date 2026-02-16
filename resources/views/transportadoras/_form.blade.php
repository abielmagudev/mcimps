<div class="mb-3">
  <label for="nombreInput" class="form-label">Nombre</label>
  <input type="text" class="form-control {{ bsIsInvalidClass('nombre') }}" id="nombreInput" name="nombre" value="{{ old('nombre', $transportadora->nombre) }}" required>
  <x-invalid-feedback name="nombre" />
</div>
<div class="mb-3">
  <label for="sitioWebInput" class="form-label">Sitio Web</label>
  <input type="url" class="form-control {{ bsIsInvalidClass('sitio_web') }}" id="sitioWebInput" name="sitio_web" value="{{ old('sitio_web', $transportadora->sitio_web) }}" required>
  <x-invalid-feedback name="sitio_web" />
</div>
<div class="mb-3">
  <label for="telefonoInput" class="form-label">Teléfono</label>
  <input type="tel" class="form-control {{ bsIsInvalidClass('telefono') }}" id="telefonoInput" name="telefono" value="{{ old('telefono', $transportadora->telefono) }}" required>
  <x-invalid-feedback name="telefono" />
</div>
