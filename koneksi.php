<?php
$user = "root";
$host = "localhost";
$pass = "";
$db = "dprd";

$koneksi = mysqli_connect($host , $user , $pass , $db);

if (mysqli_connect_errno()){
  echo "Koneksi Database Gagal :" . mysqli_connect_error();
}
 ?>
