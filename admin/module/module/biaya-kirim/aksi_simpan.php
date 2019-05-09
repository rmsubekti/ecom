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

    $kota = $_POST['kota'];
    $biaya = $_POST['biaya'];
    $query = "insert into tbl_biaya_kirim(kota, biaya) values ('$kota','$biaya')";
    if ($conn->query($query) === true){
        echo "<script>alert('data biaya kirim berhasil disimpan');window.location='$admin_url'+'adminweb.php?module=biaya_kirim';</script>";
    }
    else{
        echo "<script>alert('data biaya kirim tidak dapat disimpan');window.location='$admin_url'+'adminweb.php?module=tambah_biaya_kirim';</script>";
    }
}
