<div class="mb-3">
  <label for="calleInput" class="form-label">Calle</label>
  <input type="text" class="form-control" id="calleInput" name="calle" value="{{ $direccion->calle }}" autofocus required>
  <x-invalid-feedback name="calle" />
</div>
<div class="mb-3">
  <label for="coloniaInput" class="form-label">Colonia</label>
  <input type="text" class="form-control" id="coloniaInput" name="colonia" value="{{ $direccion->colonia }}" required>
  <x-invalid-feedback name="colonia" />
</div>
<div class="mb-3">
  <label for="ciudadInput" class="form-label">Ciudad</label>
  <input type="text" class="form-control" id="ciudadInput" name="ciudad" value="{{ $direccion->ciudad }}" required>
  <x-invalid-feedback name="ciudad" />
</div>
<div class="mb-3">
  <label for="estadoInput" class="form-label">Estado</label>
  <input type="text" class="form-control" id="estadoInput" name="estado" value="{{ $direccion->estado }}" required>
  <x-invalid-feedback name="estado" />
</div>
<div class="mb-3">
  <label for="codigoPostalInput" class="form-label">Código Postal</label>
  <input type="text" class="form-control" id="codigoPostalInput" name="codigo_postal" value="{{ $direccion->codigo_postal }}" 
  pattern="[0-9]+" 
  inputmode="numeric" 
  title="Por favor, ingresa solo números"
  placeholder="Ej: 123456"
  required>
  <x-invalid-feedback name="codigo_postal" />
</div>
<div class="mb-3">
  <label for="coberturaSelect" class="form-label">Cobertura</label>
  <select class="form-select text-capitalize" id="coberturaSelect" name="cobertura" required>
    @foreach ($coberturas as $cobertura)
    <option value="{{ $cobertura->value }}" @selected($direccion->cobertura == $cobertura->value)>{{ $cobertura->value }}</option>
    @endforeach
  </select>
  <x-invalid-feedback name="cobertura" />
</div>
<div class="mb-3">
  <label for="referenciasInput" class="form-label">Referencias (Opcional)</label>
  <textarea class="form-control" id="referenciasInput" name="referencias" rows="3">{{ $direccion->referencias }}</textarea>
  <x-invalid-feedback name="referencias" />
</div>
<div class="mb-3">
  <label for="nombreContactoInput" class="form-label">Nombre del contacto (Opcional)</label>
  <input type="text" class="form-control" id="nombreContactoInput" name="prellenados[nombre_contacto]" value="{{ $direccion->prellenados['nombre_contacto'] ?? '' }}">
</div>
<div class="mb-3">
  <label for="telefonoContactoInput" class="form-label">Teléfono del contacto (Opcional)</label>
  <input type="text" class="form-control" id="telefonoContactoInput" name="prellenados[telefono_contacto]" value="{{ $direccion->prellenados['telefono_contacto'] ?? '' }}">
</div>
