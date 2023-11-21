<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold"><i class="fas fa-cog"></i> <?= $title; ?></h6>
                </div>

                <div class="card-body">
                    <?php
                    if ($this->session->flashdata('pesan')) {
                        echo '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> Success! </h5>';
                        echo $this->session->flashdata('pesan');
                        echo '</div>';
                    }


                    echo form_open('admin/settings') ?>

                    <div class="form-group">
                        <label>NAMA TOKO</label>
                        <input type="text" name="nama_toko" value="<?= $settings->nama_toko; ?>" placeholder="Masukkan Nama Toko" class="form-control">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>PROVINSI</label>
                                <select name="provinsi" class="form-control">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>KOTA/KABUPATEN</label>
                                <select name="kota" class="form-control">
                                    <option value="<?= $settings->lokasi; ?>"><?= $settings->lokasi; ?></option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>ALAMAT TOKO</label>
                        <textarea class="form-control content" name="alamat_toko" rows="6" placeholder="Alamat Toko" value=""><?= $settings->alamat_toko; ?></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>EMAIL</label>
                                <input type="email" name="email" class="form-control" value="<?= $settings->email; ?>" placeholder="Email">
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>
                        SIMPAN</button>
                    <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.4/tinymce.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    var editor_config = {
        selector: "textarea.content",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
    };

    tinymce.init(editor_config);
</script>

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
    })
</script>