<!DOCTYPE html>
<html>
<head>
  <title>Delete Data</title>
</head>
<body>
<?php
include '../koneksi.php';
$data = "DELETE FROM transaksi WHERE kd_transaksi=1921681002";

if ($koneksi->query($data) === TRUE) {
    echo "sukses mendelete baris.";
} else {
    echo "Error mendelete baris karena : " . $koneksi->error;
}

$koneksi->close();
?>
</body>
</html>
