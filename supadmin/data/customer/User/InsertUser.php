<!DOCTYPE html>
<html>
<head>
  <title>
  </title>
</head>
<body>
  <?php
include '../../koneksi.php';
$kd_konsumen = $_POST ['KodeKonsumen'];
$nama = $_POST ['Nama'];
$alamat = $_POST ['Alamat'];
$notelp = $_POST ['No_Telepon'];

mysqli_query($koneksi , "INSERT INTO konsumen VALUES ('$kd_konsumen' , '$nama' , '$alamat' , '$notelp')");
header("location:../select.php");
?>
</body>
</html>
