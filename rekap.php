<?php
include 'koneksi.php';

// fungsi tombol preview file
function filePreview($nama_media, $file) {
  if (!$file) {
    return "<span class='text-muted'>Tidak ada file</span>";
  }

  $ext    = strtolower(pathinfo($file, PATHINFO_EXTENSION));
  $folder = str_replace(" ", "_", $nama_media);
  $path   = "File_Media/" . $folder . "/" . $file;

  if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'pdf'])) {
    return "
      <a href='$path' class='glightbox btn btn-outline-primary btn-sm'>
        <i class='bi bi-eye'></i>
      </a>";
  } else {
    return "
      <a href='$path' target='_blank' class='btn btn-outline-secondary btn-sm'>
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

  <!-- Favicon -->
  <link href="assets/img/favicon.jpg" rel="icon">

  <!-- Vendor CSS -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>

<body class="service-details-page">

  <!-- HEADER -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center">
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

  <!-- MAIN -->
  <main class="main">

    <!-- PAGE TITLE -->
    <div id="home" class="page-title dark-background" style="background-image: url(assets/img/hero-bg.png);">
      <div class="container position-relative">
        <h1>REKAP DATA MEDIA</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Rekap Media</li>
          </ol>
        </nav>
      </div>
    </div>

    <!-- REKAP SECTION -->
    <section id="rekap" class="contact section">
      <div class="container">

        <!-- ================== TABEL PERBAIKAN ================== -->
        <h3>TABEL PERBAIKAN</h3>
        <button id="btnExportPerbaikan" class="btn btn-success mb-2">
          <i class="bi bi-file-earmark-excel"></i> Export ke Excel
        </button>

        <div style="overflow-x:auto;">
          <table id="tabel_perbaikan" class="table table-bordered table-hover">
            <thead class="table-dark">
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
              $no   = 1;
              $data = mysqli_query($koneksi, "SELECT * FROM media WHERE status = 'Kesempatan Edit'");
              while ($d = mysqli_fetch_array($data)) {
              ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $d['tanggal']; ?></td>
                  <td><?= $d['nama_media']; ?></td>
                  <td><?= $d['nama_perusahaan']; ?></td>
                  <td><?= $d['pengajuan_langganan']; ?></td>
                  <td><?= $d['nama_wartawan']; ?></td>
                  <td><?= "Rp " . number_format($d['harga'], 0, ',', '.'); ?></td>
                  <td><?= $d['kontak']; ?></td>
                  <td><?= $d['nomor_rekening']; ?></td>
                  <td><?= filePreview($d['nama_media'], $d['ktp_pemilik_perusahaan']); ?></td>
                  <td><?= filePreview($d['nama_media'], $d['npwp_perusahaan']); ?></td>
                  <td><?= filePreview($d['nama_media'], $d['kta_wartawan']); ?></td>
                  <td><?= filePreview($d['nama_media'], $d['cv_perusahaan']); ?></td>
                  <td><?= filePreview($d['nama_media'], $d['surat_penawaran_kerjasama']); ?></td>
                  <td><?= $d['keterangan']; ?></td>
                  <td><?= $d['status']; ?></td>
                  <td>
                    <a href="form_edit.php?id_pengajuan=<?= $d['id_pengajuan']; ?>" class="btn btn-warning btn-sm">EDIT</a>
                  </td>
                  <td>
                    <a href="status_menunggu.php?id_pengajuan=<?= $d['id_pengajuan']; ?>" class="btn btn-success btn-sm">KIRIM</a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>

        <br><br>

        <!-- ================== TABEL PERSETUJUAN ================== -->
        <h3>TABEL HASIL PERSETUJUAN</h3>
        <button id="btnExportPersetujuan" class="btn btn-success mb-2">
          <i class="bi bi-file-earmark-excel"></i> Export ke Excel
        </button>

        <div style="overflow-x:auto;">
          <table id="tabel_persetujuan" class="table table-bordered table-hover">
            <thead class="table-dark">
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
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no   = 1;
              $data = mysqli_query($koneksi, "SELECT * FROM media WHERE status='Disetujui' OR status='Tidak Disetujui'");
              while ($d = mysqli_fetch_array($data)) {
              ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $d['tanggal']; ?></td>
                  <td><?= $d['nama_media']; ?></td>
                  <td><?= $d['nama_perusahaan']; ?></td>
                  <td><?= $d['pengajuan_langganan']; ?></td>
                  <td><?= $d['nama_wartawan']; ?></td>
                  <td><?= "Rp " . number_format($d['harga'], 0, ',', '.'); ?></td>
                  <td><?= $d['kontak']; ?></td>
                  <td><?= $d['nomor_rekening']; ?></td>
                  <td><?= filePreview($d['nama_media'], $d['ktp_pemilik_perusahaan']); ?></td>
                  <td><?= filePreview($d['nama_media'], $d['npwp_perusahaan']); ?></td>
                  <td><?= filePreview($d['nama_media'], $d['kta_wartawan']); ?></td>
                  <td><?= filePreview($d['nama_media'], $d['cv_perusahaan']); ?></td>
                  <td><?= filePreview($d['nama_media'], $d['surat_penawaran_kerjasama']); ?></td>
                  <td><?= $d['keterangan']; ?></td>
                  <td><?= $d['status']; ?></td>
                  <td>
                    <a href="delete_media.php?id_pengajuan=<?= $d['id_pengajuan']; ?>"
                       onclick="return confirm('Yakin ingin menghapus data ini?');"
                       class="btn btn-danger btn-sm">
                      <i class="bi bi-trash"></i> Delete
                    </a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
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

  <!-- Vendor JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/exceljs/4.3.0/exceljs.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>

  <script>
    const lightbox = GLightbox({ selector: '.glightbox' });

    // DataTables
    $(document).ready(function () {
      $('#tabel_perbaikan, #tabel_persetujuan').DataTable({
        paging: true,
        ordering: true,
        info: true,
        order: [[0, "asc"]],
        columnDefs: [
          { orderable: true, targets: [0, 1, 2, 3, 4, 5, 6] },
          { orderable: false, targets: '_all' }
        ],
        language: {
          search: "Cari:",
          lengthMenu: "Tampilkan _MENU_ data per halaman",
          zeroRecords: "Data tidak ditemukan",
          info: "Menampilkan halaman _PAGE_ dari _PAGES_",
          infoEmpty: "Tidak ada data tersedia",
          infoFiltered: "(difilter dari _MAX_ total data)"
        }
      });
    });

    // Export Excel
    function exportTableToExcel(tableId, filenamePrefix) {
      var workbook = new ExcelJS.Workbook();
      var worksheet = workbook.addWorksheet("Sheet1");

      var tabel = document.getElementById(tableId);
      var rows = tabel.querySelectorAll("tr");

      rows.forEach((row, rowIndex) => {
        let cells = row.querySelectorAll("th, td");
        let rowData = [];
        cells.forEach((cell) => {
          rowData.push(cell.innerText.trim());
        });
        worksheet.addRow(rowData);

        // style header
        if (rowIndex === 0) {
          cells.forEach((cell, colIndex) => {
            let excelCell = worksheet.getRow(1).getCell(colIndex + 1);
            excelCell.font = { bold: true };
            excelCell.fill = {
              type: "pattern",
              pattern: "solid",
              fgColor: { argb: "FFD9D9D9" }
            };
          });
        }
      });

      // border
      worksheet.eachRow(function (row) {
        row.eachCell(function (cell) {
          cell.border = {
            top: { style: 'thin' },
            left: { style: 'thin' },
            bottom: { style: 'thin' },
            right: { style: 'thin' }
          };
        });
      });

      // auto width
      worksheet.columns.forEach(function (column) {
        let maxLength = 0;
        column.eachCell({ includeEmpty: true }, function (cell) {
          let columnLength = cell.value ? cell.value.toString().length : 10;
          if (columnLength > maxLength) {
            maxLength = columnLength;
          }
        });
        column.width = maxLength < 10 ? 10 : maxLength + 2;
      });

      workbook.xlsx.writeBuffer().then(function (data) {
        var blob = new Blob(
          [data],
          { type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" }
        );
        let today = new Date();
        let dd = String(today.getDate()).padStart(2, '0');
        let mm = String(today.getMonth() + 1).padStart(2, '0');
        let yyyy = today.getFullYear();
        let filename = filenamePrefix + "_" + dd + "-" + mm + "-" + yyyy + ".xlsx";
        saveAs(blob, filename);
      });
    }

    // Tombol export
    document.getElementById("btnExportPerbaikan")
      .addEventListener("click", function () {
        exportTableToExcel("tabel_perbaikan", "Rekap_Tabel_Perbaikan");
      });

    document.getElementById("btnExportPersetujuan")
      .addEventListener("click", function () {
        exportTableToExcel("tabel_persetujuan", "Rekap_Tabel_Persetujuan");
      });
  </script>

</body>
</html>
