<div class="mb-3">
  <label for="numeroRastreoOrigenInput" class="form-label">Número de rastreo de origen <small class="text-secondary">(Opcional)</small></label>
  <input type="text" class="form-control {{ bsIsInvalidClass('numero_rastreo_origen') }}" id="numeroRastreoOrigenInput" name="numero_rastreo_origen" value="{{ old('numero_rastreo_origen', $guia->numero_rastreo_origen) }}" autofocus>
  <x-invalid-feedback name="numero_rastreo_origen" />
</div>
<div class="mb-3">
  <label for="numeroRastreoUsaInput" class="form-label">Número de rastreo en Estados Unidos</label>
  <input type="text" class="form-control {{ bsIsInvalidClass('numero_rastreo_usa') }}" id="numeroRastreoUsaInput" name="numero_rastreo_usa" value="{{ old('numero_rastreo_usa', $guia->numero_rastreo_usa) }}">
  <x-invalid-feedback name="numero_rastreo_usa" />
</div>
<div class="mb-3">
  <label for="numeroRastreoMexInput" class="form-label">Número de rastreo en México</label>
  <input type="text" class="form-control {{ bsIsInvalidClass('numero_rastreo_mex') }}" id="numeroRastreoMexInput" name="numero_rastreo_mex" value="{{ old('numero_rastreo_mex', $guia->numero_rastreo_mex) }}">
  <x-invalid-feedback name="numero_rastreo_mex" />
</div>
<div class="mb-3">
  <label for="registroSalidaInput" class="form-label">Registro de salida <small class="text-secondary">(Escaneado o ingresado)</small></label>
  <input type="text" class="form-control {{ bsIsInvalidClass('registro_salida') }}" id="registroSalidaInput" name="registro_salida" value="{{ old('registro_salida', $guia->registro_salida) }}">
  <x-invalid-feedback name="registro_salida" />
</div>
<div class="mb-3">
  <label for="transportadoraInput" class="form-label">Transportadora</label>
  <select class="form-select {{ bsIsInvalidClass('transportadora') }}" id="transportadoraInput" name="transportadora">
    <option disabled selected label="Pendiente..."></option>
    @foreach ($transportadoras as $transportadora)
      <option value="{{ $transportadora->id }}" @selected( old('transportadora', $guia->transportadora_id) == $transportadora->id)>{{ $transportadora->nombre }}</option>
    @endforeach
  </select>
  <x-invalid-feedback name="transportadora" />
</div>
<div class="mb-3">
  <label for="observacionesInput" class="form-label">Observaciones</label>
  <textarea class="form-control {{ bsIsInvalidClass('observaciones') }}" id="observacionesInput" name="observaciones" rows="3">{{ old('observaciones', $guia->observaciones) }}</textarea>
  <x-invalid-feedback name="observaciones" />
</div>
