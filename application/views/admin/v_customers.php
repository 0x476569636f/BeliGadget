<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $title ?></h3>
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
            ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>NO</th>
                            <th>Nama Customer</th>
                            <th>Email</th>
                            <th>Bergabung</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($customers as $key => $value) { ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <td><?= $value->nama_customer; ?></td>
                                <td><?= $value->email; ?></td>
                                <td><?= $value->created_at; ?></td>
                                <td>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete<?= $value->id_customer ?>"><i class="fas fa-trash"></i></button>
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


<!-- Modal Delete Products -->
<?php foreach ($customers as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id_customer ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $value->nama_customer?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="p-3">Apakah anda yakin ingin menghapus data ini? </h5>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        <a href="<?= base_url('customers/delete/' . $value->id_customer) ?>" type="submit" class="btn btn-danger">Delete</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>

<?php } ?>