
  <?php
  include '../../../../koneksi.php';
  $no = $_GET ['no_trans'];

  mysqli_query($koneksi , "DELETE FROM transaksi WHERE no_trans ='$no'");
  header("location:../select.php");
  ?>
