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
                    <h5 class="font-weight-bold"> <i class="fas fa-shopping-cart"></i> DETAIL ORDER</h5>
                    <hr>
                    <table class="table table-bordered">
                        <tr>
                            <td style="width: 25%">
                                NO. INVOICE
                            </td>
                            <td style="width: 1%">:</td>
                            <td>
                            <?= isset($details[0]->no_order) ? $details[0]->no_order : 'N/A'; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                NAMA LENGKAP
                            </td>
                            <td>:</td>
                            <td>
                            <?= isset($details[0]->nama_penerima) ? $details[0]->nama_penerima : 'N/A'; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                NO. TELP / WA
                            </td>
                            <td>:</td>
                            <td>
                            <?= isset($details[0]->no_telp) ? $details[0]->no_telp : 'N/A'; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                KURIR / SERVICE / COST
                            </td>
                            <td>:</td>
                            <td>
                            <?= isset($details[0]->courier) ? strtoupper($details[0]->courier) : 'N/A'; ?> / <?= isset($details[0]->layanan_courier) ? strtoupper($details[0]->layanan_courier) : 'N/A'; ?> / Rp.
                            <?= isset($details[0]->ongkir) ? $details[0]->ongkir : 'N/A'; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                ALAMAT LENGKAP
                            </td>
                            <td>:</td>
                            <td>
                            <?= isset($details[0]->alamat) ? $details[0]->alamat : 'N/A'; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                TOTAL PEMBELIAN
                            </td>
                            <td>:</td>
                            <td>
                                Rp. <?= isset($details[0]->total_bayar) ? number_format($details[0]->total_bayar) : 'N/A'; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                STATUS
                            </td>
                            <td>:</td>
                            <td>
                                <button @click="payment(detailOrder.snap_token)" v-if="detailOrder.status == 'pending'" class="btn btn-primary">BAYAR
                                    SEKARANG</button>
                                <button v-else-if="detailOrder.status == 'success'" class="btn btn-success">{{ detailOrder.status }}</button>
                                <button v-else-if="detailOrder.status == 'expired'" class="btn btn-warning">{{ detailOrder.status }}</button>
                                <button v-else-if="detailOrder.status == 'failed'" class="btn btn-danger">{{ detailOrder.status }}</button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card border-0 rounded shadow mt-4">
                <div class="card-body">
                    <h5><i class="fa fa-shopping-cart"></i> DETAIL ORDER</h5>
                    <hr>
                    <?php foreach($details as $value) { ?>
                    <table class="table" style="border-style: solid !important;border-color: rgb(198, 206, 214) !important;">
                        <tbody>

                            <tr style="background: #edf2f7;">
                                <td class="b-none" width="25%">
                                    <div class="wrapper-image-cart">
                                        <img src="<?= base_url('assets/products_img/'.$value->image) ?>" style="width: 100%; height: 100%; object-fit: cover; border-radius: .5rem;">
                                    </div>
                                </td>
                                <td class="b-none" width="50%">
                                    <h5><b><?= $value->product_name ?></b></h5>
                                    <table class="table-borderless" style="font-size: 14px">
                                        <tr>
                                            <td style="padding: .20rem">QTY</td>
                                            <td style="padding: .20rem">:</td>
                                            <td style="padding: .20rem"><b><?= isset($details[0]->qty) ? $details[0]->qty : 'N/A'; ?></b></td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="b-none text-right">
                                    <p class="m-0 font-weight-bold">Rp. <?= number_format($value->price - ($value->price * $value->discount / 100)) ?></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>
</div>