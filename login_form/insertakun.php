
  <?php
include '../koneksi.php';
$id = $_POST ['id_admin'];
$nama = $_POST ['nama'];
$email = $_POST['email'];
$password = $_POST ['password'];
$hp = $_POST['no_hp'];

mysqli_query($koneksi , "INSERT INTO admin VALUES ('$id' , '$nama','$email', '$password', '$hp')");
header("location:formlogin.php");
?>
