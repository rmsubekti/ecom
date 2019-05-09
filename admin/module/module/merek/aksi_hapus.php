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

    $idMerek = $_GET['id_merek'];
    $query = "delete from tbl_merek where id_merek='$idMerek'";
    if ($conn->query($query) === true){
        echo "<script>alert('data merek berhasil dihapus');window.location='$admin_url'+'adminweb.php?module=merek';</script>";
    }
    else{
        echo "<script>alert('data merek tidak dapat dihapus');window.location='$admin_url'+'adminweb.php?module=merek';</script>";
    }
}
