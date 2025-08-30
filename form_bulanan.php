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

              <div class="row gy-4">

                <!-- Dropdown ID Harian -->
                <div class="col-md-12">
                  <label for="id_harian" class="form-label">Pilih Data Harian</label>
                  <select name="id_harian" id="id_harian" class="form-control" required>
                    <option value="">-- Pilih Data Harian --</option>
                    <?php while ($row = mysqli_fetch_assoc($harianList)) { ?>
                      <option value="<?= $row['id_harian'] ?>">
                        <?= $row['id_harian'] ?> - <?= $row['nama_media'] ?> (<?= $row['tanggal'] ?>)
                      </option>
                    <?php } ?>
                  </select>
                </div>

                <!-- Bulan -->
                <div class="col-md-6">
                  <label for="bulan" class="form-label">Bulan</label>
                  <input type="text" name="bulan" id="bulan" class="form-control" placeholder="Contoh: Agustus 2025" required>
                </div>

                <!-- Jumlah Hari -->
                <div class="col-md-6">
                  <label for="jml_hari" class="form-label">Jumlah Hari</label>
                  <input type="number" name="jml_hari" id="jml_hari" class="form-control" required>
                </div>

                <!-- Harga (readonly) -->
                <div class="col-md-6">
                  <label for="harga" class="form-label">Harga</label>
                  <input type="text" name="harga" id="harga" class="form-control" readonly>
                </div>

                <!-- Eksemplar (readonly) -->
                <div class="col-md-6">
                  <label for="eksemplar" class="form-label">Eksemplar</label>
                  <input type="text" name="eksemplar" id="eksemplar" class="form-control" readonly>
                </div>

                <!-- Perbulan (readonly) -->
                <div class="col-md-6">
                  <label for="perbulan" class="form-label">Per Bulan</label>
                  <input type="text" name="perbulan" id="perbulan" class="form-control" readonly>
                </div>

                <!-- Triwulan (readonly) -->
                <div class="col-md-6">
                  <label for="triwulan" class="form-label">Triwulan</label>
                  <input type="text" name="triwulan" id="triwulan" class="form-control" readonly>
                </div>

                <!-- Tombol Simpan -->
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

<script>
// Script: Ambil harga & eksemplar berdasarkan id_harian
document.addEventListener("DOMContentLoaded", function () {
  const idHarianSelect = document.getElementById("id_harian");
  const hargaInput = document.getElementById("harga");
  const eksemplarInput = document.getElementById("eksemplar");
  const jmlHariInput = document.getElementById("jml_hari");
  const perbulanInput = document.getElementById("perbulan");
  const triwulanInput = document.getElementById("triwulan");

  function hitung() {
    let harga = parseInt(hargaInput.value) || 0;
    let eksemplar = parseInt(eksemplarInput.value) || 0;
    let jmlHari = parseInt(jmlHariInput.value) || 0;

    let perbulan = harga * eksemplar * jmlHari;
    let triwulan = perbulan * 3;

    perbulanInput.value = perbulan > 0 ? perbulan : "";
    triwulanInput.value = triwulan > 0 ? triwulan : "";
  }

  idHarianSelect.addEventListener("change", function () {
    let idHarian = this.value;
    if (idHarian) {
      fetch("get_harian.php?id=" + idHarian)
        .then(response => response.json())
        .then(data => {
          hargaInput.value = data.harga;
          eksemplarInput.value = data.eksemplar;
          hitung();
        });
    } else {
      hargaInput.value = "";
      eksemplarInput.value = "";
      perbulanInput.value = "";
      triwulanInput.value = "";
    }
  });

  jmlHariInput.addEventListener("input", hitung);
});
</script>


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
</body>
</html>
