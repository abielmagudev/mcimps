<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand d-none" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('guias.*') ? 'active' : '' }}" aria-current="page" href="{{ route('guias.index') }}">Guias</a>
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
      <form action="{{ route('guias.index') }}" class="d-flex" role="search">
        <div class="input-group">
          <input type="search" class="form-control" name="rastreo" value="{{ request('rastreo') }}" placeholder="Números de rastreo...">
          <button type="button" class="btn btn-outline-primary">Buscar</button>
        </div>
      </form>
    </div>
  </div>
</nav>
