<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $title ?></h3>

            <div class="card-tools">
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Success! </h5>';
                echo $this->session->flashdata('pesan');
                echo '</div>';
            }
            if ($this->session->flashdata('error')) {
                echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Error! </h5>';
                echo $this->session->flashdata('error');
                echo '</div>';
            }
            ?>
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>NO</th>
                            <th>No Invoice</th>
                            <th>Nama Penerima</th>
                            <th>Tanggal Order</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($orders as $key => $value) { ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <td><?= $value->no_order; ?></td>
                                <td><?= $value->nama_penerima; ?></td>
                                <td><?= $value->tgl_order; ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('orders/details/'.$value->no_order) ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i>Rincian</a>
                                </td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
