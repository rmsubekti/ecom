<?php
session_start();
include "../../../lib/config.php";
if (empty($_SESSION['username']) and empty($_SESSION['iduser'])){
    echo "<script>
            alert('anda harus login untuk mengakses module');
            window.location='$admin_url';
          </script>";
    exit();
}

include "../../../lib/koneksi.php";
//gambar
$tmp_file = $_FILES['gambar']['tmp_name'];
$nama_file = $_FILES['gambar']['name'];
$ukuran_file = $_FILES['gambar']['size'];
$tipe_file = $_FILES['gambar']['type'];
$path = "../../upload/". $nama_file;
if (!($tipe_file == "image/jpeg" || $tipe_file == "image/png")){
  echo "<script>
          alert('Produk tidak dapat disimpan, gunakan gambar dengan ekstensi: JPG/JPEG/PNG');
          window.location='$admin_url'+'adminweb.php?module=tambah_produk';
        </script>";
  exit();
}

if ($ukuran_file > 1000000){
    echo "<script>
            alert('Produk tidak dapat disimpan, Ukuran Gambar melebihi 1MB');
            window.location='$admin_url'+'adminweb.php?module=tambah_produk';
          </script>";
      exit();
  }

if (!move_uploaded_file($tmp_file, $path)){
    echo "<script>
            alert('Produk tidak dapat disimpan, File gambar rusak atau server tidak dapat menyimpan file');
            window.location='$admin_url'+'adminweb.php?module=tambah_produk';
          </script>";
      exit();
  }

//lain
$idKategori = $_POST['idKategori'];
$idMerek= $_POST['idMerek'];
$namaProduk = $_POST['namaProduk'];
$deskripsiProduk = $_POST['deskripsiProduk'];
$hargaProduk = $_POST['hargaProduk'];
$slide = $_POST['slide'];
$rekomendasi = $_POST['rekomendasi'];


if ($conn->query(
    "insert into tbl_produk(id_kategori_produk, id_merek, nama_produk, deskripsi, harga, gambar, slide,rekomendasi )
                values ('$idKategori', '$idMerek', '$namaProduk', '$deskripsiProduk','$hargaProduk','$nama_file','$slide','$rekomendasi')")
                === true){
    echo "<script>alert('data produk berhasil disimpan');window.location='$admin_url'+'adminweb.php?module=produk';</script>";
}
else{
  unlink($path);
  echo mysqli_error($conn);
    echo "<script>alert('data produk tidak dapat disimpan');window.location='$admin_url'+'adminweb.php?module=tambah_produk';</script>";
}
