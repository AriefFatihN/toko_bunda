<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <h6 class="font-weight-bolder mb-0 mt-0">Data Rekap Penjualan</h6>
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

<div class="container-fluid py-4">
    <!-- Form Jenjang Waktu-->
    <div class="row">
        <div class="col">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col">
                            <h6>Filter Penjualan</h6>
                        </div>
                        <div class="col">
                            <div class="float-end">
                                <button onclick="prosesReset()" type="button" class="btn bg-gradient-secondary">Reset</button>
                                <button id="btnproses" type="button" onclick="prosesPeriode()" class="btn bg-gradient-primary">Proses</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="row mini-ml">
                        <form id="formfilter">
                            <input name="valnilai" type="hidden">
                            <div class="row align-items-center mb-2">
                                <div class="col-2" id="form-tanggal">
                                    <label for="select" class="form-control-label">Pilih Jenjang Waktu</label>
                                </div>
                                <div class="col-10">
                                    <select name="periode" id="periode" class="form-control form-control-user" title="Pilih Tahun Ajaran">
                                        <option value="">-Pilih Filter-</option>
                                        <option value="tanggal">Tanggal</option>
                                        <option value="bulan">Bulan</option>
                                        <option value="tahun">Tahun</option>
                                    </select>
                                    <small class="help-block form-text"></small>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Filter by Tanggal-->
    <div class="row">
        <div class="col" id="tanggalfilter">
            <div class="card mb-4">
                <form action="<?php echo base_url(); ?>Laporan/filter" method="POST" target="_blank">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col">
                                <h6>Filter Menurut Tanggal</h6>
                            </div>
                            <div class="col-2 text-right">
                                <button type="submit" class="btn bg-gradient-warning"><i class="fa fa-print"></i> Print</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-2">
                        <input type="hidden" name="nilaifilter" value="1">
                        <input name="valnilai" type="hidden">
                        <div class="row align-items-center mb-2">
                            <div class="col-2">
                                <label for="select" class="form-control-label">Periode Tanggal</label>
                            </div>
                            <div class="col-4">
                                <input name="tanggalawal" value="<?= date('Y-m-d') ?>" type="date" class="form-control" id="tanggalawal" required="">
                            </div>
                            <div class="col-2">
                                <label for="select" class=" form-control-label">Sampai dengan</label>
                            </div>
                            <div class="col-4">
                                <input name="tanggalakhir" value="<?= date('Y-m-d') ?>" type="date" class="form-control" id="tanggalakhir" required="">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Form Filter by Bulan -->
    <div class="row">
        <div class="col" id="bulanfilter">
            <div class="card mb-4">
                <form action="<?php echo base_url(); ?>Laporan/filter" method="POST" target="_blank">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col">
                                <h6>Filter Menurut Bulan</h6>
                            </div>
                            <div class="col-2 text-right">
                                <button type="submit" class="btn bg-gradient-warning"><i class="fa fa-print"></i> Print</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-2">
                        <input type="hidden" name="nilaifilter" value="2">
                        <input name="valnilai" type="hidden">
                        <div class="row align-items-center mb-2">
                            <div id="form-tanggal" class="col-1">
                                <label for="select" class=" form-control-label">Tahun</label>
                            </div>
                            <div class="col-2">
                                <select name="tahun1" id="tahun1" class="form-control form-control-user" title="Pilih Periode Tahun">
                                    <option value="">-Filter Tahun-</option>
                                    <?php foreach ($tahun as $thn) : ?>
                                        <option value="<?php echo $thn->tahun; ?>"><?php echo $thn->tahun; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-1">
                                <label for="select" class=" form-control-label">Bulan</label>
                            </div>
                            <div class="col-3">
                                <select name="bulanawal" id="bulanawal" class="form-control form-control-user" title="Pilih Bulan">
                                    <option value="">-Bulan-</option>
                                    <option value="1">JANUARI</option>
                                    <option value="2">FEBRUARI</option>
                                    <option value="3">MARET</option>
                                    <option value="4">APRIL</option>
                                    <option value="5">MEI</option>
                                    <option value="6">JUNI</option>
                                    <option value="7">JULI</option>
                                    <option value="8">AGUSTUS</option>
                                    <option value="9">SEPTEMBER</option>
                                    <option value="10">OKTOBER</option>
                                    <option value="11">NOVEMBER</option>
                                    <option value="12">DESEMBER</option>
                                </select>
                            </div>
                            <div class="col-2">
                                <label for="select" class=" form-control-label">Sampai Dengan</label>
                            </div>
                            <div class="col-3">
                                <select name="bulanakhir" id="bulanakhir" class="form-control form-control-user" title="Pilih Bulan">
                                    <option value="">-Bulan-</option>
                                    <option value="1">JANUARI</option>
                                    <option value="2">FEBRUARI</option>
                                    <option value="3">MARET</option>
                                    <option value="4">APRIL</option>
                                    <option value="5">MEI</option>
                                    <option value="6">JUNI</option>
                                    <option value="7">JULI</option>
                                    <option value="8">AGUSTUS</option>
                                    <option value="9">SEPTEMBER</option>
                                    <option value="10">OKTOBER</option>
                                    <option value="11">NOVEMBER</option>
                                    <option value="12">DESEMBER</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Form Filter by Tahun -->
    <div class="row">
        <div class="col" id="tahunfilter">
            <div class="card mb-4">
                <form action="<?php echo base_url(); ?>Laporan/filter" method="POST" target="_blank">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col">
                                <h6>Filter Menurut Tahun</h6>
                            </div>
                            <div class="col-2 text-right">
                                <button type="submit" class="btn bg-gradient-warning"><i class="fa fa-print"></i> Print</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-2">
                        <input type="hidden" name="nilaifilter" value="3">
                        <div class="row align-items-center mb-2">
                            <div id="form-tanggal" class="col-2">
                                <label for="select" class=" form-control-label">Pilih Tahun</label>
                            </div>
                            <div class="col-10">
                                <select name="tahun2" id="tahun2" class="form-control form-control-user" title="Pilih Tahun">
                                    <option value="">-Tahun-</option>
                                    <?php foreach ($tahun as $thn) : ?>
                                        <option value="<?php echo $thn->tahun; ?>"><?php echo $thn->tahun; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            $("#tanggalfilter").hide();
            $("#tahunfilter").hide();
            $("#bulanfilter").hide();
        });

        function prosesPeriode() {
            var periode = $("[name='periode']").val();

            if (periode == "tanggal") {
                $("#btnproses").hide();
                $("#tanggalfilter").show();
                $("[name='valnilai']").val('tanggal');

            } else if (periode == "bulan") {
                $("#btnproses").hide();
                $("[name='valnilai']").val('bulan');
                $("#bulanfilter").show();

            } else if (periode == "tahun") {
                $("#btnproses").hide();
                $("[name='valnilai']").val('tahun');
                $("#tahunfilter").show();
            }
        }

        function prosesReset() {
            $("#btnproses").show();

            $("#tanggalfilter").hide();
            $("#tahunfilter").hide();
            $("#bulanfilter").hide();
            $("#cardbayar").hide();

            $("#periode").val('');
            $("#tanggalawal").val('');
            $("#tanggalakhir").val('');
            $("#tahun1").val('');
            $("#bulanawal").val('');
            $("#bulanakhir").val('');
            $("#tahun2").val('');
            $("#targetbayar").empty();

        }
    </script>