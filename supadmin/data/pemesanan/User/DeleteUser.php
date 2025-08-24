<?php
include '../../../../koneksi.php';
$no = $_GET ['no_pesanan'];

mysqli_query($koneksi , "DELETE FROM pemesanan WHERE no_pesanan ='$no'");
header("location:../select.php");
?>
