<?php
include 'koneksi.php';

// fungsi tombol preview
function filePreview($nama_media, $file) {
  if (!$file) {
    return "<span class='text-muted'>Tidak ada file</span>";
  }

  $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

  // ganti spasi dengan underscore biar cocok sama folder aslinya
  $folder = str_replace(" ", "_", $nama_media);

  // path ke folder File_Media/[nama_media]
  $path = "File_Media/" . $folder . "/" . $file;

  if (in_array($ext, ['jpg','jpeg','png','gif','pdf'])) {
    return "<a href='$path' class='glightbox btn btn-outline-primary btn-sm'>
              <i class='bi bi-eye'></i>
            </a>";
  } else {
    return "<a href='$path' target='_blank' class='btn btn-outline-secondary btn-sm'>
              <i class='bi bi-download'></i>
            </a>";
  }
}
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
          <li><a href="#rekap">Rekap</a></li>
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

    <!-- Rekap Section -->
    <section id="rekap" class="contact section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <h1>TABEL PERBAIKAN</h1>
        <div class="box-body">
          <div style="overflow-x:auto;">
            <table id="tabel1" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>No</th>
                <th>Tanggal Pengajuan</th>
                <th>Nama Media</th>
                <th>Nama Perusahaan</th>
                <th>Pengajuan Langganan</th>
                <th>Nama Wartawan</th>
                <th>Harga</th>
                <th>Nomor Kontak</th>
                <th>Nomor Rekening</th>
                <th>KTP Pemilik Perusahaan</th>
                <th>NPWP Perusahaan</th>
                <th>KTA Wartawan</th>
                <th>CV Perusahaan</th>
                <th>Surat Penawaran Kerjasama</th>
                <th>Keterangan</th>
                <th>Status</th>
                <th colspan="2">Aksi</th>
              </tr>
              </thead>
              <tbody>
                <?php
                  include 'koneksi.php';
                  $no = 1;
                  $data = mysqli_query($koneksi , "select * from media where status = 'Kesempatan Edit'");
                  while ($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['tanggal']; ?></td>
                      <td><?php echo $d['nama_media']; ?></td>
                      <td><?php echo $d['nama_perusahaan']; ?></td>
                      <td><?php echo $d['pengajuan_langganan']; ?></td>
                      <td><?php echo $d['nama_wartawan']; ?></td>
                      <td><?= "Rp " . number_format($d['harga'], 0, ',', '.'); ?></td>
                      <td><?php echo $d['kontak']; ?></td>
                      <td><?php echo $d['nomor_rekening']; ?></td>
                      <!-- tombol preview -->
                      <td><?php echo filePreview($d['nama_media'], $d['ktp_pemilik_perusahaan']); ?></td>
                      <td><?php echo filePreview($d['nama_media'], $d['npwp_perusahaan']); ?></td>
                      <td><?php echo filePreview($d['nama_media'], $d['kta_wartawan']); ?></td>
                      <td><?php echo filePreview($d['nama_media'], $d['cv_perusahaan']); ?></td>
                      <td><?php echo filePreview($d['nama_media'], $d['surat_penawaran_kerjasama']); ?></td>
                      <td><?php echo $d['keterangan']; ?></td>
                      <td><?php echo $d['status']; ?></td>
                      <td><a href="form_edit.php?id_pengajuan=<?php echo $d['id_pengajuan']; ?>"><button class="btn btn-warning">EDIT DATA</button></td>
                      <td><input type="button" class="btn btn-success" name="Kirim" value="KIRIM DATA" onclick="location.href='status_menunggu.php?id_pengajuan=<?php echo $d['id_pengajuan']; ?>'"></input></td>
                    </tr>
                    <?php
                  }
                    ?>
              </tbody>
            </table>
          </div>
        </div>

        <br>
        <br>
        <br>
        <br>

        <h1>TABEL HASIL PERSETUJUAN</h1>
        <div class="box-body">
          <div style="overflow-x:auto;">
            <table id="tabel2" class="table table-bordered table-hover">
              <button id="btnExport" class="btn btn-success" style="margin-bottom:10px;">
                <i class="fa fa-file-excel-o"></i> Export ke Excel
              </button>
              <thead>
              <tr>
                <th>No</th>
                <th>Tanggal Pengajuan</th>
                <th>Nama Media</th>
                <th>Nama Perusahaan</th>
                <th>Pengajuan Langganan</th>
                <th>Nama Wartawan</th>
                <th>Harga</th>
                <th>Nomor Kontak</th>
                <th>Nomor Rekening</th>
                <th>KTP Pemilik Perusahaan</th>
                <th>NPWP Perusahaan</th>
                <th>KTA Wartawan</th>
                <th>CV Perusahaan</th>
                <th>Surat Penawaran Kerjasama</th>
                <th>Keterangan</th>
                <th>Status</th>
              </tr>
              </thead>
              <tbody>
                <?php
                  include 'koneksi.php';
                  $no = 1;
                  $data = mysqli_query($koneksi , "select * from media where status='Disetujui' or status='Tidak Disetujui'");
                  while ($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['tanggal']; ?></td>
                      <td><?php echo $d['nama_media']; ?></td>
                      <td><?php echo $d['nama_perusahaan']; ?></td>
                      <td><?php echo $d['pengajuan_langganan']; ?></td>
                      <td><?php echo $d['nama_wartawan']; ?></td>
                      <td><?= "Rp " . number_format($d['harga'], 0, ',', '.'); ?></td>
                      <td><?php echo $d['kontak']; ?></td>
                      <td><?php echo $d['nomor_rekening']; ?></td>
                      <!-- tombol preview -->
                      <td><?php echo filePreview($d['nama_media'], $d['ktp_pemilik_perusahaan']); ?></td>
                      <td><?php echo filePreview($d['nama_media'], $d['npwp_perusahaan']); ?></td>
                      <td><?php echo filePreview($d['nama_media'], $d['kta_wartawan']); ?></td>
                      <td><?php echo filePreview($d['nama_media'], $d['cv_perusahaan']); ?></td>
                      <td><?php echo filePreview($d['nama_media'], $d['surat_penawaran_kerjasama']); ?></td>
                      
                      <td><?php echo $d['keterangan']; ?></td>
                      <td><?php echo $d['status']; ?></td>
                    </tr>
                    <?php
                  }
                    ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>

    </section> <!-- Dnd Rekap Section -->

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

  <!-- Inisialisasi GLightbox -->
  <script>
    const lightbox = GLightbox({ selector: '.glightbox' });
  </script>

</body>

</html>
