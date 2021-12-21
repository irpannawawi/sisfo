 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?=BASE_URL?>/theme/AdminLTE/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=BASE_URL?>/theme/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$_SESSION['nama']?></a>
        </div>
      </div>

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
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=BASE_URL?>/admin/master_data/list_pangkat_golongan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pangkat / Golongan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=BASE_URL?>/admin/master_data/list_jabatan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Jabatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=BASE_URL?>/admin/master_data/list_jenis.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Jenis Kepegawaian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=BASE_URL?>/admin/master_data/list_status_kepegawaian.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Status Kepegawaian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=BASE_URL?>/admin/master_data/list_golongan_ijazah.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Golongan Ijazah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=BASE_URL?>/admin/master_data/list_sk.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data SK</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-street-view"></i>
              <p>
                Data Kepegawaian
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-bill-alt"></i>
              <p>
                Data Penggajian
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Data Mutasi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-whatsapp"></i>
              <p>
                Whatsapp
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Pengaturan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=BASE_URL?>/admin/data_pengguna/list_data_pengguna.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Pengguna
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Data Akun
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=BASE_URL?>/auth/logout.php" class="nav-link">
              <i class="nav-icon fas fa-key"></i>
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