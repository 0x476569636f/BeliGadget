<div class="container-fluid mb-5 mt-4">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <?php
            echo validation_errors('<div class="mt-2 alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>', '</div>');


            if ($this->session->flashdata('error')) {
                echo '<div class="mt-2 alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-ban"></i> Alert!</h5>';
                echo $this->session->flashdata('error');
                echo '</div>';
            }

            if ($this->session->flashdata('pesan')) {
                echo '<div class="mt-2 alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> Sukses!</h5>';
                echo $this->session->flashdata('pesan');
                echo '</div>';
            } ?>
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <h4>LOGIN</h4>
                    <hr>
                    <?php echo form_open('customer/login') ?>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input name="email" type="email" class="form-control" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="password" v-model="user.password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Ingatkan Saya</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">LOGIN</button>
                    <?php echo form_close() ?>

                </div>
            </div>
            <div class="register mt-3 text-center">
                <p>
                    Belum punya akun ? <a href="<?= base_url('customer/register') ?>">Daftar Sekarang !</a>
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