<?php
session_start();
include "../../../lib/config.php";
if (empty($_SESSION['username']) and empty($_SESSION['iduser'])){
    echo "<script>
            alert('anda harus login untuk mengakses module');
            window.location='$admin_url';
          </script>";
}

include "../../../lib/koneksi.php";
//gambar
$tmp_file = $_FILES['gambar']['tmp_name'];
$nama_file = $_FILES['gambar']['name'];
$ukuran_file = $_FILES['gambar']['size'];
$tipe_file = $_FILES['gambar']['type'];
$path = "../../upload/". $nama_file;

//lain
$idProduk = $_POST['idProduk'];
$idKategori = $_POST['idKategori'];
$idMerek= $_POST['idMerek'];
$namaProduk = $_POST['namaProduk'];
$deskripsiProduk = $_POST['deskripsiProduk'];
$hargaProduk = $_POST['hargaProduk'];
$slide = $_POST['slide'];
$rekomendasi = $_POST['rekomendasi'];

$qproduk = mysqli_fetch_array($conn->query("select * from tbl_produk where id_produk='$idProduk'"));

if (getimagesize($tmp_file) !== false) {
  if (!($tipe_file == "image/jpeg" || $tipe_file == "image/png")){
    echo "<script>
            alert('Produk tidak dapat diupdate, gunakan gambar dengan ekstensi: JPG/JPEG/PNG');
            window.location='$admin_url'+'adminweb.php?module=tambah_produk';
          </script>";
    exit();
  }

  if ($ukuran_file > 1000000){
      echo "<script>
              alert('Produk tidak dapat diupdate, Ukuran Gambar melebihi 1MB');
              window.location='$admin_url'+'adminweb.php?module=tambah_produk';
            </script>";
        exit();
    }

  if (!move_uploaded_file($tmp_file, $path)){
      echo "<script>
              alert('Produk tidak dapat diupdate, File gambar rusak atau server tidak dapat menyimpan file');
              window.location='$admin_url'+'adminweb.php?module=tambah_produk';
            </script>";
        exit();
    }else {
      unlink("../../upload/". $qproduk['gambar']);
    }
}else {
  $nama_file = $qproduk['gambar'];
}

if ($conn->query(
    "update tbl_produk set id_kategori_produk='$idKategori', id_merek='$idMerek', nama_produk='$namaProduk', deskripsi='$deskripsiProduk',
    harga='$hargaProduk', gambar='$nama_file', slide='$slide',rekomendasi='$rekomendasi' where id_produk='$idProduk'")
                === true){
    echo "<script>alert('data produk berhasil diupdate');window.location='$admin_url'+'adminweb.php?module=produk';</script>";
}
else{
  unlink($path);
  echo mysqli_error($conn);
    echo "<script>alert('data produk tidak dapat diupdate');window.location='$admin_url'+'adminweb.php?module=tambah_produk';</script>";
}
