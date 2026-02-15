<div class="mb-3">
  <label for="nombreInput" class="form-label">Nombre</label>
  <input type="text" class="form-control" id="nombreInput" name="nombre" value="{{ $transportadora->nombre }}" autofocus required>
</div>
<div class="mb-3">
  <label for="sitioWebInput" class="form-label">Sitio Web</label>
  <input type="text" class="form-control" id="sitioWebInput" name="sitio_web" value="{{ $transportadora->sitio_web }}" required>
</div>
<div class="mb-3">
  <label for="telefonoInput" class="form-label">Teléfono</label>
  <input type="text" class="form-control" id="telefonoInput" name="telefono" value="{{ $transportadora->telefono }}" required>
</div>
