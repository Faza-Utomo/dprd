<!DOCTYPE html>
<html>
<head>
  <title>Insert data</title>
</head>
<body>
<?php
include '../koneksi.php';
$data = "INSERT INTO Konsumen (kd_konsumen, nama, alamat, no_telp)
VALUES (1921681002, 'Zu Dzacky', 'cilame city', 085223065060)";

if ($koneksi->query($data) === TRUE) {
    echo "Data telah berhasil di inputkan";
} else {
    echo "Error menginputkan Data: " . $data . "<br>" . $koneksi->error;
}

$koneksi->close();
?>
</body>
</html>
