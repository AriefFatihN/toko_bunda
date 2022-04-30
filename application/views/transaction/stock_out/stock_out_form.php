<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <h6 class="font-weight-bolder mb-0 mt-0">Kelola Barang Keluar</h6>
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

<!-- Form -->
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col">
                            <h6>Data Produk</h6>
                        </div>
                        <div class="col">
                            <div class="float-end">
                                <a class="btn btn-sm bg-gradient-primary" href="<?= site_url('stock/out') ?>">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="row mini-ml">
                        <form action="<?= site_url('stock/process') ?>" method="post">
                            <div class="form-group">
                                <label>Tanggal </label>
                                <input type="date" name="date" value="<?= date('Y-m-d') ?>" class="form-control" required>
                            </div>
                            <div class="row align-items-center mb-2">
                                <div class="col">
                                    <label for="item_name">Nama Item</label>
                                    <input type="text" name="item_name" id="item_name" class="form-control" placeholder="Nama Barang" readonly>
                                </div>
                                <div class="col-4">
                                    <label for="barcode">Barcode </label>
                                    <input type="hidden" name="item_id" id="item_id" class="form-control">
                                    <div class="input-group">
                                        <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Barcode" required autofocus>
                                        <button type="button" class="btn bg-gradient-info no-mb" data-toggle="tooltip" title="Pilih Item" data-bs-toggle="modal" data-bs-target="#modal-item"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center mb-2">
                                <div class="col">
                                    <label>Detail</label>
                                    <input type="text" name="detail" id="detail" class="form-control" placeholder="Rusak / Kadaluarsa" required>
                                </div>
                                <div class="col-4">
                                    <label for="stock">Stok</label>
                                    <div class="input-group">
                                        <input type="text" name="stock" id="stock" value="" class="form-control" placeholder="Stok Saat Ini" readonly>
                                        <span class="input-group-text">Pcs</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Stok</label>
                                <div class="input-group">
                                    <input type="number" name="qty" class="form-control" placeholder="Jumlah Stok Yang Berkurang" required>
                                    <span class="input-group-text">Pcs</span>
                                </div>
                            </div>
                            <div class="form-group pt-2">
                                <button type="reset" class="btn btn-sm bg-gradient-secondary no-mb reset">Reset</button>
                                <button type="submit" class="btn btn-sm bg-gradient-primary no-mb submit" name="out_add">Konfirmasi Kurangi Stok</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Modal -->
<!-- Modal Item & Barcode -->
<div class="modal fade" id="modal-item" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Item Barang Keluar</h5>
                <button type="button" class="btn badge bg-gradient-secondary no-mb" data-bs-dismiss="modal"><i class="fa fa-times"></i></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" id="table">
                        <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Barcode</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Produk</th>
                                <th class="text-right text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga Barang</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stok Barang</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($item as $i => $data) { ?>
                                <tr>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0 text-center"><?= $data->barcode ?></p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0"><?= wordwrap($data->name, 33, "<br>") ?></p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0 text-right"><?= indo_currency($data->price) ?></p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0 text-center"><?= $data->stock ?></p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <button class="btn badge badge-sm bg-gradient-info no-mb" id="select" data-dismiss="modal" data-toggle="tooltip" title="Pilih <?= $data->name ?>" data-id="<?= $data->item_id ?>" data-barcode="<?= $data->barcode ?>" data-name="<?= $data->name ?>" data-stock="<?= $data->stock ?>">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Alert Toastr -->
<?php if ($this->session->flashdata('success')) { ?>
    <?php $this->load->view('utilities/alert'); ?>
<?php } else if ($this->session->flashdata('error')) { ?>
    <?php $this->load->view('utilities/alert'); ?>
<?php } ?>

<script>
    $(document).ready(function() {
        $(document).on('click', '#select', function() {
            var item_id = $(this).data('id');
            var barcode = $(this).data('barcode');
            var name = $(this).data('name');
            var stock = $(this).data('stock');
            $('#item_id').val(item_id);
            $('#barcode').val(barcode);
            $('#item_name').val(name);
            $('#stock').val(stock);
            $('#modal-item').modal('hide');
        })
    })

    $('#barcode').keypress(function(event) {
        var keycode = (event.keyCode ? event.keyCode : event.which)
        var barcode = $(this).val()
        if (keycode == '13' && barcode == '') {
            toastr.warning('Mohon Pilih Produk Terlebih Dahulu')
            $('#barcode').focus()
        } else if (keycode == '13' && barcode != '') {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('sales/get_item') ?>',
                data: {
                    'barcode': barcode,
                },
                dataType: 'json',
                success: function(result) {
                    if (result.success == true) {
                        $('#item_id').val(result.item.item_id)
                        $('#barcode').val(barcode)
                        $('#item_name').val(result.item.name)
                        $('#stock').val(result.item.stock)

                        $('#add_cart').click()
                        $('#detail').focus()
                    } else {
                        toastr.error('Barang Tidak Ditemukan')
                        $('#barcode').val('')
                        $('#barcode').focus()
                    }
                }
            })
        }

        event.stopPropagation();
    });
</script>