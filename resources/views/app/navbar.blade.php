<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand d-none" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('guias.*') ? 'active' : '' }}" aria-current="page" href="{{ route('guias.index') }}">Guías</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('clientes.*') ? 'active' : '' }}" href="{{ route('clientes.index') }}">Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('transportadoras.*') ? 'active' : '' }}" href="{{ route('transportadoras.index') }}">Transportadoras</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Usuarios</a>
        </li>
      </ul>
    </div>
    <div>
      
      <form action="{{ route('guias.index') }}" class="d-flex" role="search">
        <div class="input-group">
          <input type="search" class="form-control" name="rastreo" value="{{ request('rastreo') }}" placeholder="Número de rastreo">
          <button type="submit" class="btn btn-outline-primary">
            &#128269;
            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg> --}}
          </button>
        </div>
      </form>
    </div>
  </div>
</nav>
