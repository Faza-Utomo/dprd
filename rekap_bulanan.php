<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>SISTEM INFORMASI HUMAS PROTOKOL</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.jpg" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Raleway:wght@400;700&family=Inter:wght@400;700&display=swap" rel="stylesheet">

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

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
      <a href="index.php" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename">HUMAS PROTOKOL</h1>
      </a>
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#home" class="active">Home</a></li>
          <li><a href="#rekap">Rekap Bulanan</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main class="main">

    <!-- Page Title -->
    <div id="home" class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/hero-bg.png);">
      <div class="container position-relative">
        <h1>DATA REKAP BULANAN</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Rekap Bulanan</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Rekap Bulanan Section -->
    <section id="rekap" class="contact section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <h1>TABEL REKAP BULANAN</h1>
        <div class="box-body">
          <div style="overflow-x:auto;">
            <table id="tabel_bulanan" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>ID Bulanan</th>
                  <th>ID Pengajuan</th>
                  <th>ID Harian</th>
                  <th>Bulan</th>
                  <th>Nama Media</th>
                  <th>Harga</th>
                  <th>Eksemplar</th>
                  <th>Total Pengiriman</th>
                  <th>Harga Bulanan</th>
                  <th>Harga Triwulanan</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;
                  $data = mysqli_query($koneksi , "SELECT * FROM bulanan ORDER BY bulan DESC");
                  while ($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $d['id_bulanan']; ?></td>
                  <td><?php echo $d['id_pengajuan']; ?></td>
                  <td><?php echo $d['id_harian']; ?></td>
                  <td><?php echo $d['bulan']; ?></td>
                  <td><?php echo $d['nama_media']; ?></td>
                  <td><?php echo $d['harga']; ?></td>
                  <td><?php echo $d['eksemplar']; ?></td>
                  <td><?php echo $d['total_pengiriman']; ?></td>
                  <td><?php echo $d['harga_bulanan']; ?></td>
                  <td><?php echo $d['harga_triwulanan']; ?></td>
                </tr>
                <?php
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </section> <!-- End Rekap Section -->

  </main>

  <footer id="footer" class="footer dark-background">
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.php" class="logo d-flex align-items-center">
            <span class="sitename">HUMAS PROTOKOL</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Jalan Raya Cijamil RT 03 RW 06</p>
            <p>Kampung Cijamil, Ngamprah, Kec. Ngamprah,</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+62</span></p>
            <p><strong>Email:</strong> <span>info@dprd.com</span></p>
          </div>
        </div>
      </div>
    </div>
    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">FajarDJ & Naufal Faza</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        Designed by <a href="https://www.instagram.com/_fajardj/">FajarDJ</a> And <a href="https://www.instagram.com/naufal.paja/">Naufal Faza</a>
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
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
</body>
</html>
