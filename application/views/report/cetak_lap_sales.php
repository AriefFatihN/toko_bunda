<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>assets/img/logo-bunda.png">
    <link rel="icon" type="image/png" href="<?= base_url() ?>assets/img/logo-bunda.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Toko Bunda Laporan Penjualan
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?= base_url() ?>assets/demo/demo.css" rel="stylesheet" />
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/datatables.css" />
</head>

<body>
    <section class="content">
        <div class="col">
            <div class="card mb3" id="cardbayar">
                <div class="card-header text-center">
                    <b>
                        <h3><?php echo $title ?> <br></h3>
                        <h4><?php echo $subtitle ?> <br></h4>
                    </b>
                </div>
                <div class="card-body card-block">
                    <div class="card-body table-responsive">
                        <table class="table table-bordered tabel-striped" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="align-middle text-cente text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                    <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Invoice</th>
                                    <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                                    <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pelanggan</th>
                                    <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total</th>
                                    <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Diskon</th>
                                    <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Grand Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($datafilter as $row) : ?>
                                    <tr>
                                        <td class="text-xs mb-0 text-center align-middle"><?= $no++ ?></td>
                                        <td class="text-xs mb-0 text-center align-middle"><?= $row->invoice ?></td>
                                        <td class="text-xs mb-0 text-center align-middle"><?= indo_date($row->date) ?></td>
                                        <td class="text-xs mb-0 align-middle"><?= $row->customer_id == null ? "Umum" : wordwrap($row->customer_name, 40, "<br>") ?></td>
                                        <td class="text-xs mb-0 text-right align-middle"><?= indo_currency($row->total_price) ?></td>
                                        <td class="text-xs mb-0 text-right align-middle"><?= indo_currency($row->discount_all) ?></td>
                                        <td class="text-xs mb-0 text-right align-middle"><?= indo_currency($row->final_price) ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mr-2">
                        <div class="col-9"></div>
                        <div class="col">
                            <p class="text-center">Semarang, <?php echo date('d M Y') ?></p>
                        </div>
                    </div>
                    <div class="row mr-2">
                        <div class="col-9"></div>
                        <div class="col">
                            <p class="text-center">Penanggung Jawab</p>
                        </div>
                    </div>
                    <br><br><br><br>
                    <div class="row mr-2">
                        <div class="col-9"></div>
                        <div class="col">
                            <p class="text-center"><?= ucfirst($this->fungsi->user_login()->name) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--   Core JS Files   -->
    <script src="<?= base_url() ?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/js/core/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/js/core/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/js/core/bootstrap.min.js"></script>
</body>

</html>