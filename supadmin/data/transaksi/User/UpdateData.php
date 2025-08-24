<?php

include '../../../../koneksi.php';

$notrans = $_POST['no_trans'];
$nopes = $_POST['no_pesanan'];
$idcust = $_POST['id_cust'];
$idkasir = $_POST['id_kasir'];
$tgl = $_POST['tgl_trans'];

mysqli_query($koneksi , "UPDATE transaksi set no_pesanan='$nopes' , id_cust='$idcust' , id_kasir='$idkasir' , tgl_trans='$tgl'  WHERE no_trans='$notrans'");
header('location:../select.php');

 ?>
