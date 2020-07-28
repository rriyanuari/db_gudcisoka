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
          <a href="<?= base_url() ?>" class="nav-link <?= ($file == 'dashboard') ? 'active' : '' ?>"">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li> 
        <li class="nav-item">
          <a href="<?= base_url() ?>jenis-barang" class="nav-link <?= ($file == 'jenisBarang') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Jenis Barang
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url() ?>barang" class="nav-link <?= ($file == 'barang') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Barang
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url() ?>history" class="nav-link <?= ($file == 'history') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              History
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link <?= ($file == 'formTransaksi') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Form Transaksi
            </p>
            <i class="right fas fa-angle-left"></i>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url() ?>transaksi-masuk" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Barang Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>transaksi-keluar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Barang Keluar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>transaksi-return" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Barang Return</p>
                </a>
              </li>
            </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>