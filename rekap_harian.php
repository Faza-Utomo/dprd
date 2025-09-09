<?php
include 'koneksi.php';

// fungsi tombol preview
function filePreview($nama_media, $file) {
  if (!$file) {
    return "<span class='text-muted'>Tidak ada file</span>";
  }

  $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

  $folder = str_replace(" ", "_", $nama_media);
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
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Raleway:wght@100;200;300;400;500;600;700;800;900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

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

  <!-- Header -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
      <a href="index.php" class="logo d-flex align-items-center me-auto">
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
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Formulir Media</li>
          </ol>
        </nav>
      </div>
    </div>

    <!-- Rekap Section -->
    <section id="rekap" class="contact section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <h1>TABEL HASIL REKAP DATA HARIAN</h1>
        <div class="box-body">
          <div style="overflow-x:auto;">
            <table id="tabel2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>No</th>
                <th>ID Harian</th>
                <th>ID Pengajuan</th>
                <th>Nama Media</th>
                <th>Harga</th>
                <th>Eksemplar</th>
                <th>Tanggal</th>
              </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;
                  $data = mysqli_query($koneksi , "select * from harian");
                  while ($d = mysqli_fetch_array($data)){
                    echo "<tr>
                            <td>".$no++."</td>
                            <td>".$d['id_harian']."</td>
                            <td>".$d['id_pengajuan']."</td>
                            <td>".$d['nama_media']."</td>
                            <td>".$d['harga']."</td>
                            <td>".$d['eksemplar']."</td>
                            <td>".$d['tanggal']."</td>
                          </tr>";
                  }
                ?>
              </tbody>
            </table>
            <button id="btnExport" class="btn btn-success mt-3">
              <i class="bi bi-file-earmark-excel"></i> Export ke Excel
            </button>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- Footer -->
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
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="index.php">Home</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="https://dprd.bandungbaratkab.go.id/">Website DPRD</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="https://www.instagram.com/humasdprdkbb__/">Humas DPRD KBB</a></li>
          </ul>
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

  </script>
<!-- Export Excel (ExcelJS + FileSaver) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/exceljs/4.3.0/exceljs.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>

  <script>
    document.getElementById("btnExport").addEventListener("click", function () {
      var workbook = new ExcelJS.Workbook();
      var worksheet = workbook.addWorksheet("Rekap Data");

      // ambil tabel HTML
      var tabel = document.getElementById("tabel2");
      var rows = tabel.querySelectorAll("tr");

      rows.forEach((row, rowIndex) => {
        let cells = row.querySelectorAll("th, td");
        let rowData = [];
        cells.forEach((cell) => {
          rowData.push(cell.innerText);
        });
        worksheet.addRow(rowData);

        // styling header
        if (rowIndex === 0) {
          cells.forEach((cell, colIndex) => {
            let excelCell = worksheet.getRow(1).getCell(colIndex+1);
            excelCell.font = { bold: true };
            excelCell.fill = { type: "pattern", pattern: "solid", fgColor: { argb: "FFD9D9D9" } };
            excelCell.border = {
              top: {style:'thin'},
              left: {style:'thin'},
              bottom: {style:'thin'},
              right: {style:'thin'}
            };
          });
        }
      });

      // kasih border semua cell
      worksheet.eachRow(function(row) {
        row.eachCell(function(cell) {
          cell.border = {
            top: {style:'thin'},
            left: {style:'thin'},
            bottom: {style:'thin'},
            right: {style:'thin'}
          };
        });
      });

      // auto width kolom
      worksheet.columns.forEach(function (column) {
        let maxLength = 0;
        column.eachCell({ includeEmpty: true }, function (cell) {
          let columnLength = cell.value ? cell.value.toString().length : 10;
          if (columnLength > maxLength ) {
            maxLength = columnLength;
          }
        });
        column.width = maxLength < 10 ? 10 : maxLength + 2;
      });

      // simpan file
      workbook.xlsx.writeBuffer().then(function (data) {
        var blob = new Blob([data], {type:"application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"});
        let today = new Date();
        let dd = String(today.getDate()).padStart(2, '0');
        let mm = String(today.getMonth() + 1).padStart(2, '0');
        let yyyy = today.getFullYear();

        let filename = "Rekap_Data_Harian_" + dd + "-" + mm + "-" + yyyy + ".xlsx";
        saveAs(blob, filename);
      });
    });
  </script>

  <!-- Main JS -->
  <script src="assets/js/main.js"></script>
  <script>const lightbox = GLightbox({ selector: '.glightbox' });</script>

</body>
</html>
