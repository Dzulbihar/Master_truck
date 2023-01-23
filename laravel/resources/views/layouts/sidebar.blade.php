<!-- Main Sidebar Container -->

  <aside class="main-sidebar main-sidebar-custom sidebar-white-primary elevation-4  bg-white">
    <!-- Brand Logo -->
    <a href="{{url('/home')}}" class="brand-link">
      <img src="{{asset('logo/logo_tpks.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light  "><b>TPKS</b></span>
    </a>
    <hr>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('logo/avatar5.png')}}" width="100%" alt="User Image">
        </div>
        <div class="info">
          <a href="{{url('/home')}}" class="d-block  " >
            {{ Auth::user()->owner_name }} 
          </a>
        </div>
      </div>
      <hr>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item ">
              <a href="{{url('/home')}}" class="nav-link {{($title === "home") ? 'active' : ''}}">
                <i class="nav-icon fa fa-home"></i>
                <p>Dashboard</p>
              </a>
            </li>    

          @if(auth()->user()->role == 'user')
            <li class="nav-item ">
              <a href="{{url('profilperusahaan')}}" class="nav-link {{($title === "profilperusahaan") ? 'active' : ''}}"> 
                <i class="fa fa-user nav-icon"></i>
                <p> Profil </p>
              </a>
            </li>
            @if(auth()->user()->status == 'Aktif')
              <li class="nav-item ">
                <a href="{{url('truck')}}/{{$company->id}}/{{('index')}}" class="nav-link">
                  <i class="fa fa-truck nav-icon"></i>
                  <p>Data Master Truck</p>
                </a>
              </li>

              <li class="nav-item ">
                <a href="{{url('driver')}}/{{$company->id}}/{{('index')}}" class="nav-link">
                  <i class="fa fa-users nav-icon"></i>
                  <p>Data Master Driver</p>
                </a>
              </li>
            @endif
          @endif

          @if(auth()->user()->role == 'admin')
            <li class="nav-item ">
              <a href="{{url('/master_user')}}" class="nav-link {{($title === "master_user") ? 'active' : ''}}">
                <i class="fa fa-users nav-icon"></i>
                <p> Data Master User </p>
              </a>
            </li>

            <li class="nav-item ">
              <a href="{{url('/master_truck')}}" class="nav-link {{($title === "master_truck") ? 'active' : ''}}">
                <i class="fa fa-truck nav-icon"></i>
                <p>Data Master Truck</p>
              </a>
            </li>

            <li class="nav-item ">
              <a href="{{url('/master_driver')}}" class="nav-link {{($title === "master_driver") ? 'active' : ''}}">
                <i class="fa fa-truck nav-icon"></i>
                <p>Data Master Driver</p>
              </a>
            </li>

            <li class="nav-item ">
              <a href="#" class="nav-link {{($title === "email") || ($title === "merk") || ($title === "kota") || ($title === "chasis_code") || ($title === "materi_ujian") || ($title === "jenis_pelanggaran") || ($title === "bentuk_pelanggaran") ? 'active' : ''}}"">
                <i class="fa fa-cogs nav-icon"></i>
                <p>
                  Master
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item ">
                  <a href="{{url('/email')}}" class="nav-link {{($title === "email") ? 'active' : ''}}">
                    <!-- <i class="fa fa-building nav-icon"></i> -->
                    <i class="fa fa-circle nav-icon"></i>
                    <p> Notifikasi Email </p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item ">
                  <a href="{{url('/merk')}}" class="nav-link {{($title === "merk") ? 'active' : ''}}">
                    <!-- <i class="far fa-circle nav-icon"></i> -->
                    <i class="fa fa-circle nav-icon"></i>
                    <p> Merk Truck </p>
                  </a>
                </li>
              </ul>    
              <ul class="nav nav-treeview">
                <li class="nav-item ">
                  <a href="{{url('/kota')}}" class="nav-link {{($title === "kota") ? 'active' : ''}}">
                    <!-- <i class="far fa-circle nav-icon"></i> -->
                    <i class="fa fa-circle nav-icon"></i>
                    <p> Kota </p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item ">
                  <a href="{{url('/chasis_code')}}" class="nav-link {{($title === "chasis_code") ? 'active' : ''}}">
                    <!-- <i class="far fa-dot-circle nav-icon"></i> -->
                    <i class="fa fa-circle nav-icon"></i>
                    <p> Kode Chasis Truck </p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item ">
                  <a href="{{url('/materi_ujian')}}" class="nav-link {{($title === "materi_ujian") ? 'active' : ''}}">
                    <!-- <i class="fa fa-building nav-icon"></i> -->
                    <i class="fa fa-circle nav-icon"></i>
                    <p> Materi Ujian Sopir </p>
                  </a>
                </li>
              </ul>   
                <ul class="nav nav-treeview">
                  <li class="nav-item ">
                    <a href="{{url('/jenis_pelanggaran')}}" class="nav-link {{($title === "jenis_pelanggaran") ? 'active' : ''}}">
                      <i class="fa fa-circle nav-icon"></i>
                      <p> Jenis Pelanggaran</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item ">
                    <a href="{{url('/bentuk_pelanggaran')}}" class="nav-link {{($title === "bentuk_pelanggaran") ? 'active' : ''}}">
                      <i class="fa fa-circle nav-icon"></i>
                      <p> Bentuk Pelanggaran</p>
                    </a>
                  </li>
                </ul> 
            </li>

            <!-- Logout -->
            <li class="nav-item">
              <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out nav-icon"></i>
                <p>Logout</p>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </li>

          @endif 

        </ul>
      </nav>
      <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->

</aside>    