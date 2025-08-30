<?php
include 'koneksi.php';

$id = $_GET['id'];
$result = mysqli_query($koneksi, "SELECT harga, eksemplar FROM harian WHERE id_harian='$id'");
$data = mysqli_fetch_assoc($result);

echo json_encode($data);
?>
