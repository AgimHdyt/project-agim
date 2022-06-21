    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-warning elevation-4">
        <!-- Brand Logo -->
        <a href="<?= base_url('/dashboard'); ?>" class="brand-link">
            <img src="<?= base_url('/assets/dist/img/logo.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
            <span class="brand-text font-weight-light">Pada Mari Clinic</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(http://localhost/clinic/public/assets/dist/img/book-bg.jpg); background-position: center; background-repeat: no-repeat; background-size: cover;">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex border-warning">
                <div class="image">
                    <img src="<?= base_url('/assets/dist/img') . '/' . $user->image; ?>" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="<?= base_url('/profile'); ?>" class="d-block"><?= $user->nama; ?></a>
                </div>
            </div>

            <style>
                .nav-link.active i {
                    color: #1f2d3d !important;
                }
            </style>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon text-warning class
                with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="<?= base_url('/dashboard'); ?>" class="nav-link <?= $title == 'Dashboard' ? 'active' : ''; ?>">
                            <i class="nav-icon text-warning fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('/data-berobat'); ?>" class="nav-link <?= $title == 'Data Berobat' ? 'active' : ''; ?>">
                            <i class="nav-icon text-warning fas fa-id-card-alt"></i>
                            <p>Berobat</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('/data-resep'); ?>" class="nav-link <?= $title == 'Data Resep' ? 'active' : ''; ?>">
                            <i class="nav-icon text-warning fas fa-file-medical"></i>
                            <p>Data Resep</p>
                        </a>
                    </li>
                    <?php if (session()->get('level') === 'Operator' || session()->get('level') === 'Admin') : ?>
                        <li class="nav-item">
                            <a href="<?= base_url('/data-pasien'); ?>" class="nav-link <?= $title == 'Data Pasien' ? 'active' : ''; ?>">
                                <i class="fas fa-procedures nav-icon text-warning"></i>
                                <p>Data Pasien</p>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (session()->get('level') === 'Admin') : ?>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon text-warning fas fa-database"></i>
                                <p>
                                    Master Data
                                    <i class="right text-warning fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('/data-user'); ?>" class="nav-link <?= $title == 'Data User' ? 'active' : ''; ?>">
                                        <i class="fas fa-users nav-icon text-warning"></i>
                                        <p>Data User</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('/data-dokter'); ?>" class="nav-link <?= $title == 'Data Dokter' ? 'active' : ''; ?>">
                                        <i class="fas fa-user-md nav-icon text-warning"></i>
                                        <p>Data Dokter</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('/data-obat'); ?>" class="nav-link <?= $title == 'Data Obat' ? 'active' : ''; ?>">
                                        <i class="fas fa-capsules nav-icon text-warning"></i>
                                        <p>Data Obat</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a href="<?= base_url('/logout'); ?>" class="nav-link">
                            <i class="nav-icon text-warning fas fa-sign-out-alt"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>