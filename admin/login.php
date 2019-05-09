<?php
include "../lib/config.php";
include "../lib/koneksi.php";

$user = $_POST['username'];
$pass = $_POST['password'];

if (!ctype_alnum($user) OR !ctype_alnum($pass)) {
    echo "<script>
    alert('Login gagal, Username dan password tidak boleh kosong');
    window.location='$admin_url';
  </script>";
    //echo "$user : $pass";
    //header('location:index.php');
}else {
    //$login = $connec->query("select * from tbl_admin where username='$user' and password='$pass'");
    $query =  "SELECT * FROM tbl_admin WHERE username='$user' AND password='$pass'";
    $result = mysqli_query($conn, $query);
    //echo "$query";
    if (!$result){
        echo "query err";
    }
    if (mysqli_num_rows($result)>0) {
        session_start();
        $log = mysqli_fetch_array($result);
        $_SESSION['iduser'] = $log['id_admin'];
        $_SESSION['namauser'] = $log['nama'];
        //$_SESSION['passuser'] = $pass;

        header('location:adminweb.php?module=home');
    }else {
        echo "<script>
        alert('Login gagal, Kombinasi Username dan password tidak cocok');
        window.location='$admin_url';
      </script>";
    }
}
