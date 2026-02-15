<div class="mb-3">
  <label for="calleInput" class="form-label">Calle</label>
  <input type="text" class="form-control" id="calleInput" name="calle" value="{{ $direccion->calle }}" autofocus required>
</div>
<div class="mb-3">
  <label for="coloniaInput" class="form-label">Colonia</label>
  <input type="text" class="form-control" id="coloniaInput" name="colonia" value="{{ $direccion->colonia }}" required>
</div>
<div class="mb-3">
  <label for="codigoPostalInput" class="form-label">Código Postal</label>
  <input type="text" class="form-control" id="codigoPostalInput" name="codigo_postal" value="{{ $direccion->codigo_postal }}" required>
</div>
<div class="mb-3">
  <label for="ciudadInput" class="form-label">Ciudad</label>
  <input type="text" class="form-control" id="ciudadInput" name="ciudad" value="{{ $direccion->ciudad }}" required>
</div>
<div class="mb-3">
  <label for="estadoInput" class="form-label">Estado</label>
  <input type="text" class="form-control" id="estadoInput" name="estado" value="{{ $direccion->estado }}" required>
</div>
<div class="mb-3">
  <label for="nombreContactoInput" class="form-label">Nombre del contacto <small class="form-text text-muted">(Opcional)</small></label>
  <input type="text" class="form-control" id="nombreContactoInput" name="nombre_contacto" value="{{ $direccion->nombre_contacto }}">
</div>
<div class="mb-3">
  <label for="telefonoContactoInput" class="form-label">Teléfono del contacto <small class="form-text text-muted">(Opcional)</small></label>
  <input type="text" class="form-control" id="telefonoContactoInput" name="telefono_contacto" value="{{ $direccion->telefono_contacto }}"> 
</div>
<div class="mb-3">
  <label for="coberturaSelect" class="form-label">Cobertura</label>
  <select class="form-select" id="coberturaSelect" name="cobertura" required>
    <option value="domicilio" @selected($direccion->cobertura == 'domicilio')>Domicilio</option>
    <option value="ocurre" @selected($direccion->cobertura == 'ocurre')>Ocurre</option>
  </select>
</div>
<div class="mb-3">
  <label for="referenciasInput" class="form-label">Referencias</label>
  <textarea class="form-control" id="referenciasInput" name="referencias" rows="3">{{ $direccion->referencias }}</textarea>
</div>
