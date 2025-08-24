<?php
  include '../../../../koneksi.php';
  $no = $_POST['no_meja'];
  $kapas = $_POST['kapasitas'];

  mysqli_query($koneksi , "INSERT INTO meja VALUES ('$no' , '$kapas')");
  header("location:../select.php");
?>
