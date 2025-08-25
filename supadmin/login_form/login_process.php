<?php
include '../../koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

$check = mysqli_query($koneksi , "SELECT * FROM supadmin WHERE email='$email' and password='$password'") or die(mysqli_error());

if (mysqli_num_rows($check) >= 1) {
  while($row = mysqli_fetch_array($check)) {
    session_start();

    $_SESSION['id_supadmin'] = $row['id_supadmin'];
    ?>
    <script>alert("Selamat Datang <?= $row['nama']; ?> Kamu Telah Berhasil Login!!!");

    window.location.href="../index.php"</script>
    <?php
  }

}else {
  echo '<script>alert("Masukkan Username dan Password Dengan Benar!!!");

  window.location.href="formlogin.php"</script>';
}
 ?>
