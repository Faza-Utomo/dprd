<!DOCTYPE html>
<html>
<head>
  <title>Insert data</title>
</head>
<body>
<?php
include '../koneksi.php';
$data = "INSERT INTO barang (kd_barang, nama, stock, jenis_barang)
VALUES (1921681006, 'chitato', 2, 'chiki')";

if ($koneksi->query($data) === TRUE) {
    echo "Data telah berhasil di inputkan";
} else {
    echo "Error menginputkan Data: " . $data . "<br>" . $koneksi->error;
}

$koneksi->close();
?>
</body>
</html>
