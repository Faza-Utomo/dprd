<?php
// proses_pengajuan.php

include "koneksi.php";

// Ambil data form
$nama_media             = $_POST['nama_media'];
$nama_perusahaan        = $_POST['nama_perusahaan'];
$pengajuan_langganan    = $_POST['pengajuan_langganan'];
$nama_wartawan          = $_POST['nama_wartawan'];
$harga                  = $_POST['harga'];
$kontak                 = $_POST['kontak'];
$norekening             = $_POST['norekening'];
$keterangan             = $_POST['keterangan'];

// Buat folder utama "File Media" jika belum ada
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
$ktp_pemilik_perusahaan     = uploadFile("ktp_pemilik_perusahaan", $folder_media);
$npwp_perusahaan            = uploadFile("npwp_perusahaan", $folder_media);
$kta_wartawan               = uploadFile("kta_wartawan", $folder_media);
$cv_perusahaan              = uploadFile("cv_perusahaan", $folder_media);
$surat_penawaran_kerjasama  = uploadFile("surat_penawaran_kerjasama", $folder_media);

// Simpan data ke database
$sql = "INSERT INTO media
        (nama_media, nama_perusahaan, pengajuan_langganan, nama_wartawan, harga, kontak, norekening,
        ktp_pemilik_perusahaan, npwp_perusahaan, kta_wartawan, cv_perusahaan, surat_penawaran_kerjasama, keterangan)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "sssssssssssss",
    $nama_media, $nama_perusahaan, $pengajuan_langganan, $nama_wartawan, $harga, $kontak, $norekening,
    $ktp_pemilik_perusahaan, $npwp_perusahaan, $kta_wartawan, $cv_perusahaan, $surat_penawaran_kerjasama, $keterangan
);

if ($stmt->execute()) {
    echo "<script>alert('Pengajuan berhasil disimpan!'); window.location.href='index.php';</script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
