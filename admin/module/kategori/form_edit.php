<?php
include "../lib/config.php";
include "../lib/koneksi.php";

$idKategori = $_GET['id_kategori'];
$query = "select * from tbl_kategori where id_kategori='$idKategori'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_array($result);
$namaKategori = $data['nama_kategori'];
?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Kategori
                        <small>Edit Kategori</small>
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    <form method="post"action="../admin/module/kategori/aksi_edit.php" class="form-horizontal">
                        <input type="hidden" name="id_kategori" value="<?php echo $idKategori?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="namaKategori" class="col-sm-2 control-label">Nama Kategori</label>
                                <div class="col-sm-10">
                                    <input type="text" value="<?php echo $namaKategori?>" name="nama_kategori" id="namaKategori" class="form-control">
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