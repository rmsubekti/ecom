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

    $idBiayaKirim = $_POST['id_biaya_kirim'];
    $kota = $_POST['kota'];
    $biaya = $_POST['biaya'];
    $query = "update tbl_biaya_kirim set kota='$kota',biaya='$biaya' where id_biaya_kirim='$idBiayaKirim'";
    if ($conn->query($query) === true){
        echo "<script>alert('data biaya kirim berhasil diupdate');window.location='$admin_url'+'adminweb.php?module=biaya_kirim';</script>";
    }
    else{
        echo "<script>alert('data biaya kirim tidak dapat diupdate');window.location='$admin_url'+'adminweb.php?module=edit_biaya_kirim';</script>";
    }
}
