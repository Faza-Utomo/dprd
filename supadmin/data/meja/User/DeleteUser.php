
  <?php
  include '../../../../koneksi.php';
  $no = $_GET ['no_meja'];

  mysqli_query($koneksi , "DELETE FROM meja WHERE no_meja ='$no'");
  header("location:../select.php");
  ?>
