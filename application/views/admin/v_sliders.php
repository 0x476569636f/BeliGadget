<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $title ?></h3>

            <div class="card-tools">
                <button type="button" data-toggle="modal" data-target="#add" class="btn btn-primary"><i class="fas fa-plus"></i>
                    Add</button>
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
            ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>NO</th>
                            <th>Nama Slider</th>
                            <th>Link</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($sliders as $key => $value) { ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <td><?= $value->nama_slider; ?></td>
                                <td><?= $value->link; ?></td>
                                <td><?= $value->img; ?></td>
                                <td><?php
                                    if ($value->status == 1) {
                                        echo '<span class="badge bg-success">Aktif</span>';
                                    } else {
                                        echo '<span class="badge bg-light">Tidak Aktif</span>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit<?= $value->id_slider ?>"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete<?= $value->id_slider ?>"><i class="fas fa-trash"></i></button>
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

<!-- Modal Add Slider -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Slider</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                echo form_open_multipart('sliders/add');
                ?>
                <div class="form-group">
                    <label for="nama_slider">Nama Slider : </label>
                    <input type="text" name="nama_slider" class="form-control" placeholder="Nama Slider" required>
                </div>
                <div class="form-group">
                    <label for="link">Link : </label>
                    <input type="text" name="link" class="form-control" placeholder="Link Slider" required>
                </div>
                <div class="form-group">
                    <label for="img">IMG : </label>
                    <input type="file" name="img" class="form-control" placeholder="Gambar Slider" required>
                </div>
                <div class="form-group">
                    <label for="status">Status: </label>
                    <select name="status" class="form-control">
                        <option value="1" selected>Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>

<!-- Modal Update Status -->
<?php foreach ($sliders as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value->id_slider ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Status</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('sliders/update/' . $value->id_slider);
                    ?>
                    <div class="form-group">
                        <label for="status">Status: </label>
                        <select name="status" class="form-control">
                            <option value="1" <?php if ($value->status == 1) {
                                                    echo 'selected';
                                                } ?>>Aktif</option>
                            <option value="0" <?php if ($value->status == 0) {
                                                    echo 'selected';
                                                } ?>>Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    <?php
                    echo form_close();
                    ?>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>

<?php } ?>

<!-- Modal Delete category -->
<?php foreach ($sliders as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id_slider ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $value->nama_slider ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="p-3">Apakah anda yakin ingin menghapus data ini? </h5>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        <a href="<?= base_url('sliders/delete/' . $value->id_slider) ?>" type="submit" class="btn btn-danger">Delete</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>

<?php } ?>