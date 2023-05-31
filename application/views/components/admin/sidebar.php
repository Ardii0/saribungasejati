<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <span class="brand-text font-weight-light"><?php echo $_app_name?></span>
    </a>
    <div class="form-inline p-2">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="<?php echo base_url('dashboard') ;?>"
                        class="nav-link">
                        <i class="nav-icon fas fa-th-large"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('produk') ;?>"
                        class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Produk
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('produk/kategori') ;?>"
                        class="nav-link">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Kategori
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a class="nav-link">
                        <i class="nav-icon fas fa-file-invoice"></i>
                        <p>
                            Laporan Pembayaran
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('produk/pembayaran_notconf/') ;?>" class="nav-link">
                                <p>
                                    Pembayaran Belum Dikonfirmasi
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('produk/pembayaran_conf/') ;?>" class="nav-link">
                                <p>
                                    Pembayaran Dikonfirmasi
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item logout">
                    <a href="<?php echo base_url('auth/logout');?>" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Keluar</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>