<form id="payment-form" method="post" action="<?= site_url() ?>/customer/finish">
    <input type="hidden" name="result_type" id="result-type" value=""></div>
    <input type="hidden" name="result_data" id="result-data" value=""></div>
</form>
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
                    <h5 class="font-weight-bold"> <i class="fas fa-shopping-cart"></i> DETAIL ORDER</h5>
                    <hr>
                    <table class="table table-hover table-responsive table-bordered">
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
                                    <button id="pay-button" data-nama="<?= $details[0]->nama_penerima ?>" data-alamat="<?= $details[0]->alamat ?>" data-no_hp="<?= $details[0]->no_telp ?>" data-no_order="<?= $details[0]->no_order ?>" data-amount="<?= $details[0]->total_bayar ?>" class="btn btn-primary">BAYAR
                                        SEKARANG</button>
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
                        <?php if(isset($details[0]->no_resi) && ($details[0]->status == 2 || $details[0]->status == 3)) { ?>
                        <tr>
                            <td>
                                NO RESI
                            </td>
                            <td>:</td>
                            <td>
                                <?= isset($details[0]->no_resi) ? $details[0]->no_resi : 'Belum Di Input'; ?>
                            </td>
                        </tr>
                        <?php } ?>
                        <?php if ($details[0]->status == 2) { ?>
                        <tr>
                            <td>
                                TERIMA PESANAN
                            </td>
                            <td>:</td>
                            <td>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#diterima<?= $details[0]->id_order ?>">Terima Pesanan</button>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>

            <div class="card border-0 rounded shadow mt-4">
                <div class="card-body">
                    <h5><i class="fa fa-shopping-cart"></i> DETAIL ORDER</h5>
                    <hr>
                    <?php foreach ($details as $value) { ?>
                        <table class="table table-responsive" style="border-style: solid !important;border-color: rgb(198, 206, 214) !important;">
                            <tbody>

                                <tr style="background: #edf2f7;">
                                    <td class="b-none" width="25%">
                                        <div class="wrapper-image-cart">
                                            <img src="<?= base_url('assets/products_img/' . $value->image) ?>"  class="img-fluid" style="width: 100%; height: 100%; object-fit: cover; border-radius: .5rem;">
                                        </div>
                                    </td>
                                    <td class="b-none" width="50%">
                                        <h5><b><?= $value->product_name ?></b></h5>
                                        <table class="table-borderless" style="font-size: 14px">
                                            <tr>
                                                <td style="padding: .20rem">QTY</td>
                                                <td style="padding: .20rem">:</td>
                                                <td style="padding: .20rem"><b><?= isset($value->qty) ? $value->qty : 'N/A'; ?></b></td>
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

<!-- Modal Pesanan Diterima -->
<div class="modal fade" id="diterima<?= $value->id_order ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Pesanan <?= $value->no_order;  ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('customer/diterima/' . $value->id_order);
                echo form_hidden('no_order', $value->no_order);
                ?>
                <div class="form-group">
                    <h6>Apakah Anda yakin pesanan ini telah diterima?</h6>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary">Ya</button>
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

<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-wa-wyKb-Pv2vsXiG"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script type="text/javascript">
    $('#pay-button').click(function(event) {
        var grossamount = $(this).data('amount');
        var no_order = $(this).data('no_order');
        var nama = $(this).data('nama');
        var alamat = $(this).data('alamat');
        var no_hp = $(this).data('no_hp');
        event.preventDefault();
        $(this).attr("disabled", "disabled");

        $.ajax({
            url: '<?= site_url() ?>/customer/token',
            cache: false,
            data: {
                grossamount: grossamount,
                no_order: no_order,
                nama: nama,
                alamat: alamat,
                no_hp: no_hp
            },

            success: function(data) {
                //location = data;

                console.log('token = ' + data);

                var resultType = document.getElementById('result-type');
                var resultData = document.getElementById('result-data');

                function changeResult(type, data) {
                    $("#result-type").val(type);
                    $("#result-data").val(JSON.stringify(data));
                    //resultType.innerHTML = type;
                    //resultData.innerHTML = JSON.stringify(data);
                }

                snap.pay(data, {

                    onSuccess: function(result) {
                        changeResult('success', result);
                        console.log(result.status_message);
                        console.log(result);
                        $("#payment-form").submit();
                    },
                    onPending: function(result) {
                        changeResult('pending', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    },
                    onError: function(result) {
                        changeResult('error', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    }
                });
            }
        });
    });
</script>