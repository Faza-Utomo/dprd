<!DOCTYPE html>
<html>
<head>
  <title>Delete Data</title>
</head>
<body>
<?php
include '../koneksi.php';
$data = "DELETE FROM barang WHERE kd_barang=1921681010";

if ($koneksi->query($data) === TRUE) {
    echo "sukses mendelete baris.";
} else {
    echo "Error mendelete baris karena : " . $koneksi->error;
}

$koneksi->close();
?>
</body>
</html>
