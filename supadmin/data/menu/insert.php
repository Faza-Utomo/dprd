<!DOCTYPE html>
<html>
<head>
  <title>Insert data</title>
</head>
<body>
<?php
include '../koneksi.php';
$data = "INSERT INTO supplier (kd_supplier, nama, alamat, no_telp)
VALUES (1921681001, 'Ira', 'tagog papu papu' , '089556678910')";

if ($koneksi->query($data) === TRUE) {
    echo "Data telah berhasil di inputkan";
} else {
    echo "Error menginputkan Data: " . $data . "<br>" . $koneksi->error;
}

$koneksi->close();
?>
</body>
</html>
