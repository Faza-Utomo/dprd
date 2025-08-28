<?php
include 'koneksi.php';

$id_pengajuan = $_POST['id_pengajuan'];
$nama_media   = $_POST['nama_media'];
$harga        = $_POST['harga'];
$jumlah       = $_POST['jumlah'];
$tanggal      = $_POST['tanggal'];

mysqli_query($koneksi, "INSERT INTO harian (id_pengajuan, nama_media, harga, jumlah, tanggal)
VALUES ('$id_pengajuan', '$nama_media', '$harga', '$jumlah', '$tanggal')");

header("Location: index.php?pesan=berhasil");
?>
