<?php

include "../lib/koneksi.php";
$idProduk = $_GET['id_produk'];
$qProduk = $conn->query("select * from tbl_produk where id_produk='$idProduk'");
$produk = mysqli_fetch_array($qProduk);
$qkategori = $conn->query("select * from tbl_kategori");
$qmerek = $conn->query("select * from tbl_merek");
?>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Produk
                        <small>Edit Produk</small>
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    <form enctype="multipart/form-data" action="../admin/module/produk/aksi_edit.php" method="POST" class="form-horizontal">
                      <input type="hidden" name="idProduk" value="<?php echo $idProduk; ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="idKategori" class="col-sm-2 control-label">Kategori</label>
                                <div class="col-sm-10">
                                    <select name="idKategori" id="idKategori" class="form-control">
                                        <?php while ($kat = $qkategori->fetch_assoc()){?>
                                        <option <?php if ($kat['id_kategori'] === $produk['id_kategori_produk']) echo "selected"; ?> value="<?php echo $kat['id_kategori'] ?>"><?php echo $kat['nama_kategori'] ?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="idMerek" class="col-sm-2 control-label">Merek</label>
                                <div class="col-sm-10">
                                    <select name="idMerek" id="idMerek" class="form-control">
                                        <?php while ($mer = $qmerek->fetch_assoc()){?>
                                            <option <?php if ($mer['id_merek'] === $produk['id_merek']) echo "selected"; ?> value="<?php echo $mer['id_merek'] ?>"><?php echo $mer['nama_merek'] ?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="namaProduk" class="col-sm-2 control-label">Nama Produk</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $produk['nama_produk'] ?>" placeholder="Nama Produk" id="namaProduk" name="namaProduk">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gambar" class="col-sm-2 control-label">Gambar</label>
                                <div class="col-sm-10">
                                    <img width="200" src="upload/<?php 
                                    if (file_exists('upload/'.$produk['gambar'])){
                                        echo $produk['gambar'];
                                    }else{
                                        echo 'no_image.svg';
                                    }
                                    ?>">
                                    <input type="file" id="gambar" name="gambar">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="deskripsiProduk" class="col-sm-2 control-label">Deskripsi Produk</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $produk['deskripsi'] ?>" placeholder="Deskripsi Produk" id="deskripsiProduk" name="deskripsiProduk">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="hargaProduk" class="col-sm-2 control-label">Harga Produk</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $produk['harga'] ?>" placeholder="Harga Produk" id="hargaProduk" name="hargaProduk">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="slide" class="col-sm-2 control-label">Slide</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="slide" <?php if ($produk['slide'] === 'y') echo "checked"; ?> value="y" name="slide"> Ya
                                    <input type="radio" id="slide"  <?php if ($produk['slide'] === 'n') echo "checked"; ?> value="n" name="slide"> Tidak
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="rekomendasi" class="col-sm-2 control-label">Rekomendasi</label>
                                <div class="col-sm-10">
                                    <input type="radio"  <?php if ($produk['rekomendasi'] === 'y') echo "checked"; ?> id="rekomendasi" value="y" name="rekomendasi">Ya
                                    <input type="radio"  <?php if ($produk['rekomendasi'] === 'n') echo "checked"; ?>  id="rekomendasi" value="n" name="rekomendasi">Tidak
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
