<?php
include 'koneksi.php';

$id_pengajuan = $_POST['id_pengajuan'];
$nama_media   = $_POST['nama_media'];
$harga        = $_POST['harga'];
$eks       = $_POST['eksemplar'];
$tanggal      = $_POST['tanggal'];

mysqli_query($koneksi, "INSERT INTO harian (id_pengajuan, nama_media, harga, eksemplar, tanggal)
VALUES ('$id_pengajuan', '$nama_media', '$harga', '$eks', '$tanggal')");

header("Location: form_harian.php?pesan=berhasil");
?>
