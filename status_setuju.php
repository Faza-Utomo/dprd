<?php
include "koneksi.php";

$id = $_GET['id_pengajuan'];

$update = mysqli_query($koneksi, "UPDATE media SET status='Disetujui' WHERE id_pengajuan='$id'")
          or die(mysqli_error($koneksi));

header('location:supadmin/data/media/select.php');
