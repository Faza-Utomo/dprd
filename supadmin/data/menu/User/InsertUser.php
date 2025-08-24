<?php
include '../../../../koneksi.php';
$kd = $_POST ['kd_menu'];
$nama = $_POST ['nama_menu'];
$harga = $_POST ['harga'];
$jenis = $_POST ['jenis'];

// upload gambar
$gambar = upload();
if (!$gambar) {
  return false;
}


mysqli_query($koneksi , "INSERT INTO menu VALUES ('$kd' , '$nama' , '$harga' , '$jenis', '$gambar')");
header("location:../select.php");
return mysqli_affected_rows($koneksi);



function upload(){

$namafile = $_FILES['gambar']['name'];
$ukuranfile = $_FILES['gambar']['size'];
$error = $_FILES['gambar']['error'];
$tmpname = $_FILES['gambar']['tmp_name'];

// cek apakah tidak ada gambar yg di upload
if ($error === 4) {
  echo "<script>
      alert('pilih gambar terlebih dahulu!');
    </script>";
  return false;
}

// cek apakah yang diupload adalah gambar
$gambarvalid = ['jpg', 'jpeg', 'png'];
$ekstensigambar = explode('.', $namafile);
$ekstensigambar = strtolower(end($ekstensigambar));
if (!in_array($ekstensigambar, $gambarvalid)) {
  echo "<script>
      alert('yang anda upload bukan gambar!');
    </script>";
  return false;
}

// cek jika ukurannya terlalu besar
if ($ukuranfile > 1000000) {
  echo "<script>
      alert('ukuran gambar terlalu besar!');
    </script>";
  return false;
}

// lolos pengecekan gambar siap di upload
move_uploaded_file($tmpname,'../../Gambar/'.$namafile);
return $namafile;

}

?>
