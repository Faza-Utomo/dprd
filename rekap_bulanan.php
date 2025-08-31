<?php
session_start();
if (!isset($_SESSION["id_admin"])) {
  header("Location: login_form/formlogin.php");
  exit;
}

include 'koneksi.php';

// Ambil data id_harian dari tabel harian untuk dropdown
$harianList = mysqli_query($koneksi, "SELECT id_harian, tanggal, nama_media FROM harian");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>SISTEM INFORMASI HUMAS PROTOKOL</title>

  <!-- Favicons -->
  <link href="assets/img/favicon.jpg" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Raleway:wght@300;400;600;700&family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="service-details-page">

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.php" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename">HUMAS PROTOKOL</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#home" class="active">Home</a></li>
          <li><a href="#form">Form Bulanan</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>
  <!-- End Header -->

  <main class="main">

    <!-- Page Title -->
    <div id="home" class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/hero-bg.png);">
      <div class="container position-relative">
        <h1>FORMULIR DATA BULANAN</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Form Bulanan</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- End Page Title -->

    <!-- ======= Form Section ======= -->
    <section id="form" class="contact section">
      <div class="container" data-aos="fade-up" data-aos-delay="200">

        <div class="row justify-content-center">
          <div class="col-lg-8">

            <form action="proses_bulanan.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="300">

              <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Data Rekap Bulanan</h3>
        </div>
        <div class="box-body">
          <!-- contoh tabel -->
          <table id="tabel2" class="table table-bordered table-striped" style="table-layout: auto; word-wrap: break-word;">
            <button id="btnExport" class="btn btn-success" style="margin-bottom:10px;">
              <i class="fa fa-file-excel-o"></i> Export ke Excel
            </button> 
            <thead>
              <tr>
                <th>No</th>
                    <th>Nama Media</th>
                    <th>Periode Pengiriman</th>
                    <th>Total Pengiriman yang telah<br>dilakukan dalam 1 bulan</th>
                    <th>Total pengiriman (Dalam 1 bulan)</th>
                    <th>Harga pereksemplar</th>
                    <th>Harga perbulan</th>
                    <th>Harga pertriwulan <br> (perkiraan)</th>
              </tr>
            </thead>
            <tbody>
                <?php
                  include 'koneksi.php';
                  $no = 1;
                  $data = mysqli_query($koneksi , "
                    SELECT 
                        m.nama_media,
                        MONTH(h.tanggal) AS bulan,
                        YEAR(h.tanggal) AS tahun,
                        COUNT(DISTINCT DATE(h.tanggal)) AS total_hari,
                        SUM(h.eksemplar) AS total_pengiriman,
                        m.harga AS harga_per_eksemplar,
                        (SUM(h.eksemplar) * m.harga) AS harga_perbulan,
                        (SUM(h.eksemplar) * m.harga * 3) AS harga_triwulan
                    FROM harian h
                    JOIN media m ON h.id_pengajuan = m.id_pengajuan
                    GROUP BY m.nama_media, m.harga, YEAR(h.tanggal), MONTH(h.tanggal)
                    ORDER BY tahun DESC, bulan DESC
                ");
                  while ($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $d['nama_media']; ?></td>
                      <td><?= $d['bulan']."-".$d['tahun']; ?></td>
                      <td><?= $d['total_hari']." x dalam Sebulan"; ?></td>
                      <td><?= $d['total_pengiriman']." eksemplar"; ?></td>
                      <td><?= "Rp " . number_format($d['harga_per_eksemplar'], 0, ',', '.'); ?></td>
                      <td><?= "Rp " . number_format($d['harga_perbulan'], 0, ',', '.'); ?></td>
                      <td><?= "Rp " . number_format($d['harga_triwulan'], 0, ',', '.'); ?></td>
                    <?php
                  }
                    ?>
              </tbody>
          </table>
        </div>
      </div>

          </div>
        </div>

      </div>
    </section>
    <!-- End Form Section -->

  </main>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer dark-background">
    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">FajarDJ & Naufal Faza</strong> <span>All Rights Reserved</span></p>
    </div>
  </footer>
  <!-- End Footer -->

  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- Custom Script untuk hitung otomatis -->
  <script>
    let harga = 0;

    // Ambil harga berdasarkan id_harian (AJAX)
    document.getElementById("id_harian").addEventListener("change", function () {
      const idHarian = this.value;

      if (idHarian) {
        fetch("get_harga.php?id_harian=" + idHarian)
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              harga = parseInt(data.harga);
              hitung();
            }
          });
      } else {
        harga = 0;
        document.getElementById("perbulan").value = "";
        document.getElementById("triwulan").value = "";
      }
    });

    // Hitung otomatis perbulan & triwulan
    function hitung() {
      let jmlHari = parseInt(document.getElementById("jml_hari").value) || 0;
      let eksemplar = parseInt(document.getElementById("eksemplar").value) || 0;

      if (harga > 0 && jmlHari > 0 && eksemplar > 0) {
        let perbulan = harga * jmlHari * eksemplar;
        let triwulan = perbulan * 3;

        document.getElementById("perbulan").value = "Rp " + perbulan.toLocaleString("id-ID");
        document.getElementById("triwulan").value = "Rp " + triwulan.toLocaleString("id-ID");
      }
    }

    document.getElementById("jml_hari").addEventListener("input", hitung);
    document.getElementById("eksemplar").addEventListener("input", hitung);
  </script>

</body>
</html>
