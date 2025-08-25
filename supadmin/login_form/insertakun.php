
  <?php
include '../../koneksi.php';
$id = $_POST ['id_supadmin'];
$nama = $_POST ['nama'];
$email = $_POST ['email'];
$password = $_POST ['password'];
$no = $_POST ['no_hp'];

mysqli_query($koneksi , "INSERT INTO supadmin VALUES ('$id' , '$nama', '$email' , '$password', '$no')");
header("location:formlogin.php");
?>
