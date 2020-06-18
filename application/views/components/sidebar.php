<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url() ?>" class="brand-link">
    <img src="<?= base_url() ?>/assets/dist/img/logo-gcal.png"
          alt="GCAL Logo"
          class="brand-image img-circle "
          style="opacity: .8">
    <span class="brand-text font-weight-light">Gudang Cisoka</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item active">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item active">
          <a href="<?= base_url() ?>jenis-barang" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Jenis Barang
            </p>
          </a>
        </li>
        <li class="nav-item active">
          <a href="<?= base_url() ?>barang-masuk" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Barang Masuk
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>