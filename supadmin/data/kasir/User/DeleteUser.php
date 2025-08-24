
  <?php
  include '../../../../koneksi.php';
  $id = $_GET ['id_kasir'];

  mysqli_query($koneksi , "DELETE FROM kasir WHERE id_kasir ='$id'");
  header("location:../select.php");
  ?>
