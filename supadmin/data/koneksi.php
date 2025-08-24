<?php
$user = "root";
$host = "localhost";
$pass = "";
$db = "dbpenjualan";

$koneksi = mysqli_connect($host , $user , $pass , $db);

if (mysqli_connect_errno()){
  echo "Koneksi Database Gagal :" . mysqli_connect_error();
}
 ?>
