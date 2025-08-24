<?php

include '../../../../koneksi.php';

$no = $_POST['no_meja'];
$kapas = $_POST['kapasitas'];

mysqli_query($koneksi , "UPDATE meja set kapasitas='$kapas' WHERE no_meja='$no'");
header('location:../select.php');

 ?>
