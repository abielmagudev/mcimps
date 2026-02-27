<div class="table-responsive">
    <table class="table {{ $attributes->get('class', 'table-hover') }}">
        @isset($caption)
        <caption>{{ $caption }}</caption>
        @endisset
        
        @isset($thead)
        <thead>{{ $thead }}</thead>
        @endisset

        <tbody>{{ $slot }}</tbody>

        @isset($tfoot)
        <tfoot>{{ $tfoot }}</tfoot>
        @endisset
    </table>
</div>
