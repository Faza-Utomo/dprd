<?php
include 'koneksi.php';

$id_harian = $_GET['id_harian'] ?? '';
$id_harian = mysqli_real_escape_string($koneksi, $id_harian);

$result = mysqli_query($koneksi, "SELECT harga FROM harian WHERE id_harian='$id_harian'");
$data = mysqli_fetch_assoc($result);

if ($data) {
    echo json_encode(["success" => true, "harga" => $data['harga']]);
} else {
    echo json_encode(["success" => false]);
}
