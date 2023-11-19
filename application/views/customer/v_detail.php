<div class="container mt-5 mb-5">
    <?php 
        echo form_open('shopping/add');
        echo form_hidden('id', $product->id_product);
        echo form_hidden('name', $product->title);
        echo form_hidden('qty', 1);
        echo form_hidden('price', $product->price - ($product->price * $product->discount) / 100);
        echo form_hidden('discount', $product->discount);
        echo form_hidden('weight', $product->weight);
        echo form_hidden('img', $product->img);
        echo form_hidden('redirect_page', current_url());    
    ?>
    <div class="row">
        <div class="col-md-4">
            <div class="card border-0 rounded shadow">
                <div class="card-body p-2">
                    <img src="<?= base_url('assets/products_img/' . $product->img); ?>" class="w-100 border">
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card border-0 rounded shadow">
                <div class="card-body">
                    <label class="font-weight-bold" style="font-size: 20px;"> <?= $product->title; ?> </label>
                    <hr>
                    <div class="price-product" id="price-product" style="font-size: 1.35rem"><span class="font-weight-bold mr-4" style="color: green">Rp. <?= number_format($product->price - ($product->price * $product->discount) / 100);  ?></span>
                        <s class="font-weight-bold" style="text-decoration-color:red">Rp. <?= number_format($product->price); ?></s>
                    </div>
                    <table class="table table-borderless mt-3">
                        <tbody>
                            <tr>
                                <td class="font-weight-bold">DISKON</td>
                                <td>:</td>
                                <td>
                                    <button class="btn btn-sm" style="color: #ff2f00;border-color: #ff2f00;">
                                        DISKON <?= $product->discount; ?> %
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">BERAT</td>
                                <td>:</td>
                                <td>
                                    <span class="badge badge-pill badge-success" style="font-size: 14px;border-radius: .3rem;padding: .25em .5em .2em;"> <?= $product->weight; ?>
                                        gram</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button id="swalDefaultSuccess" class="btn btn-primary btn-lg btn-block"><i class="fa fa-shopping-cart"></i> TAMBAH KE KERANJANG</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card border-0 rounded shadow">
                <div class="card-body">
                    <label class="font-weight-bold" style="font-size: 20px;">KETERANGAN</label>
                    <hr>
                    <div class="ket">
                        <?= $product->description; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>

<script>
    document.getElementById('swalDefaultSuccess').addEventListener('click', function() {
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'Produk Berhasil Di Tambahkan Ke Keranjang Anda!',
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            timer: 3000
        });
    });
</script>