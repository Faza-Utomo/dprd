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
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Dewi
  * Template URL: https://bootstrapmade.com/dewi-free-multi-purpose-html-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="service-details-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.php" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
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

  <main class="main">

    <!-- Page Title -->
    <div id="home" class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/hero-bg.png);">
      <div class="container position-relative">
        <h1>FORMULIR PENGAJUAN MEDIA</h1>
        <p></p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Formulir Media</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Service Details Section -->
    <section id="form" class="contact section">
      <center>
        <div class="col-lg-6">
          <form action="proses_pengajuan.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="500">
            <div class="row gy-4">

              <div class="col-md-6">
                <input type="text" name="nama_media" class="form-control" placeholder="Nama Media" required>
              </div>

              <div class="col-md-6">
                <input type="text" name="nama_perusahaan" class="form-control" placeholder="Nama Perusahaan" required>
              </div>

              <div class="col-md-6">
                <select name="pengajuan_langganan" class="form-control" required>
                  <option value="">-- Pilih Pengajuan Langganan --</option>
                  <option value="Tabloid">Tabloid</option>
                  <option value="Majalah">Majalah</option>
                  <option value="BeritaOnline">Berita Online</option>
                  <option value="MediaOnline">Media Online</option>
                  <option value="Publikasi">Publikasi</option>
                  <option value="Lainnya">Lainnya...</option>
                </select>
              </div>

              <div class="col-md-6">
                <input type="text" class="form-control" name="nama_wartawan" placeholder="Nama Wartawan" required>
              </div>

              <div class="col-md-6">
                <input type="text" class="form-control" name="harga" placeholder="Harga" required>
              </div>

              <div class="col-md-6">
                <input type="text" class="form-control" name="kontak" placeholder="Nomor Kontak" required>
              </div>

              <div class="col-md-6">
                <input type="text" class="form-control" name="norekening" placeholder="Nomor Rekening" required>
              </div>

              <div class="col-md-6">
              </div>

              <div class="col-md-6">
                <label>KTP Pemilik Perusahaan</label>
                <input type="file" name="ktp_pemilik_perusahaan" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
              </div>

              <div class="col-md-6">
                <label>NPWP Perusahaan</label>
                <input type="file" name="npwp_perusahaan" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
              </div>

              <div class="col-md-6">
                <label>KTA Wartawan</label>
                <input type="file" name="kta_wartawan" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
              </div>

              <div class="col-md-6">
                <label>CV Perusahaan</label>
                <input type="file" name="cv_perusahaan" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
              </div>

              <div class="col-md-6">
                <label>Surat Penawaran Kerjasama</label>
                <input type="file" name="surat_penawaran_kerjasama" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
              </div>

              <div class="col-md-12">
                <textarea class="form-control" name="keterangan" rows="4" placeholder="Keterangan"></textarea>
              </div>

              <div class="col-md-12 text-center">
                <button type="submit">Kirim Pengajuan</button>
              </div>
            </div>
          </form>

        </div><!-- End Contact Form -->
      </center>

    </section><!-- /Service Details Section -->

  </main>

  <footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">HUMAS PROTOKOL</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Jalan Raya Cijamil RT 03 RW 06</p>
            <p>Kampung Cijamil, Ngamprah, Kec. Ngamprah,</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+62</span></p>
            <p><strong>Email:</strong> <span>info@dprd.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
          </ul>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">FajarDJ & Naufal Faza</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Pur  chase the pro version with working PHP/AJAX contact form: [buy-url] -->
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
  <script src="assets/vendor/php-email-form/validate.js"></script>
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
