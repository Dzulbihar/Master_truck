<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    <!-- <li class="nav-item">
      <a class="nav-link" data-widget="navbar-search" href="#" role="button">
        <i class="fas fa-search"></i>
      </a>
      <div class="navbar-search-block">
        <form class="form-inline">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
              <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </li> -->

    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <img src="{{asset('logo/avatar5.png')}}" alt="" width="30px"> {{ Auth::user()->owner_name }} 
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <div class="dropdown-divider"></div>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item dropdown-footer" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>
        @if(auth()->user()->role == 'user')
        <a class="dropdown-item dropdown-footer" href="{{url('profilperusahaan')}}">Profil</a>
        @endif 
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
      </a>
    </li>
  </ul>
</nav>