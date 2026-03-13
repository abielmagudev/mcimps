<div class="mb-3">
  <label for="numeroRastreoUsaInput" class="form-label">Número de rastreo en USA {{ isset($guia->numero_rastreo_usa) ? '' : '(Requerido)' }}</label>
  <input type="text" class="form-control {{ bsInputInvalid('numero_rastreo_usa') }}" id="numeroRastreoUsaInput" name="numero_rastreo_usa" value="{{ old('numero_rastreo_usa', $guia->numero_rastreo_usa) }}" @if(!$guia->exists) autofocus @endif required>
  <x-invalid-feedback name="numero_rastreo_usa" />
</div>
<div class="mb-3">
  <label for="numeroRastreoOrigenInput" class="form-label">Número de rastreo de origen (Opcional)</label>
  <input type="text" class="form-control {{ bsInputInvalid('numero_rastreo_origen') }}" id="numeroRastreoOrigenInput" name="numero_rastreo_origen" value="{{ old('numero_rastreo_origen', $guia->numero_rastreo_origen) }}">
  <x-invalid-feedback name="numero_rastreo_origen" />
</div>
<div class="mb-3">
  <label class="form-label" for="nombreContactoInput">Nombre del cliente (Opcional)</label>
    <input type="text" class="form-control {{ bsInputInvalid('nombre_cliente') }}" id="nombreContactoInput" name="nombre_cliente" value="{{ old('nombre_cliente', ($direccion?->prellenados['nombre_cliente'] ?? $guia->nombre_cliente) ) }}">
    <x-invalid-feedback name="nombre_cliente" />
</div>
<div class="mb-3">
  <label class="form-label" for="telefonoContactoInput">Teléfono del cliente (Opcional)</label>
  <input type="text" class="form-control {{ bsInputInvalid('telefono_cliente') }}" id="telefonoContactoInput" name="telefono_cliente" value="{{ old('telefono_cliente', ($direccion?->prellenados['telefono_cliente'] ?? $guia->telefono_cliente) ) }}">
  <x-invalid-feedback name="telefono_cliente" />
</div>
<div class="mb-3">
  <label for="transportadoraAmericanaInput" class="form-label">Transportadora Americana</label>
  <select class="form-select {{ bsInputInvalid('transportadora_americana_id') }}" id="transportadoraAmericanaInput" name="transportadora_americana_id">
    <option selected></option>
    @foreach ($transportadorasAmericanas as $transportadora)
      <option value="{{ $transportadora->id }}" @selected( old('transportadora_americana_id', $guia->transportadora_americana_id) == $transportadora->id)>{{ $transportadora->nombre }}</option>
    @endforeach
  </select>
  <x-invalid-feedback name="transportadora_americana_id" />
</div>
<div class="mb-3">
  <label for="transportadoraMexicanaInput" class="form-label">Transportadora Mexicana</label>
  <select class="form-select {{ bsInputInvalid('transportadora_mexicana_id') }}" id="transportadoraMexicanaInput" name="transportadora_mexicana_id">
    <option selected></option>
    @foreach ($transportadorasMexicanas as $transportadora)
      <option value="{{ $transportadora->id }}" @selected( old('transportadora_mexicana_id', $guia->transportadora_mexicana_id) == $transportadora->id)>{{ $transportadora->nombre }}</option>
    @endforeach
  </select>
  <x-invalid-feedback name="transportadora_mexicana_id" />
</div>
<div class="mb-3">
  <label for="observacionesInput" class="form-label">Observaciones (Opcional)</label>
  <textarea class="form-control {{ bsInputInvalid('observaciones') }}" id="observacionesInput" name="observaciones" rows="3">{{ old('observaciones', $guia->observaciones) }}</textarea>
  <x-invalid-feedback name="observaciones" />
</div>
