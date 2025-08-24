<?php
include '../../koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$check = mysqli_query($koneksi , "SELECT * FROM logadmin WHERE username='$username' and password='$password'") or die(mysqli_error());

if (mysqli_num_rows($check) >= 1) {
  while($row = mysqli_fetch_array($check)) {
    session_start();

    $_SESSION['id_admin'] = $row['id_admin'];
    ?>
    <script>alert("Selamat Datang <?= $row['nama_admin']; ?> Kamu Telah Berhasil Login!!!");

    window.location.href="../index.php"</script>
    <?php
  }

}else {
  echo '<script>alert("Masukkan Username dan Password Dengan Benar!!!");

  window.location.href="formlogin.php"</script>';
}
 ?>
