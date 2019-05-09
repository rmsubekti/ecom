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

    $idBiayaKirim = $_GET['id_biaya_kirim'];
    $query = "delete from tbl_biaya_kirim where id_biaya_kirim='$idBiayaKirim'";
    if ($conn->query($query) === true){
        echo "<script>alert('data biaya kirim berhasil dihapus');window.location='$admin_url'+'adminweb.php?module=biaya_kirim';</script>";
    }
    else{
        echo "<script>alert('data biaya kirim tidak dapat dihapus');window.location='$admin_url'+'adminweb.php?module=biaya_kirim';</script>";
    }
}
