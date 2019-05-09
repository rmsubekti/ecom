<?php
include "../lib/config.php";
include "../lib/koneksi.php";

$idMerek = $_GET['id_merek'];
$query = "select * from tbl_merek where id_merek='$idMerek'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_array($result);
$namaMerek = $data['nama_merek'];
?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Merek
                        <small>Edit Merek</small>
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    <form method="post"action="../admin/module/merek/aksi_edit.php" class="form-horizontal">
                        <input type="hidden" name="id_merek" value="<?php echo $idMerek?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="namaMerek" class="col-sm-2 control-label">Nama Merek</label>
                                <div class="col-sm-10">
                                    <input type="text" value="<?php echo $namaMerek?>" name="nama_merek" id="namaMerek" class="form-control">
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
