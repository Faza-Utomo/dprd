<?php
session_start();
include '../../koneksi.php';

$sess_admin = $_SESSION['id_admin'];

if (isset($sess_admin)) {
  session_destroy();
  echo '<script>alert("anda telah berhasil Logout!");

  window.location.href="formlogin.php"</script>';
}
 ?>
