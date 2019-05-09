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

    $idKategori = $_POST['id_kategori'];
    $namaKategori = $_POST['nama_kategori'];
    $query = "update tbl_kategori set nama_kategori='$namaKategori' where id_kategori='$idKategori'";
    if ($conn->query($query) === true){
        echo "<script>alert('data kategori berhasil diupdate');window.location='$admin_url'+'adminweb.php?module=kategori';</script>";
    }
    else{
        echo "<script>alert('data kategori tidak dapat diupdate');window.location='$admin_url'+'adminweb.php?module=edit_kategori';</script>";
    }
}
