<?php
session_start();
if (!isset($_SESSION["id_admin"])) {
  header("Location: login_form/formlogin.php");
  exit;
}

include 'koneksi.php';

// Ambil data dari form
$id_harian  = $_POST['id_harian'];
$bulan      = $_POST['bulan'];
$jml_hari   = $_POST['jml_hari'];
$eksemplar  = $_POST['eksemplar'];

// Sanitasi input
$id_harian  = mysqli_real_escape_string($koneksi, $id_harian);
$bulan      = mysqli_real_escape_string($koneksi, $bulan);
$jml_hari   = (int)$jml_hari;
$eksemplar  = (int)$eksemplar;

// Ambil harga dari tabel harian berdasarkan id_harian
$result = mysqli_query($koneksi, "SELECT harga FROM harian WHERE id_harian='$id_harian'");
$dataHarian = mysqli_fetch_assoc($result);

if (!$dataHarian) {
    echo "<script>
            alert('Data harian tidak ditemukan!');
            window.history.back();
          </script>";
    exit;
}

$harga = (int)$dataHarian['harga'];

// Hitung otomatis
$perbulan = $harga * $eksemplar * $jml_hari;
$triwulan = $perbulan * 3;

// Simpan ke tabel bulanan
$query = "INSERT INTO bulanan (id_harian, bulan, jml_hari, eksemplar, perbulan, triwulan)
          VALUES ('$id_harian', '$bulan', '$jml_hari', '$eksemplar', '$perbulan', '$triwulan')";

if (mysqli_query($koneksi, $query)) {
    echo "<script>
            alert('Data bulanan berhasil disimpan!');
            window.location.href='index.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal menyimpan data: " . mysqli_error($koneksi) . "');
            window.history.back();
          </script>";
}
?>
