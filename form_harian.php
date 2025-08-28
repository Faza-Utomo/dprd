<?php
session_start();
if (!isset($_SESSION["id_admin"])) {
  header("Location: login_form/formlogin.php");
  exit;
}

include 'koneksi.php';

// Ambil semua data media untuk dropdown
$mediaList = mysqli_query($koneksi, "SELECT id_pengajuan, nama_media, harga FROM media");
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
          <li><a href="#form">Form</a></li>
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
        <h1>FORMULIR PENDATAAN HARIAN</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Formulir Pendataan Harian</li>
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

            <form action="proses_harian.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="300">

              <!-- Dropdown pilih media -->
              <div class="row gy-4">
                <div class="col-md-12">
                  <label for="id_pengajuan" class="form-label">Pilih Media</label>
                  <select name="id_pengajuan" id="id_pengajuan" class="form-control" required>
                    <option value="">-- Pilih Media --</option>
                    <?php while ($row = mysqli_fetch_assoc($mediaList)) { ?>
                      <option value="<?= $row['id_pengajuan'] ?>"
                        data-nama="<?= $row['nama_media'] ?>"
                        data-harga="<?= $row['harga'] ?>">
                        <?= $row['nama_media'] ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>

                <div class="col-md-6">
                  <label for="nama_media" class="form-label">Nama Media</label>
                  <input type="text" name="nama_media" id="nama_media" class="form-control" readonly>
                </div>

                <div class="col-md-6">
                  <label for="harga" class="form-label">Harga</label>
                  <input type="text" name="harga" id="harga" class="form-control" readonly>
                </div>

                <div class="col-md-6">
                  <label for="jumlah" class="form-label">Jumlah</label>
                  <input type="number" name="jumlah" id="jumlah" class="form-control" required>
                </div>

                <div class="col-md-6">
                  <label for="tanggal" class="form-label">Tanggal</label>
                  <input type="datetime-local" name="tanggal" id="tanggal" class="form-control" required>
                </div>

                <div class="col-md-12 text-center">
                  <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
              </div>
            </form>

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

  <!-- Script untuk autofill -->
  <script>
    document.getElementById('id_pengajuan').addEventListener('change', function() {
      let selected = this.options[this.selectedIndex];
      document.getElementById('nama_media').value = selected.getAttribute('data-nama');
      document.getElementById('harga').value = selected.getAttribute('data-harga');
    });
  </script>
</body>
</html>
