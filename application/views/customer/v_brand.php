<div class="container-fluid mb-5 mt-4">
    <div class="row">
        <div class="col-md-12">
            <h4 class="font-weight-bold"><i class="fa fa-shopping-bag"></i> <?= $title; ?></h4>
            <hr style="border-top: 5px solid rgb(154 155 156);border-radius:.5rem">
        </div>
    </div>
    <!-- data product -->
    <div class="row">
        <?php foreach ($product as $key => $value) { ?>
            <div class="col-md-3 mt-4">
                <div class="card h-100 border-0 shadow rounded-md">

                    <div class="card-img text-center">
                        <img src="<?= base_url('assets/products_img/' . $value->img); ?>" class="img-fluid" style="height: 15em;object-fit:cover;border-top-left-radius: .25rem;border-top-right-radius: .25rem;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold" style="font-size:20px">
                            <?= $value->title; ?>
                        </h5>

                        <div class="discount mt-2" style="color: #999"><s>Rp. <?= number_format($value->price);  ?></s> <span style="background-color: darkorange" class="badge badge-pill badge-success text-white">DISKON
                                <?= $value->discount ?> %</span>
                        </div>

                        <div class="price font-weight-bold mt-3" style="color: #47b04b;font-size:20px">
                            Rp. <?= number_format($value->price - ($value->price * $value->discount) / 100);  ?>
                        </div>
                        <a href="<?= base_url('store/detail_product/' . $value->id_product) ?>" class="btn btn-primary btn-md mt-3 btn-block shadow-md">LIHAT PRODUK</a>
                    </div>
                </div>

            </div>
        <?php } ?>
    </div>
</div>