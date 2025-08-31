<?php
session_start();

if (!isset($_SESSION["id_supadmin"])) {
    header("Location: ../../login_form/formlogin.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SUPER ADMIN HUMAS PROTOKOL</title>
  <!-- icon web -->
  <link href="../../../assets/img/favicon.jpg" rel="icon">
  <!-- responsive -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../../bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 -->
  <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index.php" class="logo">
      <span class="logo-mini"><b>SPR</b>ADM</span>
      <span class="logo-lg"><b>Home </b>Super Admin </span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
              <span class="hidden-xs">
                  <a href="../../login_form/logout.php" class="btn btn-primary" style="margin-top:8px; margin-right:8px;">Sign out</a>
              </span>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- Sidebar -->
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/admin.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Super Admin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> online</a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Persetujuan Media</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../media/select.php"><i class="fa fa-table"></i> Data Persetujuan</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Rekap Harian</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../harian/select.php"><i class="fa fa-table"></i>Data Rekap Harian</a></li>
          </ul>
        </li>
        <li class="active treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Rekap Bulanan</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="select.php"><i class="fa fa-table"></i>Data Rekap Bulanan</a></li>
          </ul>
        </li>
      </ul>
    </section>
  </aside>

  <!-- Content -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Laporan Rekap Bulanan</h1>
    </section>

    <section class="content">
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
                  include '../../../koneksi.php';
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
    </section>
  </div>

  <footer class="main-footer">
    <strong>Copyright &copy; FajarDJ & Naufal Faza. </strong> Informatika
  </footer>

  <div class="control-sidebar-bg"></div>
</div>

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../../bower_components/raphael/raphael.min.js"></script>
<script src="../../bower_components/morris.js/morris.min.js"></script>
<script src="../../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="../../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<script src="../../bower_components/moment/min/moment.min.js"></script>
<script src="../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../dist/js/pages/dashboard.js"></script>
<script src="../../dist/js/demo.js"></script>
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree();

    // aktifkan datatable2
    $('#tabel2').DataTable({
      "paging": true,        // ada pagination
      "ordering": true,      // bisa sorting
      "info": true,          // info jumlah data
      "order": [[0, "asc"]], // default urutkan kolom pertama (No) ASC
      columnDefs: [
        { orderable: true, targets: [0, 1, 2, 5, 6, 7] },   // kolom yang bisa sort
        { orderable: false, targets: '_all' }                // sisanya tidak bisa sort
      ],
      "language": {
        "search": "Cari:",
        "lengthMenu": "Tampilkan _MENU_ data per halaman",
        "zeroRecords": "Data tidak ditemukan",
        "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
        "infoEmpty": "Tidak ada data tersedia",
        "infoFiltered": "(difilter dari _MAX_ total data)"
      }
    });
  });

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

      let filename = "rekap_databulanan_" + dd + "-" + mm + "-" + yyyy + ".xlsx";
      saveAs(blob, filename);
    });
  });
</script>
</body>
</html>
