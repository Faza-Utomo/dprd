<?php

include '../../../../koneksi.php';

$id = $_POST['id_cust'];
$nama = $_POST['nama_cust'];
$hp = $_POST['no_hp'];
$email = $_POST['email'];

mysqli_query($koneksi , "UPDATE customer set nama_cust='$nama' , no_hp='$hp' , email='$email' WHERE id_cust='$id'");
header('location:../select.php');

 ?>
