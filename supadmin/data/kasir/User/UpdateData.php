<?php

include '../../../../koneksi.php';

$id = $_POST['id_kasir'];
$nama = $_POST['nama_kasir'];
$hp = $_POST['no_hp'];

mysqli_query($koneksi , "UPDATE kasir set nama_kasir='$nama', no_hp='$hp' WHERE id_kasir='$id'");
header('location:../select.php');

 ?>
