<?php
session_start();
include '../koneksi.php';

$sess = $_SESSION['id_admin'];

if (isset($sess)) {
  session_destroy();
  echo '<script>alert("anda telah berhasil Logout!");

  window.location.href="formlogin.php"</script>';
}
 ?>
