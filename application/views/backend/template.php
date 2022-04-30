<!--
=========================================================
* Soft UI Dashboard - v1.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/soft-ui-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>assets/img/logo-bunda.png">
  <link rel="icon" type="image/png" href="<?= base_url() ?>assets/img/logo-bunda.png">
  <title>
    Toko Bunda
  </title>

  <!-- Fonts  -->
  <link href="<?= base_url() ?>assets/css/opensans.css" rel="stylesheet" />

  <!-- Nucleo Icons -->
  <link href="<?= base_url() ?>assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="<?= base_url() ?>assets/css/nucleo-svg.css" rel="stylesheet" />

  <!-- Font Awesome & Nucleo Icons -->
  <link href="<?= base_url() ?>assets/css/all.css" rel="stylesheet" />
  <link href="<?= base_url() ?>assets/css/nucleo-svg.css" rel="stylesheet" />

  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url() ?>assets/css/soft-ui-dashboard.css?v=1.0.1" rel="stylesheet" />

  <!-- CSS ku njing -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/hehe.css">

  <!-- Morris -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/morris.css">

  <!-- Animate Stye -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/animate.min.css">

  <!-- Data Tables -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/dataTables.bootstrap5.min.css">

  <!-- Toastr -->
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/toastr.min.css">

  <!-- JS Khusus -->
  <!-- JQuery -->
  <script type="text/javascript" language="javascript" src="<?= base_url() ?>assets/js/jquery-3.6.0.min.js"></script>
  <!-- Sweet Alert -->
  <script src="<?= base_url() ?>assets/js/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="<?= base_url() ?>assets/js/toastr.min.js"></script>
  <!-- Mata Duit -->
  <script src="<?= base_url() ?>assets/js/plugins/currency.js"></script>
</head>

<body class="g-sidenav-show bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-left ms-3" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute right-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0 text-center" href="<?= base_url() ?>">
        <img src="<?= base_url() ?>assets/img/logo-bunda-alt.png" class="navbar-brand-img h-100 w-20 alt="...">
        <span class="ms-1 font-weight-bold">Toko Bunda</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0 mb-0">
    <div class="collapse navbar-collapse  w-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="nav-link active"' : '' ?> class="nav-link" href="<?= base_url() ?>">
            <i class="fa fa-chart-line nav-icon me-1"></i>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a <?= $this->uri->segment(1) == 'sales' ? 'class="nav-link active"' : '' ?> class="nav-link" href="<?= base_url('sales') ?>">
            <i class="fa fa-cash-register nav-icon me-1"></i>
            <span class="nav-link-text ms-1">Kasir</span>
          </a>
        </li>
        <!-- <hr class="horizontal dark mt-1 mb-0">
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 mt-1 text-uppercase text-xs font-weight-bolder opacity-6">Asosiasi</h6>
        </li>
        <hr class="horizontal dark mt-1 mb-0"> -->
        <?php if ($this->fungsi->user_login()->level == 1) { ?>
          <li class="nav-item">
            <a <?= $this->uri->segment(1) == 'item' ? 'class="nav-link active"' : '' ?> class="nav-link" href="<?= base_url('item') ?>">
              <i class="fa fa-box-open nav-icon me-1"></i>
              <span class="nav-link-text ms-1">Produk</span>
            </a>
          </li>
          <li class="nav-item">
            <a <?= $this->uri->segment(1) == 'category' ? 'class="nav-link active"' : '' ?> class="nav-link" href="<?= base_url('category') ?>">
              <i class="fa fa-shapes nav-icon me-1"></i>
              <span class="nav-link-text ms-1">Kategori</span>
            </a>
          </li>
          <li class="nav-item">
            <a <?= $this->uri->segment(1) == 'customer' ? 'class="nav-link active"' : '' ?> class="nav-link" href="<?= base_url('customer') ?>">
              <i class="fa fa-user-tag nav-icon me-1"></i>
              <span class="nav-link-text ms-1">Customer</span>
            </a>
          </li>
          <li class="nav-item">
            <a <?= $this->uri->segment(1) == 'supplier' ? 'class="nav-link active"' : '' ?> class="nav-link" href="<?= base_url('supplier') ?>">
              <i class="fa fa-warehouse nav-icon me-1"></i>
              <span class="nav-link-text ms-1">Supplier</span>
            </a>
          </li>
          <li class="nav-item">
            <a <?= $this->uri->segment(1) == 'stock' && $this->uri->segment(2) == 'in' ? 'class="nav-link active"' : '' ?> class="nav-link" href="<?= base_url('stock/in') ?>">
              <i class="fa fa-angle-double-down nav-icon me-1"></i>
              <span class="nav-link-text ms-1">Barang Masuk</span>
            </a>
          </li>
          <li class="nav-item">
            <a <?= $this->uri->segment(1) == 'stock' && $this->uri->segment(2) == 'out' ? 'class="nav-link active"' : '' ?> class="nav-link" href="<?= base_url('stock/out') ?>">
              <i class="fa fa-angle-double-up nav-icon me-1"></i>
              <span class="nav-link-text ms-1">Barang Keluar</span>
            </a>
          </li>
          <li class="nav-item">
            <a <?= $this->uri->segment(1) == 'report' ? 'class="nav-link active"' : '' ?> class="nav-link" href="<?= base_url('report/sales') ?>">
              <i class="fa fa-file-alt nav-icon me-1"></i>
              <span class="nav-link-text ms-1">Riwayat Transaksi</span>
            </a>
          </li>
          <li class="nav-item">
            <a <?= $this->uri->segment(1) == 'laporan' ? 'class="nav-link active"' : '' ?> class="nav-link" href="<?= base_url('laporan') ?>">
              <i class="fa fa-book nav-icon me-1"></i>
              <span class="nav-link-text ms-1">Data Rekap Transaksi</span>
            </a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </aside>
  <main class="main-content mt-1 border-radius-lg">
    <div class="content">
      <?php echo $contents ?>
    </div>
  </main>

  <!-- Bootstrap -->
  <script src="<?= base_url() ?>assets/js/core/popper.min.js"></script>
  <script src="<?= base_url() ?>assets/js/core/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/smooth-scrollbar.min.js"></script>

  <!-- Templates -->
  <script src="<?= base_url() ?>assets/js/soft-ui-dashboard.min.js?v=1.0.1"></script>
  <script src="<?= base_url() ?>assets/js/plugins/chartjs.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/Chart.extension.js"></script>

  <!-- Morris -->
  <script src="<?= base_url() ?>assets/js/morris.js"></script>
  <script src="<?= base_url() ?>assets/js/morris.min.js"></script>

  <!-- Data Tables -->
  <script type="text/javascript" language="javascript" src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="<?= base_url() ?>assets/js/dataTables.bootstrap5.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#table').DataTable({
        "pageLength": 25,
        "lengthMenu": [
          [25, 50, 100],
          [25, 50, 100]
        ],
      });
    });
  </script>
  <script>
    $(function() {
      $('[data-toggle="tooltip"]').tooltip()
    })
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
</body>

</html>