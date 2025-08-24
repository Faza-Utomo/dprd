<?php

include '../../../../koneksi.php';

$no_pesanan = $_POST['no_pesanan'];
$id_cust = $_POST['id_cust'];
$no_meja = $_POST['no_meja'];
$kd_menu = $_POST['kd_menu'];
$banyak_pesanan = $_POST['banyak_pesanan'];

mysqli_query($koneksi , "UPDATE pemesanan set id_cust='$id_cust' , no_meja='$no_meja', banyak_pesanan='$banyak_pesanan' WHERE no_pesanan='$no_pesanan'");
header('location:../select.php');

 ?>
