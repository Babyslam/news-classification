<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
      <i class="nav-icon fas fa-th"></i>
      <span class="brand-text font-weight-light">MENU</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="brand-link">
          <h1 class="mb-1">{{Auth::user()->name}}</h1>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Riwayat Hasil Klasifikasi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('klasifikasi-berita') }}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Klasifikasi Kategori Berita
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>