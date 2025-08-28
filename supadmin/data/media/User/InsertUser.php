<!DOCTYPE html>
<html>
<head>
  <title>
  </title>
</head>
<body>
  <?php
include '../../koneksi.php';
$kd_barang = $_POST ['KodeBarang'];
$nama = $_POST ['Nama'];
$stock = $_POST ['Stock'];
$jenis = $_POST ['Jenis'];

mysqli_query($koneksi , "INSERT INTO barang VALUES ('$kd_barang' , '$nama' , '$stock' , '$jenis')");
header("location:../select.php");
?>
</body>
</html>
