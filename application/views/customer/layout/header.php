<header class="section-header">
    <section class="header-main border-bottom">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-3 col-7">
                    <a href="<?= base_url() ?>" class="text-decoration-none" data-abc="true">
                        <span class="logo"><i class="fa fa-store"></i> <?= $settings->nama_toko; ?> </span></a>
                </div>
                <div class="col-md-5 d-none d-md-block">
                    <form action="<?= site_url('store/search') ?>" method="post" class="search-wrap">
                        <div class="input-group w-100"><input type="text" class="form-control search-form" style="width:55%;border: 1px solid #ffffff" name="search_title" placeholder="mau beli apa hari ini ?">
                            <div class="input-group-append">
                                <button class="btn search-button" type="submit"><i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4 col-5">
                    <div class="d-flex justify-content-end">
                        
                        <?php 
                        $keranjang = $this->cart->contents();
                        $item = 0;
                        $total = 0;

                        foreach ($keranjang as $key => $value){
                            $item = $item + $value['qty'];
                            $total = $total + $value['subtotal'];
                        }
                        ?>
                        <div class="cart-header">
                            <a href="<?= base_url('shopping'); ?>" class="btn search-button btn-md" style="color: #ffffff;background-color: #666666;border-color: #ffffff;"><i class="fa fa-shopping-cart"></i> <?= $item; ?> | Rp. <?php echo number_format($total); ?> </a>
                        </div>

                        <div class="account">
                            <a href="<?= base_url('customer/account') ?>" class="btn search-button btn-md d-none d-md-block ml-4"><i class="fa fa-user-circle"></i> ACCOUNT</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</header>