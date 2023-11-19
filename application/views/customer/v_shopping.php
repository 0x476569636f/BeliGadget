<div class="container-fluid mb-5 mt-4">
    <div class="row">
        <div class="col-md-6">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <h5><i class="fa fa-shopping-cart"></i> DETAIL PESENAN</h5>
                    <hr>
                    <table class="table" style="border-style: solid !important;border-color: rgb(198, 206, 214) !important;">
                        <tbody>
                            <?php $weight = 0; ?>
                            <?php $i = 1; ?>
                            <?php foreach ($this->cart->contents() as $items) : ?>
                                <?php $weight = $weight + $items['weight'] * $items['qty']; ?>
                                <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>
                                <tr style="background: #edf2f7;">
                                    <td class="b-none" width="25%">
                                        <div class="wrapper-image-cart">
                                            <img src="<?= base_url('assets/products_img/' . $items['img']) ?>" style="width: 100%;border-radius: .5rem">
                                        </div>
                                    </td>
                                    <td class="b-none" width="50%">
                                        <h5><b><?php echo $items['name']; ?></b></h5>
                                        <table class="table-borderless" style="font-size: 14px">
                                            <tr>
                                                <td style="padding: .20rem">QTY</td>
                                                <td style="padding: .20rem">:</td>
                                                <td style="padding: .20rem"><b><?php echo number_format($items['qty']); ?></b></td>
                                            </tr>
                                        </table>

                                    </td>
                                    <td class="b-none text-right">
                                        <p class="m-0 font-weight-bold">Rp. <?php echo number_format($items['price'] * $items['qty']); ?>
                                        </p>

                                        <p class="m-0">
                                            <s style="text-decoration-color:red">Rp. <?php echo number_format($items['price'] / (1 - $items['discount'] / 100) * $items['qty']); ?>
                                            </s>
                                        </p>

                                        <br>
                                        <div class="text-right">
                                            <a href="<?= base_url('shopping/delete/'.$items['rowid']) ?>" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                        </tbody>
                        <?php $i++; ?>

                    <?php endforeach; ?>
                    </table>

                    <table class="table table-default">
                        <tbody>
                            <tr>
                                <td class="set-td text-left" width="60%">
                                    <p class="m-0">JUMLAH </p>
                                </td>
                                <td class="set-td  text-right" width="30%">&nbsp; : Rp.</td>
                                <td class="text-right set-td ">
                                    <p class="m-0" id="subtotal">
                                        <?php echo $this->cart->format_number($this->cart->total()); ?>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td class="set-td text-left border-0">
                                    <p class="m-0">ONGKOS KIRIM (<strong><?= $weight; ?></strong> gram)</p>
                                </td>
                                <td class="set-td border-0 text-right">&nbsp; : Rp.</td>
                                <td class="set-td border-0 text-right">
                                    <p class="m-0" id="ongkir-cart"> 0</p>
                                </td>
                            </tr>
                            <tr>
                                <td class=" text-left border-0">
                                    <p class="font-weight-bold m-0 h5 text-uppercase">Grand Total </p>
                                </td>
                                <td class=" border-0 text-right">&nbsp; : Rp.</td>
                                <td class=" border-0 text-right">
                                    <p class="font-weight-bold m-0 h5" align="right">
                                        0 </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow rounded">

                <!-- start ongkos kirim -->

                <div class="card-body">
                    <h5><i class="fa fa-user-circle"></i> RINCIAN PENGIRIMAN</h5>
                    <hr>

                </div>

                <!-- end ongkos kirim -->

            </div>
        </div>
    </div>
</div>