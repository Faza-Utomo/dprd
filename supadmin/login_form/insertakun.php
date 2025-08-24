
  <?php
include '../../koneksi.php';
$id_admin = $_POST ['id_admin'];
$nama = $_POST ['nama_admin'];
$username = $_POST ['username'];
$password = $_POST ['password'];

mysqli_query($koneksi , "INSERT INTO logadmin VALUES ('$id_admin' , '$nama', '$username' , '$password')");
header("location:formlogin.php");
?>
