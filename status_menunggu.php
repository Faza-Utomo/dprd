<?php
include "koneksi.php";

$id = $_GET['id_pengajuan'];

$update = mysqli_query($koneksi, "UPDATE media SET status='Menunggu Persetujuan' WHERE id_pengajuan='$id'")
          or die(mysqli_error($koneksi));

header('location:rekap.php');
