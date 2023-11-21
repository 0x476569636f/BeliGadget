<div class="container-fluid mb-5 mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <h4>REGISTER</h4>
                    <hr>
                    <?php
                    echo validation_errors('<div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>', '</div>');

                    if ($this->session->flashdata('pesan')) {
                        echo '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Sukses!</h5>';
                        echo $this->session->flashdata('pesan');
                        echo '</div>';
                    }

                    echo form_open('customer/register'); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" name="nama_customer" class="form-control" placeholder="Full Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" name="email" class="form-control" placeholder="Email Address">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Konfirmasi Password</label>
                                <input type="password" name="confirmpw" class="form-control" placeholder="Konfirmasi Password">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">REGISTER</button>
                    <?php echo form_close() ?>
                </div>
            </div>
            <div class="register mt-3 text-center">
                <p>
                    Suda punya akun ? <a href="<?= base_url('customer/login') ?>">Login Disini !</a>
                </p>
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