<?php
include 'koneksi.php';

$id = $_POST['id_pengajuan'];
$nama_media = $_POST['nama_media'];
$nama_perusahaan = $_POST['nama_perusahaan'];
$langganan = $_POST['pengajuan_langganan'];
$nama_wartawan = $_POST['nama_wartawan'];
$harga = $_POST['harga'];
$kontak = $_POST['kontak'];
$norek = $_POST['nomor_rekening'];
$ket = $_POST['keterangan'];
$status = $_POST['status'];

mysqli_query($koneksi , "UPDATE media
    SET nama_media='$nama_media',
        nama_perusahaan='$nama_perusahaan',
        pengajuan_langganan='$langganan',
        nama_wartawan='$nama_wartawan',
        harga='$harga',
        kontak='$kontak',
        nomor_rekening='$norek',
        keterangan='$ket',
        status='$status'
    WHERE id_pengajuan='$id'");

header('Location: rekap.php');
exit();
?>
