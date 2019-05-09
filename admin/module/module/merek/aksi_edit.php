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

    $idMerek = $_POST['id_merek'];
    $namaMerek = $_POST['nama_merek'];
    $query = "update tbl_merek set nama_merek='$namaMerek' where id_merek='$idMerek'";
    if ($conn->query($query) === true){
        echo "<script>alert('data merek berhasil diupdate');window.location='$admin_url'+'adminweb.php?module=merek';</script>";
    }
    else{
        echo "<script>alert('data merek tidak dapat diupdate');window.location='$admin_url'+'adminweb.php?module=edit_merek';</script>";
    }
}
