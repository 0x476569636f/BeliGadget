<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <h5 class="font-weight-bold"><i class="fa fa-shopping-bag"></i> KATEGORI</h5>
                    <hr>
                    <ul class="list-group">
                        <?php foreach ($category as $key => $value) { ?>
                            <a href="<?= base_url('store/brand/' . $value->id); ?>" class="list-group-item shadow-sm font-weight-bold text-decoration-none text-dark">
                                <img src="" style="width:35px"> <?= $value->nama_brand; ?>
                            </a>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9 mb-4">
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php foreach ($slider as $key => $value) { ?>
                        <?php if ($value->status == 1) { ?>
                            <div class="carousel-item <?php if($key < 1) {echo 'active';} ?>">
                                <a href="<?= $value->link ?>">
                                    <img src="<?= base_url('assets/sliders/' . $value->img) ?>" class="d-block w-100 rounded-lg" alt="Sliders">
                                </a>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div><a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid mb-5 mt-4">
    <div class="row">
        <div class="col-md-12">
            <h4 class="font-weight-bold"><i class="fa fa-shopping-bag"></i> PRODUK TERBARU</h4>
            <hr style="border-top: 5px solid rgb(154 155 156);border-radius:.5rem">
        </div>
    </div>
    <!-- data product -->
    <div class="row">
        <?php foreach ($product as $key => $value) { ?>
            <div class="col-md-3 m-3">
                <div class="card h-100 border-0 shadow rounded-md">

                    <div class="card-img">
                        <img src="<?= base_url('assets/products_img/' . $value->img); ?>" class="w-100" style="height: 15em;object-fit:cover;border-top-left-radius: .25rem;border-top-right-radius: .25rem;">
                    </div>
                    <div class="card-body">
                        <a class="card-title font-weight-bold" style="font-size:20px">
                            <?= $value->title; ?>
                        </a>

                        <div class="discount mt-2" style="color: #999"><s>Rp. <?= number_format($value->price);  ?></s> <span style="background-color: darkorange" class="badge badge-pill badge-success text-white">DISKON
                                <?= $value->discount ?> %</span>
                        </div>

                        <div class="price font-weight-bold mt-3" style="color: #47b04b;font-size:20px">
                            Rp. <?= number_format($value->price - ($value->price * $value->discount) / 100);  ?>
                        </div>
                        <a class="btn btn-primary btn-md mt-3 btn-block shadow-md">LIHAT PRODUK</a>
                    </div>
                </div>

            </div>
        <?php } ?>
    </div>
</div>