<article class="card">
    @isset($header)      
    <div class="card-header">{{ $header }}</div>
    @endisset

    <div class="card-body">
        @isset($title)
        <h1 class="card-title fs-5 mb-3">{{ $title }}</h1>
        @endisset

        {{ $slot }}
    </div>

    @isset($footer)      
    <div class="card-footer">{{ $footer }}</div>
    @endisset
</article>
