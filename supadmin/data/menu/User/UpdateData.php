<?php

include '../../../../koneksi.php';

$kd = $_POST['kd_menu'];
$nama = $_POST['nama_menu'];
$harga = $_POST['harga'];
$jenis = $_POST['jenis'];

mysqli_query($koneksi , "UPDATE menu set nama_menu='$nama' , harga='$harga' , jenis='$jenis' WHERE kd_menu='$kd'");
header('location:../select.php');

 ?>
