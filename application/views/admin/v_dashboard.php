<div class="container-fluid">
    <!-- Page Heading -->


    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-md-4">

            <div class="card border-0 shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold">PENDAPATAN BULAN INI</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <h5>Rp. <?= number_format($sumorders_m) ?></h5>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold">PENDAPATAN TAHUN INI</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <h5>Rp. <?= number_format($sumorders_y) ?></h5>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold">SEMUA PENDAPATAN</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <h5>Rp. <?= number_format($sumorders) ?></h5>
                </div>
            </div>
        </div>

    </div>

    <div class="row justify-content-center">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">PENDING / BELUM DI BAYAR
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pending ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-circle-notch fa-spin fa-2x" style="color: #4d72df"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">SUCCESS / SUDAH DI TERIMA
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $success ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x" style="color:#1cc88a"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">CANCELED / DIBATALKAN </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $canceled ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-times-circle fa-2x" style="color:darkred"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>