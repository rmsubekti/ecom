<?php
include "../lib/config.php";
include "../lib/koneksi.php";
$query = "select * from tbl_produk";
$result = $conn->query($query);
?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Produk
                        <small>Semua Produk</small>
                    </h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <a class="btn btn-danger pull-right" href="adminweb.php?module=tambah_produk">
                            <i class="fa fa-power-off"></i> Tambah Produk
                        </a>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    <?php if ($result->num_rows>0) {?>
                        <table class="table table-hover">
                            <tr>
                                <th>Nama</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                            while($row = $result->fetch_assoc()){?>
                                <tr>
                                    <td><?php echo $row['nama_produk']?></td>
                                    <td><img src="upload/<?php 
                                    if (file_exists('upload/'.$row['gambar'])){
                                        echo $row['gambar'];
                                    }else{
                                        echo 'no_image.svg';
                                    }
                                    ?>"
                                             width="150"
                                             alt="<?php echo $row['nama_produk'] ?>"></td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-warning" href="<?php echo $admin_url; ?>adminweb.php?module=edit_produk&id_produk=<?php echo $row['id_produk']; ?>">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a class="btn btn-danger" href="<?php echo $admin_url; ?>module/produk/aksi_hapus.php?&id_produk=<?php echo $row['id_produk']; ?>">
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
