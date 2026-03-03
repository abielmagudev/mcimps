<nav aria-label="paginación">
  <ul class="pagination">
    <li class="page-item">
        <a class="page-link {{ !empty($collection->previousPageUrl()) ?: 'disabled' }}" href="{{ $collection->previousPageUrl() }}">Anterior</a>
    </li>
    <li class="page-item">
        <a class="page-link" href="#" aria-current="page">{{ $collection->currentPage() }}</a>
    </li>
    <li class="page-item">
        <a class="page-link {{ !empty($collection->nextPageUrl()) ?: 'disabled' }}" href="{{ $collection->nextPageUrl() }}">Siguiente</a>
    </li>
  </ul>
</nav>
