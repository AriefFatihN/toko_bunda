<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <h6 class="font-weight-bolder mb-0 mt-0">Riwayat Transaksi</h6>
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
    <!-- Form -->
    <div class="row">
        <div class="col">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col mb-3">
                            <h6>Filter Transaksi</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="row mini-ml">
                        <form action="" method="post">
                            <div class="row align-items-center mb-2">
                                <div class="col-2">
                                    <label for="date1">Tanggal</label>
                                </div>
                                <div class="col-4">
                                    <input type="date" name="date1" value="<?= @$post['date1'] ?>" class="form-control">
                                </div>
                                <div class="col-2">
                                    <label for="date2">Sampai Dengan</label>
                                </div>
                                <div class="col-4">
                                    <input type="date" name="date2" value="<?= @$post['date2'] ?>" class="form-control">
                                </div>
                            </div>
                            <div class="row align-items-center mb-2">
                                <div class="col-2">
                                    <label for="pelanggan">Pelanggan</label>
                                </div>
                                <div class="col-4">
                                    <select name="customer" class="form-control">
                                        <option value="">- All -</option>
                                        <option value="null" <?= @$post['customer'] == 'null' ? 'selected' : '' ?>>Umum
                                        </option>
                                        <?php foreach ($customer as $cst => $data) { ?>
                                            <option value="<?= $data->customer_id ?>" <?= @$post['customer'] == $data->customer_id ? 'selected' : '' ?>><?= $data->name ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="invoice">Invoice</label>
                                </div>
                                <div class="col-4">
                                    <input type="text" name="invoice" value="<?= @$post['invoice'] ?>" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="float-end">
                                        <button type="submit" name="reset" class="btn btn-sm bg-gradient-secondary">Reset</button>
                                        <button type="submit" name="filter" class="btn btn-sm bg-gradient-primary">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel -->
    <div class="row">
        <div class="col">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col">
                            <h6>Transaksi Terfilter</h6>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Invoice</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Customer</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Discount</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Grand Total</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = $this->uri->segment(3) ? $this->uri->segment(3) + 1 : 1;
                                    foreach ($row->result() as $key => $data) { ?>
                                        <tr>
                                            <td class="align-middle">
                                                <p class="text-xs text-secondary mb-0 text-center"><?= $no++ ?>
                                            </td>
                                            <td class="align-middle">
                                                <p class="text-xs text-secondary mb-0 text-center"><?= $data->invoice ?>
                                            </td>
                                            <td class="align-middle">
                                                <p class="text-xs text-secondary mb-0 text-center"><?= indo_date($data->date) ?>
                                            </td>
                                            <td class="align-middle">
                                                <p class="text-xs text-secondary mb-0"><?= wordwrap($data->customer_id == null ? "Umum" : $data->customer_name, 30, "<br>") ?>
                                            </td>
                                            <td class="align-middle">
                                                <p class="text-xs text-secondary mb-0 text-center"><?= indo_currency($data->total_price) ?>
                                            </td>
                                            <td class="align-middle">
                                                <p class="text-xs text-secondary mb-0 text-center"><?= indo_currency($data->discount_all) ?>
                                            </td>
                                            <td class="align-middle">
                                                <p class="text-xs text-secondary mb-0 text-center"><?= indo_currency($data->final_price) ?>
                                            </td>
                                            <td class="text-center">
                                                <button id="detail" class="btn badge bg-gradient-secondary no-mb" data-toggle="tooltip" title="Lihat Detail Transaksi" data-bs-toggle="modal" data-bs-target="#modal-detail" data-invoice="<?= $data->invoice ?>" data-date="<?= indo_date($data->date) ?>" data-time="<?= substr($data->sales_created, 11, 5) ?>" data-customer="<?= $data->customer_id == null ? "Umum" : $data->customer_name ?>" data-total="<?= indo_currency($data->total_price) ?>" data-discount="<?= indo_currency($data->discount_all) ?>" data-grandtotal="<?= indo_currency($data->final_price) ?>" data-cash="<?= indo_currency($data->cash) ?>" data-remaining="<?= indo_currency($data->remaining) ?>" data-note="<?= $data->note ?>" data-cashier="<?= ucfirst($data->user_name) ?>" data-salesid="<?= $data->sales_id ?>"><i class="fa fa-eye"></i></button>
                                                <a href="<?= site_url('sales/cetak/' . $data->sales_id) ?>" target="_blank" class="btn badge bg-gradient-warning no-mb" data-toggle="tooltip" title="Print Nota Transaksi"><i class="fa fa-print"></i></a>
                                                <a href="<?= site_url('sales/delete/' . $data->sales_id) ?>" data-bs-toggle="modal" data-bs-target="#modal-hapus" class="btn badge bg-gradient-danger no-mb" data-toggle="tooltip" title="Hapus Transaksi"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div class="row float-end">
                                <ul class="pagination pagi">
                                    <?= $pagination ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Modal -->
<!-- Modal Detail -->
<div class="modal fade" id="modal-detail" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Transaksi</h5>
                <button type="button" class="btn badge bg-gradient-secondary no-mb" data-bs-dismiss="modal" data-toggle="tooltip" title="Tutup"><i class="fa fa-times"></i></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-responsive table-striped no-mb">
                    <tbody>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Invoice</th>
                            <td>
                                <p class="text-center text-xs text-secondary mb-0" id="invoice"></p>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle">Nama Barang</th>
                            <td>
                                <p class=" text-xs text-secondary mb-0" id="product"></p>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Pelanggan</th>
                            <td>
                                <p class="text-center text-xs text-secondary mb-0 text-wrap" id="cust"></p>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Tanggal</th>
                            <td>
                                <p class="text-center text-xs text-secondary mb-0" id="datetime"></p>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Kasir</th>
                            <td>
                                <p class="text-center text-xs text-secondary mb-0" id="cashier"></p>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Diskon</th>
                            <td>
                                <p class="text-center text-xs text-secondary mb-0" id="discount"></p>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Kembalian</th>
                            <td>
                                <p class="text-center text-xs text-secondary mb-0" id="change"></p>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Total</th>
                            <td>
                                <p class="text-center text-xs text-secondary mb-0" id="total"></p>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Uang Cash</th>
                            <td>
                                <p class="text-center text-xs text-secondary mb-0" id="cash"></p>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Grand Total</th>
                            <td>
                                <p class="text-center text-xs text-secondary mb-0" id="grandtotal"></p>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Catatan</th>
                            <td>
                                <p class="text-center text-xs text-secondary mb-0 text-wrap" id="note"></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php echo form_open('sales/delete/' . $data->sales_id) ?>
            <div class="modal-header">
                <h5 class="modal-title">Hapus Transaksi</h5>
            </div>
            <div class="modal-body">
                <p class="no-mb">Yakin Akan Menghapus Data Transaksi ini?</p>
            </div>
            <div class="modal-footer footer-spacing">
                <button type="button" class="btn bg-gradient-secondary no-mb" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn bg-gradient-primary no-mb">Hapus Data</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<script>
    $(document).on('click', '#detail', function() {
        $('#invoice').text($(this).data('invoice'))
        $('#cust').text($(this).data('customer'))
        $('#datetime').text($(this).data('date') + ' ' + $(this).data('time'))
        $('#total').text($(this).data('total'))
        $('#discount').text($(this).data('discount'))
        $('#cash').text($(this).data('cash'))
        $('#change').text($(this).data('remaining'))
        $('#grandtotal').text($(this).data('grandtotal'))
        $('#note').text($(this).data('note'))
        $('#cashier').text($(this).data('cashier'))

        var product = '<table class="table table-striped no-mb">'
        product += '<tr><th>Item</th><th>Price</th><th>Qty</th><th>Disc</th><th>Total</th></tr>'
        $.getJSON('<?= site_url('report/sales_product/') ?>' + $(this).data('salesid'), function(data) {
            $.each(data, function(key, val) {
                product += '<tr><td style="white-space: pre-wrap;">' + val.name + '</td><td>' + val.price + '</td><td>' + val.qty + '</td><td>' + val.discount_item + '</td><td>' + val.total + '</td></tr>'
            })
            product += '</table>'
            $('#product').html(product)

        })

    })
</script>