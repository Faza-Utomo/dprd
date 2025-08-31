<?php
// proses_pengajuan.php

// Aktifkan error reporting biar ketahuan kalau ada error
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "koneksi.php";

// Ambil data form
$nama_media          = $_POST['nama_media'];
$nama_perusahaan     = $_POST['nama_perusahaan'];
$pengajuan_langganan = $_POST['pengajuan_langganan'];
$nama_wartawan       = $_POST['nama_wartawan'];
$harga               = preg_replace('/[^0-9]/', '', $_POST['harga']);
$kontak              = $_POST['kontak'];
$norekening          = $_POST['norekening']; // ini dari form, ke DB masuk ke kolom nomor_rekening
$keterangan          = $_POST['keterangan'];
$status              = $_POST['status'];

// Buat folder utama "File_Media" jika belum ada
$base_dir = "File_Media";
if (!is_dir($base_dir)) {
    mkdir($base_dir, 0777, true);
}

// Buat folder baru berdasarkan nama media
$folder_media = $base_dir . "/" . preg_replace('/[^A-Za-z0-9_\-]/', '_', $nama_media);
if (!is_dir($folder_media)) {
    mkdir($folder_media, 0777, true);
}

// Fungsi untuk upload file
function uploadFile($inputName, $targetDir) {
    if (isset($_FILES[$inputName]) && $_FILES[$inputName]['error'] == UPLOAD_ERR_OK) {
        $filename = time() . "_" . basename($_FILES[$inputName]['name']); // tambahkan timestamp agar unik
        $targetFile = $targetDir . "/" . $filename;
        if (move_uploaded_file($_FILES[$inputName]['tmp_name'], $targetFile)) {
            return $filename;
        }
    }
    return null;
}

// Upload semua file
$ktp_pemilik_perusahaan    = uploadFile("ktp_pemilik_perusahaan", $folder_media);
$npwp_perusahaan           = uploadFile("npwp_perusahaan", $folder_media);
$kta_wartawan              = uploadFile("kta_wartawan", $folder_media);
$cv_perusahaan             = uploadFile("cv_perusahaan", $folder_media);
$surat_penawaran_kerjasama = uploadFile("surat_penawaran_kerjasama", $folder_media);

// Simpan data ke database
$sql = "INSERT INTO media
    (nama_media, nama_perusahaan, pengajuan_langganan, nama_wartawan, harga, kontak, nomor_rekening,
    ktp_pemilik_perusahaan, npwp_perusahaan, kta_wartawan, cv_perusahaan, surat_penawaran_kerjasama, keterangan, status)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $koneksi->prepare($sql);

if (!$stmt) {
    die("Prepare failed: " . $koneksi->error);
}

// 14 parameter = 14 huruf "s"
$stmt->bind_param(
    "ssssssssssssss",
    $nama_media, $nama_perusahaan, $pengajuan_langganan, $nama_wartawan, $harga, $kontak, $norekening,
    $ktp_pemilik_perusahaan, $npwp_perusahaan, $kta_wartawan, $cv_perusahaan, $surat_penawaran_kerjasama,
    $keterangan, $status
);

if ($stmt->execute()) {
    echo "<script>alert('Pengajuan berhasil disimpan!'); window.location.href='index.php';</script>";
} else {
    echo "❌ Query gagal: " . $stmt->error . "<br>";
    echo "SQLSTATE: " . $stmt->sqlstate . "<br>";
    var_dump($_POST);
    var_dump($_FILES);
}

$stmt->close();
$koneksi->close();
?>
