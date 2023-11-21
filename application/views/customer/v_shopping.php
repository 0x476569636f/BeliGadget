<div class="container-fluid mb-5 mt-4">
    <div class="row">
        <div class="col-md-6">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <h5><i class="fa fa-shopping-cart"></i> DETAIL PESANAN</h5>
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
                                            <a href="<?= base_url('shopping/delete/' . $items['rowid']) ?>" class="btn btn-sm btn-danger">
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
                                    <p class="font-weight-bold m-0 h5" id="totalbayar" align="right">
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

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">NAMA LENGKAP</label>
                                <input type="text" class="form-control" id="nama_lengkap" placeholder="Nama Lengkap">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">NO. HP / WHATSAPP</label>
                                <input type="number" class="form-control" id="phone" placeholder="No. HP / WhatsApp">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="provinsi" class="font-weight-bold">PROVINSI</label>
                                <select id="provinsi" name="provinsi" class="form-control">

                                </select>
                            </div>
                        </div>

                        <div class="col-md-12" id="hiddenDiv" style="display: none;">
                            <div class="form-group">
                                <label for="kota" class="font-weight-bold">KOTA / KABUPATEN</label>
                                <select id="kota" name="kota" class="form-control">
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="font-weight-bold">KURIR PENGIRIMAN</label>
                                <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input select-courier" type="radio" name="courier" id="ongkos_kirim-jne" value="jne" checked>
                                    <label class="form-check-label font-weight-bold mr-4" for="ongkos_kirim-jne">
                                        JNE</label>
                                    <input class="form-check-input select-courier" type="radio" name="courier" id="ongkos_kirim-tiki" value="tiki">
                                    <label class="form-check-label font-weight-bold mr-4" for="ongkos_kirim-jnt">TIKI</label>
                                    <input class="form-check-input select-courier" type="radio" name="courier" id="ongkos_kirim-pos" value="pos">
                                    <label class="form-check-label font-weight-bold" for="ongkos_kirim-jnt">POS</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <hr>
                                <label class="font-weight-bold">SERVICE KURIR</label>
                                <br>
                                <div class="form-check form-check-inline" id="service">

                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="font-weight-bold">ALAMAT LENGKAP</label>
                                <textarea class="form-control" id="alamat" rows="3" placeholder="Alamat Lengkap&#10;&#10;Contoh: Perum. Griya Palem Indah, B-17 Jombang Jawa Timur 61419"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-primary btn-lg btn-block">CHECKOUT</button>
                        </div>

                    </div>

                </div>


                <!-- end ongkos kirim -->

            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>template/vendor/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        // Api Request Provinsi
        $.ajax({
            type: "POST",
            url: "<?= base_url('rajaongkir/provinsi') ?>",
            success: function(result) {
                //console.log(result)
                $("select[name=provinsi]").html(result);
            }
        })

        // Api Request Kota
        $("select[name=provinsi]").on("change", function() {
            const provinsi_terpilih = $("option:selected", this).attr("id_provinsi");

            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/kota') ?>",
                data: "id_provinsi=" + provinsi_terpilih,
                success: function(result_kota) {
                    //console.log(result_kota)
                    $("select[name=kota]").html(result_kota);
                }
            });
        })

        $("input[name='courier'], select[name='kota']").on("change", function() {

            var selectedCourier = $("input[name='courier']:checked").val();
            var destination = $("option:selected", "select[name=kota]").val();
            var weight = <?= $weight ?>;

            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/checkongkir') ?>",
                data: 'courier=' + selectedCourier + '&destination=' + destination + '&weight=' + weight,
                success: function(kurir) {
                    $("#service").html(kurir)
                }
            });
        })
    })

    $(document).on("change", "input[name='cost']", function() {
        var ongkirValue = $(this).attr('ongkir');

        // Check if ongkirValue is a valid number
        if (!isNaN(ongkirValue)) {
            // Format ongkirValue
            var ongkir = new Intl.NumberFormat('id-ID', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }).format(parseFloat(ongkirValue));

            // Display formatted ongkir
            $('#ongkir-cart').html(ongkir);

            // Calculate new total
            var bill = parseFloat(ongkirValue) + parseFloat(<?= $this->cart->total() ?>);

            // Check if bill is a valid number
            if (!isNaN(bill)) {
                // Format and display the new total
                var totalBayar = new Intl.NumberFormat('id-ID', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }).format(bill);
                $('#totalbayar').html(totalBayar);
            } else {
                console.error("Invalid bill value");
            }
        } else {
            console.error("Invalid ongkirValue");
        }
    });


    $(document).on("change", "select[name='provinsi']", function() {
        // Get the selected province
        var selectedProvince = $(this).val();

        // Toggle the visibility of the hidden div based on whether a province is selected
        $("#hiddenDiv").toggle(Boolean(selectedProvince));
    });
</script>

<i class="fa fa-subscript" aria-hidden="true"></i>