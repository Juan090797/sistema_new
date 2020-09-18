<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="{{ asset('img/AdminLTELogo.png')}}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('storage/image_profiles/'.auth()->user()->image_path)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block">{{ auth()->user()->first_name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- <li class="nav-header">Configuracion</li> -->
          <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link">
              <i class="nav-icon fa fa-bolt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
          <a href="{{ route('ticket.index') }}" class="nav-link ">
              <i class="nav-icon fa fa-ticket-alt"></i>
              <p>
                Tickets
              </p>
            </a>
          </li>

          <li class="nav-header">Configuracion</li>
          <li class="nav-item">
            <a href="{{ route('empresa.index') }}" class="nav-link " >
                <i class="nav-icon fa fa-building"></i>
              <p>
                Empresas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('area.index') }}" class="nav-link ">
              <i class="nav-icon fa fa-sitemap"></i>
              <p>
                Areas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('tipo_tk.index') }}" class="nav-link " >
              <i class="nav-icon fa fa-tag"></i>
              <p>
                Tipos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('prioridad.index') }}" class="nav-link " >
              <i class="nav-icon fa fa-thermometer-half"></i>
              <p>
                Prioridades
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('estado.index') }}" class="nav-link " >
              <i class="nav-icon fa fa-thermometer-half"></i>
              <p>
                Estados
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('categoria.index') }}" class="nav-link" >
              <i class="nav-icon fa fa-thumbtack"></i>
              <p>
                Categorias
              </p>
            </a>
          </li>

          {{-- <li class="nav-header">Reportes</li>
          <li class="nav-item">
            <a href="../calendar.html" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Nuevos Creados
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../gallery.html" class="nav-link">
              <i class="nav-icon far fa-clock"></i>
              <p>
                Pendientes
              </p>
            </a>
          </li> --}}

          <li class="nav-header">Administracion</li>
          <li class="nav-item">
          <a href="{{ route('user.index')}}" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Usuarios
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="../gallery.html" class="nav-link">
              <i class="nav-icon fa fa-unlock-alt"></i>
              <p>
                Roles
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../gallery.html" class="nav-link">
              <i class="nav-icon fa fa-key"></i>
              <p>
                Permisos
              </p>
            </a>
          </li> --}}

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
