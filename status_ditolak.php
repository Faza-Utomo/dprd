<?php
include "koneksi.php";

$id = $_GET['id_pengajuan'];

mysqli_query($koneksi , "UPDATE media set status='Tidak Disetujui' where id_pengajuan='$id'")
          or die(mysqli_error($koneksi));;

header('location:supadmin/data/media/select.php');
