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

    $namaMerek = $_POST['namaMerek'];
    $query = "insert into tbl_merek(nama_merek) values ('$namaMerek')";
    if ($conn->query($query) === true){
        echo "<script>alert('data merek berhasil disimpan');window.location='$admin_url'+'adminweb.php?module=merek';</script>";
    }
    else{
        echo "<script>alert('data merek tidak dapat disimpan');window.location='$admin_url'+'adminweb.php?module=tambah_merek';</script>";
    }
}
