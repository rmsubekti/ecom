<?php
$server = "localhost";
$username ="root";
$password="";
$database = "ecom_18.22.2182";
// //docker run --name ecom18 -e MYSQL_ROOT_PASSWORD=secretpassword -e MYSQL_DATABASE=ecom_18.22.2182 -p 3306:3306 -d mysql --default-authentication-plugin=mysql_native_password
// $conn= mysqli_connect($server, $username, $password) or mysqli_connect("127.0.0.1", "root", "secretpassword");
// mysqli_select_db($conn, $database) or die ("Database tidak bisa dibuka");
// if($conn){
//     //echo (" successfully connected");
// }else{
//     echo ("not connected to database");
// }


$conn = mysqli_connect( $server, $username, $password, $database );

if( !$conn ) // == null if creation of connection object failed
{
    $conn = mysqli_connect( "127.0.0.1", $username, "secretpassword", $database )
    // report the error to the user, then exit program
    or die ("connection object not created: ".mysqli_error($conn));
}