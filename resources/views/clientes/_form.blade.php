<div class="mb-3">
  <label for="nombreCompletoInput" class="form-label">Nombre completo</label>
  <input type="text" class="form-control" id="nombreCompletoInput" name="nombre_completo" value="{{ $cliente->nombre_completo }}" autofocus required>
</div>
<div class="mb-3">
  <label for="telefonoInput" class="form-label">Teléfono</label>
  <input type="text" class="form-control" id="telefonoInput" name="telefono" value="{{ $cliente->telefono }}" required>
</div>
