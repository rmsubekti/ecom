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

    $idKategori = $_GET['id_kategori'];
    $query = "delete from tbl_kategori where id_kategori='$idKategori'";
    if ($conn->query($query) === true){
        echo "<script>alert('data kategori berhasil dihapus');window.location='$admin_url'+'adminweb.php?module=kategori';</script>";
    }
    else{
        echo "<script>alert('data kategori tidak dapat dihapus');window.location='$admin_url'+'adminweb.php?module=kategori';</script>";
    }
}
