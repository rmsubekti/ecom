<?php
session_start();

include "../../../lib/config.php";
if (empty($_SESSION['username']) and empty($_SESSION['iduser'])){
    echo "<script>
            alert('anda harus login untuk mengakses module');
            window.location='$admin_url';
          </script>";
}else{
    include "../../../lib/koneksi.php";

    $namaKategori = $_POST['namaKategori'];
    $query = "insert into tbl_kategori(nama_kategori) values ('$namaKategori')";
    if ($conn->query($query) === true){
        echo "<script>alert('data kategori berhasil disimpan');window.location='$admin_url'+'adminweb.php?module=kategori';</script>";
    }
    else{
      echo mysqli_error($conn);
        echo "<script>alert('data kategori tidak dapat disimpan');window.location='$admin_url'+'adminweb.php?module=tambah_kategori';</script>";
    }
}
