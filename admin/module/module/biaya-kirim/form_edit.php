<?php
include "../lib/config.php";
include "../lib/koneksi.php";

$idBiayaKirim = $_GET['id_biaya_kirim'];
$query = "select * from tbl_biaya_kirim where id_biaya_kirim='$idBiayaKirim'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_array($result);
$kota = $data['kota'];
$biaya = $data['biaya'];
?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Biaya Kirim
                        <small>Edit Biaya Kirim</small>
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    <form method="post"action="../admin/module/biaya-kirim/aksi_edit.php" class="form-horizontal">
                        <input type="hidden" name="id_biaya_kirim" value="<?php echo $idBiayaKirim?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="kota" class="col-sm-2 control-label">Kota</label>
                                <div class="col-sm-10">
                                    <input type="text" value="<?php echo $kota?>" name="kota" id="kota" class="form-control">
                                </div>
                                <label for="biaya" class="col-sm-2 control-label">Biaya Kirim</label>
                                <div class="col-sm-10">
                                    <input type="text" value="<?php echo $biaya?>" name="biaya" id="biaya" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col-->
    </div>
    <!-- ./row -->
</section>
<!-- /.content -->
