@error($name)
<span class="invalid-feedback">{{ $message }}</span>

@else
<span class="form-text">{{ $slot }}</span>

@enderror
