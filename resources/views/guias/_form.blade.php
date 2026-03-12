<div class="mb-3">
  <label for="numeroRastreoOrigenInput" class="form-label">Número de rastreo de origen (Opcional)</label>
  <input type="text" class="form-control {{ bsInputInvalid('numero_rastreo_origen') }}" id="numeroRastreoOrigenInput" name="numero_rastreo_origen" value="{{ old('numero_rastreo_origen', $guia->numero_rastreo_origen) }}">
  <x-invalid-feedback name="numero_rastreo_origen" />
</div>
<div class="mb-3">
  <label for="numeroRastreoUsaInput" class="form-label">Número de rastreo en Estados Unidos {{ isset($guia->numero_rastreo_usa) ? '' : '(Requerido)' }}</label>
  <input type="text" class="form-control {{ bsInputInvalid('numero_rastreo_usa') }}" id="numeroRastreoUsaInput" name="numero_rastreo_usa" value="{{ old('numero_rastreo_usa', $guia->numero_rastreo_usa) }}" @if(!$guia->exists) autofocus @endif required>
  <x-invalid-feedback name="numero_rastreo_usa" />
</div>
<div class="mb-3">
  <label for="transportadoraInput" class="form-label">Transportadora</label>
  <select class="form-select {{ bsInputInvalid('transportadora_id') }}" id="transportadoraInput" name="transportadora_id">
    <option selected label="- Pendiente -"></option>
    @foreach ($transportadoras as $transportadora)
      <option value="{{ $transportadora->id }}" @selected( old('transportadora', $guia->transportadora_id) == $transportadora->id)>{{ $transportadora->nombre }}</option>
    @endforeach
  </select>
  <x-invalid-feedback name="transportadora_id" />
</div>
<div class="mb-3">
  <label for="observacionesInput" class="form-label">Observaciones (Opcional)</label>
  <textarea class="form-control {{ bsInputInvalid('observaciones') }}" id="observacionesInput" name="observaciones" rows="3">{{ old('observaciones', $guia->observaciones) }}</textarea>
  <x-invalid-feedback name="observaciones" />
</div>
<div class="mb-3">
  <label class="form-label" for="nombreContactoInput">Nombre del contacto (Opcional)</label>
    <input type="text" class="form-control {{ bsInputInvalid('nombre_contacto') }}" id="nombreContactoInput" name="nombre_contacto" value="{{ old('nombre_contacto', ($direccion?->prellenados['nombre_contacto'] ?? $guia->nombre_contacto) ) }}">
    <x-invalid-feedback name="nombre_contacto" />
</div>
<div class="mb-3">
  <label class="form-label" for="telefonoContactoInput">Teléfono del contacto (Opcional)</label>
    <input type="text" class="form-control {{ bsInputInvalid('telefono_contacto') }}" id="telefonoContactoInput" name="telefono_contacto" value="{{ old('telefono_contacto', ($direccion?->prellenados['telefono_contacto'] ?? $guia->telefono_contacto) ) }}">
    <x-invalid-feedback name="telefono_contacto" />
</div>
