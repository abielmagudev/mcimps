<div class="mb-3">
    @isset($title)
    <small class="d-block text-secondary">{{ $title }}</small>
    @endisset

    {{ $slot }}
</div>
