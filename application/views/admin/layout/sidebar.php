<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-store"></i>
        </div>
        <div class="sidebar-brand-text mx-3">BeliGadget<sup>.com</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if ($this->uri->segment(1) == 'admin') {
                            echo 'active';
                        } ?>">
        <a class="nav-link" href="<?= base_url('admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>DASHBOARD</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        PRODUK
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?php if (
                            $this->uri->segment(1) == 'product' || $this->uri->segment(1) == 'categories'
                        ) {
                            echo 'active';
                        } ?>">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-shopping-bag"></i>
            <span>PRODUK</span>
        </a>
        <div id="collapseTwo" class="collapse  <?php if ($this->uri->segment(1) == 'products') {
                                                    echo 'show';
                                                }
                                                if ($this->uri->segment(1) == 'categories') {
                                                    echo 'show';
                                                } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">KATEGORI & PRODUK</h6>
                <a class="collapse-item <?php if (
                                            $this->uri->segment(1) == 'categories'
                                        ) {
                                            echo 'active';
                                        } ?>" href="<?= base_url('categories'); ?>">KATEGORI</a>
                <a class="collapse-item <?php if (
                                            $this->uri->segment(1) == 'products'
                                        ) {
                                            echo 'active';
                                        } ?>" href="<?= base_url('products'); ?>">PRODUK</a>
            </div>
        </div>
    </li>


    <div class="sidebar-heading">
        ORDERS
    </div>

    <li class="nav-item <?php if (
                            $this->uri->segment(1) ==  'orders'
                        ) {
                            echo 'active';
                        } ?>">
        <a class="nav-link" href="#">
            <i class="fas fa-shopping-cart"></i>
            <span>ORDERS</span></a>
    </li>

    <li class="nav-item <?php if (
                            $this->uri->segment(1) ==  'customers'
                        ) {
                            echo 'active';
                        } ?>">
        <a class="nav-link" href="<?= base_url('customers') ?>">
            <i class="fas fa-users"></i>
            <span>CUSTOMERS</span></a>
    </li>

    <li class="nav-item <?php if (
                            $this->uri->segment(1) ==  'sliders'
                        ) {
                            echo 'active';
                        } ?>">
        <a class="nav-link" href="<?= base_url('sliders') ?>">
            <i class="fas fa-laptop"></i>
            <span>SLIDERS</span></a>
    </li>

    <li class="nav-item <?php if (
                            $this->uri->segment(1) ==  'admins'
                        ) {
                            echo 'active';
                        } ?>">
        <a class="nav-link" href="<?= base_url('admins') ?>">
            <i class="fas fa-users"></i>
            <span>ADMINS</span></a>
    </li>

    <li class="nav-item <?php if (
                            $this->uri->segment(2) ==  'settings'
                        ) {
                            echo 'active';
                        } ?>">
        <a class="nav-link" href="<?= base_url('admin/settings') ?>">
            <i class="fas fa-cog"></i>
            <span>SETTINGS TOKO</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->