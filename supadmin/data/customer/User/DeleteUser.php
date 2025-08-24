<?php
include '../../../../koneksi.php';
$id = $_GET ['id_cust'];

mysqli_query($koneksi , "DELETE FROM customer WHERE id_cust ='$id'");
header("location:../select.php");
?>
