<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';

if (isset($_GET['id_pengajuan'])) {
    $id = intval($_GET['id_pengajuan']);

    // Hapus data di tabel harian dulu (kalau ada foreign key)
    mysqli_query($koneksi, "DELETE FROM harian WHERE id_pengajuan='$id'");

    // Hapus data di tabel media
    $hapus = mysqli_query($koneksi, "DELETE FROM media WHERE id_pengajuan='$id'");

    if ($hapus) {
        echo "<script>
                alert('Data berhasil dihapus');
                window.location.href='rekap.php';
              </script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    header("Location: rekap.php");
    exit;
}
?>
