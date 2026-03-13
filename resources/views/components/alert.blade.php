<div class="alert alert-{{ $color }} alert-dismissible fade show" role="alert">
  @isset($heading)
  <h5 class="alert-heading">{{ $heading }}</h5>
  @endisset

  {!! $slot !!}
  
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
