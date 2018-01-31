<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!--<a class="navbar-brand" href="#">Navbar</a>-->
  <a class="navbar-brand" href="#">Mi Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      @guest
        <li class="nav-item">
          <a class="nav-link" href="{{ url("/") }}">Inicio</a>
        </li>
      @else
        <li class="nav-item">
          <a class="nav-link" href="{{ url("/") }}">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url("admin/users") }}">Usuarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url("admin/categories") }}">Categorias</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url("admin/articles") }}">Articulos</a>
        </li>      
        <li class="nav-item">
          <a class="nav-link" href="#">Imagenes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url("admin/tags") }}">Tags</a>
        </li>        
      @endguest

      <!--
      <li class="nav-item active">
        <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
      </li>        
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
      -->
    </ul>
    <!--
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    -->
    <ul class="nav navbar-nav navbar-right">
      <!-- Authentication Links -->
      @guest
          <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Ingresar</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Registrarse</a></li>
      @else
          <li class="nav-item dropdown">
              <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                  {{ Auth::user()->name }} 
                  <!--<span class="caret"></span>-->
              </a>

              <ul class="dropdown-menu">
                  <li>
                      <a class="dropdown-item" 
                          href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                          Salir
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  </li>
              </ul>
          </li>
      @endguest
    </ul>

  </div>
</nav>