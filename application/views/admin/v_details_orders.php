<div class="col-md-12">
    <div class="card border-0 rounded shadow">
        <div class="card-body">
            <?php
            if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Success! </h5>';
                echo $this->session->flashdata('pesan');
                echo '</div>';
            }
            ?>
            <h5 class="font-weight-bold"> <i class="fas fa-shopping-cart"></i> DETAIL ORDER <?= $title; ?></h5>
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
                    <td data-nama="<?= $details[0]->nama_penerima ?>">
                        <?= strtoupper(isset($details[0]->nama_penerima) ? $details[0]->nama_penerima : 'N/A'); ?>
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
                        <?= isset($details[0]->courier) ? strtoupper($details[0]->courier) : 'N/A'; ?> /
                        <?= isset($details[0]->layanan_courier) ? strtoupper($details[0]->layanan_courier) : 'N/A'; ?> /
                        Rp.
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
                        METODE PEMBAYARAN
                    </td>
                    <td>:</td>
                    <td>
                        <?= strtoupper(isset($details[0]->provider) ? $details[0]->provider : 'N/A'); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        STATUS
                    </td>
                    <td>:</td>
                    <td>
                        <?php if ($details[0]->status == 0) { ?>
                            <button class="btn btn-light">Belum Di Bayar</button>
                        <?php } else if ($details[0]->status == 1) { ?>
                            <button class="btn btn-success">Sudah di bayar</button>
                        <?php } else if ($details[0]->status == 2) { ?>
                            <button class="btn btn-success">Sedang Dikirim</button>
                        <?php } else if ($details[0]->status == 3) { ?>
                            <button class="btn btn-success">Diterima</button>
                        <?php } else if ($details[0]->status == 4) { ?>
                            <button class="btn btn-danger">Dibatalkan</button>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        NO RESI
                    </td>
                    <td>:</td>
                    <td>
                        <?= isset($details[0]->no_resi) ? $details[0]->no_resi : 'Belum Di Input'; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        ACTION
                    </td>
                    <td>:</td>
                    <td>
                        <button class="btn btn-sm btn-warning m-1" data-toggle="modal" data-target="#inputresi<?= $details[0]->id_order ?>"><i class="fas fa-edit"></i>Input
                            Resi</button>
                        <button class="btn btn-sm btn-warning m-1" data-toggle="modal" data-target="#gantistatus<?= $details[0]->id_order ?>"><i class="fas fa-edit"></i>Ubah
                            Status</button>
                        <a href="<?= base_url() . 'orders/exportpdf/' . $details[0]->no_order ?>"><button class="btn btn-sm btn-success m-1" <i class="fas fa-edit"></i>Download
                                Invoices</button></a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="card border-0 rounded shadow mt-4 mb-4">
        <div class="card-body">
            <h5><i class="fa fa-shopping-cart"></i> Produk Yang Dibeli</h5>
            <hr>
            <?php foreach ($details as $value) { ?>
                <table class="table" style="border-style: solid !important;border-color: rgb(198, 206, 214) !important;">
                    <tbody>

                        <tr style="background: #edf2f7;">
                            <td class="b-none" width="25%">
                                <div class="wrapper-image-cart">
                                    <img src="<?= base_url('assets/products_img/' . $value->image) ?>" style="width: 100%; height: 100%; object-fit: cover; border-radius: .5rem;">
                                </div>
                            </td>
                            <td class="b-none" width="50%">
                                <h5><b><?= $value->product_name ?></b></h5>
                                <table class="table-borderless" style="font-size: 14px">
                                    <tr>
                                        <td style="padding: .20rem">QTY</td>
                                        <td style="padding: .20rem">:</td>
                                        <td style="padding: .20rem"><b><?= isset($value->qty) ? $value->qty : 'N/A'; ?></b>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td class="b-none text-right">
                                <p class="m-0 font-weight-bold">Rp.
                                    <?= number_format($value->price - ($value->price * $value->discount / 100)) ?></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>
</div>

<!-- Modal Input Resi -->
<?php foreach ($details as $key => $value) { ?>
    <div class="modal fade" id="inputresi<?= $value->id_order ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Input Resi Untuk Pesanan: <?= $value->no_order;  ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('orders/inputresi/' . $value->no_order);
                    ?>
                    <div class="form-group">
                        <label for="no_resi">NOMOR RESI:</label>
                        <input type="text" name="no_resi" value="<?= $value->no_resi; ?>" class="form-control" placeholder="Nomor Resi" required>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    <?php
                    echo form_close();
                    ?>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>

<?php } ?>

<!-- Modal Ganti status -->
<?php foreach ($details as $key => $value) { ?>
    <div class="modal fade" id="gantistatus<?= $value->id_order ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ganti Status Untuk Pesanan: <?= $value->no_order;  ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('orders/gantistatus/' . $value->no_order);
                    ?>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <?php if ($value->status == 0) { ?>
                                <option value="<?= $value->status ?>">Belum Di Bayar</option>
                            <?php } else if ($value->status == 1) { ?>
                                <option value="<?= $value->status ?>">Sudah Di Bayar</option>
                            <?php } else if ($value->status == 2) { ?>
                                <option value="<?= $value->status ?>">Sedang Di Kirim</option>
                            <?php } else if ($value->status == 3) { ?>
                                <option value="<?= $value->status ?>">Diterima</option>
                            <?php } else if ($value->status == 4) { ?>
                                <option value="<?= $value->status ?>">Dibatalkan</option>
                            <?php } ?>
                            <option value="0">Belum Di Bayar</option>
                            <option value="1">Sudah Di Bayar</option>
                            <option value="2">Sedang Di Kirim</option>
                            <option value="3">Diterima</option>
                            <option value="4">Dibatalkan</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

<?php } ?>