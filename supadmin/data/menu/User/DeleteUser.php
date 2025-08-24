<?php
include '../../../../koneksi.php';
$kd = $_GET ['kd_menu'];

mysqli_query($koneksi , "DELETE FROM menu WHERE kd_menu ='$kd'");
header("location:../select.php");
?>
