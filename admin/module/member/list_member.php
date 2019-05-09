<?php
include "../lib/config.php";
include "../lib/koneksi.php";
$query = "select * from tbl_member";
$result = $con->query($query);
?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Member
                        <small>Semua Member</small>
                    </h3>
                    <!-- tools box -->
                    <!-- <div class="pull-right box-tools">
                        <a class="btn btn-danger pull-right" href="adminweb.php?module=tambah_kategori">
                            <i class="fa fa-power-off"></i> Tambah Kategori
                        </a>
                    </div> -->
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    <?php if ($result->num_rows>0) {?>
                        <table class="table table-hover">
                            <tr>
                                <th>Nama Member</th>
                                <th>Email</th>
                                <th>Nomor Telpon</th>
                            </tr>
                            <?php
                            while($row = $result->fetch_assoc()){?>
                                <tr>
                                <td><?php echo $row['nama']?></td>
                                <td><?php echo $row['email']?></td>
                                <td><?php echo $row['no_hp']?></td>
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