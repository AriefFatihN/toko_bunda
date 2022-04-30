<head>
  <!-- Morris -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/morris.css">

  <!-- Morris -->
  <script src="<?= base_url() ?>assets/js/morris.js"></script>
  <script src="<?= base_url() ?>assets/js/morris.min.js"></script>
  <script src="<?= base_url() ?>assets/js/raphael.js"></script>
</head>


<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
  <div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
      <h6 class="font-weight-bolder mb-0 mt-0">Dashboard</h6>
    </nav>
    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
      </div>
      <ul class="navbar-nav justify-content-end">
        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
          <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </a>
        </li>
        <li class="nav-item px-3 d-flex align-items-center">
        </li>
        <li class="nav-item dropdown pe-2 d-flex align-items-center">
          <a href="javascript:;" class="nav-link text-body font-weight-bold px-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-user me-sm-1"></i>
            <span class=""><?= ucfirst($this->fungsi->user_login()->name) ?></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
            <?php if ($this->fungsi->user_login()->level == 1) { ?>
              <li class="mb-2">
                <a class="dropdown-item border-radius-md" href="<?= base_url('user') ?>">
                  <div class="d-flex py-1">
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="text-sm font-weight-normal mb-1">
                        <i class="fa fa-users-cog me-1"></i>
                        <span class="font-weight-bold">Kelola User</span>
                      </h6>
                    </div>
                  </div>
                </a>
              </li>
            <?php } ?>
            <li>
              <a class="dropdown-item border-radius-md" href="<?= site_url('auth/logout') ?>">
                <div class="d-flex py-1">
                  <div class="d-flex flex-column justify-content-center">
                    <h6 class="text-sm font-weight-normal mb-1">
                      <i class="fa fa-sign-out-alt me-1"></i>
                      <span class="font-weight-bold">Log Out</span>
                    </h6>
                  </div>
                </div>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->
<div class="container-fluid py-4">
  <!-- Kotak kotak atas -->
  <div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Jenis Barang</p>
                <h5 class="font-weight-bolder mb-0">
                  <?= $this->fungsi->count_data('product_item') ?>
                  <span class="text text-sm font-weight-bolder">Jenis</span>
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <?php if ($this->fungsi->user_login()->level == 1) { ?>
                <a href="<?= base_url('item') ?>">
                <?php } ?>
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                  <i class="ni ni-archive-2 text-lg opacity-10" aria-hidden="true"></i>
                </div>
                </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Supplier</p>
                <h5 class="font-weight-bolder mb-0">
                  <?= $this->fungsi->count_data('supplier') ?>
                  <span class="text text-sm font-weight-bolder">Supplier</span>
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <?php if ($this->fungsi->user_login()->level == 1) { ?>
                <a href="<?= base_url('supplier') ?>">
                <?php } ?>
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                  <i class="ni ni-building text-lg opacity-10" aria-hidden="true"></i>
                </div>
                </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Pelanggan</p>
                <h5 class="font-weight-bolder mb-0">
                  <?= $this->fungsi->count_data('customer') ?>
                  <span class="text text-sm font-weight-bolder">Orang</span>
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <?php if ($this->fungsi->user_login()->level == 1) { ?>
                <a href="<?= base_url('customer') ?>">
                <?php } ?>
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                  <i class="ni ni-satisfied text-lg opacity-10" aria-hidden="true"></i>
                </div>
                </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Kategori</p>
                <h5 class="font-weight-bolder mb-0">
                  <?= $this->fungsi->count_data('product_category') ?>
                  <span class="text text-sm font-weight-bolder">Jenis</span>
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <?php if ($this->fungsi->user_login()->level == 1) { ?>
                <a href="<?= base_url('category') ?>">
                <?php } ?>
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                  <i class="ni ni-ungroup text-lg opacity-10" aria-hidden="true"></i>
                </div>
                </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Chart Item Terjual-->
  <div class="row mt-4">
    <div class="col">
      <div class="card">
        <div class="card-header pb-0">
          <h6>Jumlah Item Terjual Bulan Ini</h6>
        </div>
        <div class="card-body p-3">
          <div class="chart">
            <div id="bar-chart" width="400" height="100"></div>
          </div>
        </div>
      </div>
    </div>
    <script>
      Morris.Bar({
        element: 'bar-chart',
        axes: false,
        resize: true,
        data: [<?php foreach ($row as $key => $data) {
                  echo "{ item: '" . $data->name . "', sold: " . $data->sold . "},";
                }
                ?>],
        barColors: ['#9320bb'],
        xkey: 'item',
        ykeys: ['sold'],
        labels: ['Terjual'],
        hideHover: 'auto'
      });
    </script>
  </div>
</div>