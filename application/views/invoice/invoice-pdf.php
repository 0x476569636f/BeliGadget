<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="col-md-12">
        <div class="card border-0 rounded shadow">
            <h5 class="font-weight-bold"> <i class="fas fa-shopping-cart"></i> DETAIL ORDER
                <?= $details[0]->no_order; ?>
            </h5>
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
                        <td class="b-none">
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
</body>

</html>