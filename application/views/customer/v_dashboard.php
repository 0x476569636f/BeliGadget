<?php $this->customer_login->proteksi_halaman(); ?>

<?php
if ($this->session->flashdata('pesan')) {
    echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Success! </h5>';
    echo $this->session->flashdata('pesan');
    echo '</div>';
}
echo validation_errors('<div class="alert alert-light alert-dismissible m-2">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5>Alert!</h5>', '</div>');
?>
<div class="container-fluid mb-5 mt-4">
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card border-0 rounded shadow">
                <div class="card-body">
                    <h5 class="font-weight-bold">MAIN MENU</h5>
                    <hr>
                    <ul class="list-group">
                        <a href="<?= base_url('customer/account') ?>" class="list-group-item text-decoration-none text-dark text-uppercase"><i class="fas fa-user-circle"></i> Account</a>
                        <a href="<?= base_url('customer/my_orders') ?>" class="list-group-item text-decoration-none text-dark text-uppercase"><i class="fas fa-shopping-cart"></i> My Order</a>
                        <a href="<?= base_url('customer/logout') ?>" style="cursor:pointer" class="list-group-item text-decoration-none text-dark text-uppercase"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card mb-3">
                <div class="card-body">
                    <h2><i class="fas fa-user-circle"></i> MY ACCOUNT</h2>
                </div>
            </div>


            <!-- Informasi Nama dan Email -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Informasi Akun</h5>
                    <p class="card-text">Nama: <strong><?= $this->session->userdata('nama_customer') ?></strong></p>
                    <p class="card-text">Email: <strong><?= $this->session->userdata('email') ?></strong></p>
                </div>
            </div>

            <!-- Form Ganti Password -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Ganti Password</h5>

                    <!-- Form Ganti Password -->
                    <?php echo form_open('customer/account') ?>
                    <div class="form-group">
                        <label for="currentPassword">Password Saat Ini</label>
                        <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
                    </div>
                    <div class="form-group">
                        <label for="newPassword">Password Baru</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Konfirmasi Password Baru</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>template/vendor/jquery/jquery.min.js"></script>
<script>
    window.setTimeout(() => {
        $(".alert").fadeTo(500, 0).slideUp(500, () => {
            $(this).remove();
        })
    }, 2500)
</script>