<?php $this->customer_login->proteksi_halaman(); ?>

<div class="container-fluid mb-5 mt-4">
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card border-0 rounded shadow">
                <div class="card-body">
                    <h5 class="font-weight-bold">MAIN MENU</h5>
                    <hr>
                    <ul class="list-group">
                        <a href="<?= base_url('customer/dashboard') ?>" class="list-group-item text-decoration-none text-dark text-uppercase"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                        <a href="<?= base_url('customer/my_orders') ?>" class="list-group-item text-decoration-none text-dark text-uppercase"><i class="fas fa-shopping-cart"></i> My Order</a>
                        <a href="<?= base_url('customer/logout') ?>" style="cursor:pointer" class="list-group-item text-decoration-none text-dark text-uppercase"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9 mb-4">
            <div class="card border-0 rounded shadow">
                <div class="card-body">
                    <h5 class="font-weight-bold"> <i class="fas fa-tachometer-alt"></i> DASHBOARD</h5>
                    <hr>
                    Selamat Datang <strong><?= $this->session->userdata('nama_customer') ?></strong>
                </div>
            </div>
        </div>
    </div>
</div>