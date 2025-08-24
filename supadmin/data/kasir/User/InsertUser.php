<?php
  include '../../../../koneksi.php';
  $id = $_POST['id_kasir'];
  $nama = $_POST['nama_kasir'];
  $hp = $_POST['no_hp'];

  mysqli_query($koneksi , "INSERT INTO kasir VALUES ('$id' , '$nama', '$hp')");
  header("location:../select.php");
?>
