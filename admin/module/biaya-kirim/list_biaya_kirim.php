<?php
include "../lib/config.php";
include "../lib/koneksi.php";
$query = "select * from tbl_biaya_kirim";
$result = $conn->query($query);
?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Biaya Kirim
                        <small>Semua Biaya Kirim</small>
                    </h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <a class="btn btn-danger pull-right" href="adminweb.php?module=tambah_biaya_kirim">
                            <i class="fa fa-power-off"></i> Tambah Biaya Kirim
                        </a>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    <?php if ($result->num_rows>0) {?>
                        <table class="table table-hover">
                            <tr>
                                <th>Kota</th>
                                <th>Biaya Kirim</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                            while($row = $result->fetch_assoc()){?>
                                <tr>
                                    <td><?php echo $row['kota'];?></td>
                                    <td><?php echo $row['biaya'];?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-warning" href="<?php echo $admin_url; ?>adminweb.php?module=edit_biaya_kirim&id_biaya_kirim=<?php echo $row['id_biaya_kirim']; ?>">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a class="btn btn-danger" href="<?php echo $admin_url; ?>module/biaya-kirim/aksi_hapus.php?&id_biaya_kirim=<?php echo $row['id_biaya_kirim']; ?>">
                                                <i class="fa fa-power-off"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    <?php } else {?>
                        <p>Tidak ada data untuk ditampilkan</p>
                    <?php }?>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col-->
    </div>
    <!-- ./row -->
</section>
<!-- /.content -->