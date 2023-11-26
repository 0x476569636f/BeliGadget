<?php
if ($this->session->flashdata('pesan')) {
    echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Success! </h5>';
    echo $this->session->flashdata('pesan');
    echo '</div>';
}
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
        <div class="col-md-9 mb-4">
            <div class="card border-0 rounded shadow">
                <div class="card-body">
                    <h5 class="font-weight-bold"> <i class="fas fa-shopping-cart"></i> MY ORDER</h5>
                    <hr>
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">INVOICE</th>
                                <th scope="col">FULL NAME</th>
                                <th scope="col">SHIPPING</th>
                                <th scope="col">GRAND TOTAL</th>
                                <th scope="col">OPTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  if(!empty($orders)){
                            foreach ($orders as $key => $value) { ?>
                            <tr>
                                <th><?= substr_replace($value->no_order, '-', 8, 0) ?></th>
                                <td><?= $value->nama_penerima; ?></td>
                                <td><?= strtoupper($value->courier) . ' | ' . $value->layanan_courier . ' | Rp. ' . number_format($value->ongkir) ?></td>
                                <td>Rp. <?= number_format($value->total_bayar) ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('customer/details_order/'.$value->no_order) ?>" class="btn btn-sm btn-primary">DETAIL</a>
                                </td>
                            </tr>
                            <?php } } ?>
                        </tbody>
                    </table>
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