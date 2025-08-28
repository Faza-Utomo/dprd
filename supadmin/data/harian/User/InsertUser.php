<?php
  include '../../../../koneksi.php';
  $notrans = $_POST['no_trans'];
  $nopes = $_POST['no_pesanan'];
  $cust = $_POST['id_cust'];
  $kasir = $_POST['id_kasir'];
  $tgl = $_POST['tgl_trans'];

  mysqli_query($koneksi , "INSERT INTO transaksi VALUES ('$notrans' , '$nopes' , '$cust' , '$kasir' , '$tgl')");
  header("location:../select.php");
?>
