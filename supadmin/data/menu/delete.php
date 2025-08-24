<?php
include '../koneksi.php';
$data = "DELETE FROM supplier WHERE kd_supplier=1921681002";

if ($koneksi->query($data) === TRUE) {
    echo "sukses mendelete baris.";
} else {
    echo "Error mendelete baris karena : " . $koneksi->error;
}

$koneksi->close();
?>
