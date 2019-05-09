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

    $idProduk = $_GET['id_produk'];
    $produk = mysqli_fetch_array($conn->query("select * from tbl_produk where id_produk='$idProduk'"));
    $gambar = "../../upload/".$produk['gambar'];
    if ($conn->query("delete from tbl_produk where id_produk='$idProduk'") === true){
        unlink($gambar);
        echo "<script>alert('data produk berhasil dihapus');window.location='$admin_url'+'adminweb.php?module=produk';</script>";
    }
    else{
        echo "<script>alert('data produk tidak dapat dihapus');window.location='$admin_url'+'adminweb.php?module=produk';</script>";
    }
}
