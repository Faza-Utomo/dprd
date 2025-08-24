<!DOCTYPE html>
<html>
<head>
  <title>Insert data</title>
</head>
<body>
<?php
include '../koneksi.php';
$data = "INSERT INTO transaksi (kd_transaksi, tgl_transaksi, kd_barang, kd_supplier, jumlah, harga)
VALUES (1921681001, '17 september 2019', 1921681001 , 1921681001 , 10 , 15000)";

if ($koneksi->query($data) === TRUE) {
    echo "Data telah berhasil di inputkan";
} else {
    echo "Error menginputkan Data: " . $data . "<br>" . $koneksi->error;
}

$koneksi->close();
?>
</body>
</html>
