<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <h6 class="font-weight-bolder mb-0 mt-0">Kasir</h6>
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
    <!-- Form Atas -->
    <div class="row">
        <div class="col-5 d-flex mb-3">
            <div class="card card-body">
                <div class="row align-items-center mb-2">
                    <div class="input-group">
                        <span class="input-group-text">Tanggal Transaksi</span>
                        <input type="text" id="date" value="<?= date('d F Y') ?>" class="form-control" readonly>
                    </div>
                </div>
                <div class="row align-items-center mb-2">
                    <div class="input-group">
                        <span class="input-group-text">Pelanggan</span>
                        <select id="customer" class="form-select form-control">
                            <option value="">Umum</option>
                            <?php foreach ($customer as $cust => $value) {
                                echo '<option value="' . $value->customer_id . '">' . $value->name . '</option>';
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="input-group">
                        <span class="input-group-text"><?= $this->fungsi->user_login()->level == 1 ? "Admin" : "Kasir" ?></span>
                        <input type="text" id="user" value="<?= $this->fungsi->user_login()->name ?>" class="form-control" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="col d-flex mb-3">
            <div class="card card-body">
                <div class="row align-items-center mb-2">
                    <div class="col-3">
                        <label>Barcode</label>
                    </div>
                    <div class="col">
                        <div class="row">
                            <input type="hidden" id="item_id">
                            <input type="hidden" id="price">
                            <input type="hidden" id="qty_cart">
                            <input type="hidden" id="batas_qty">
                            <input type="hidden" id="potongan">
                            <div class="input-group">
                                <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Barcode" required autofocus>
                                <button type="button" id="btn-item" class="btn bg-gradient-info no-mb" data-toggle="tooltip" title="Pilih Item" data-bs-toggle="modal" data-bs-target="#modal-item"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mb-2">
                    <div class="col-3">
                        <label>Nama Barang</label>
                    </div>
                    <div class="col">
                        <input type="text" id="item_name" class="form-control" placeholder="Nama Barang" readonly>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-3">
                        <label>Jumlah Stok</label>
                    </div>
                    <div class="col-3">
                        <div class="input-group">
                            <input type="number" id="stock" class="form-control" placeholder="Stok" readonly>
                            <span class="input-group-text">Pcs</span>
                        </div>
                    </div>
                    <div class="col-2">
                        <label for="qty">Jumlah</label>
                    </div>
                    <div class="col-4">
                        <div class="row">
                            <div class="input-group">
                                <input type="number" id="qty" value="1" min="1" class="form-control">
                                <button type="button" class="btn bg-gradient-primary no-mb" data-toggle="tooltip" title="Masukkan Cart" id="add_cart"><i class="fa fa-cart-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel -->
    <div class="row">
        <div class="col d-flex mb-3">
            <div class="card card-body">
                <table class="table align-items-center mb-0" id="cart">
                    <thead>
                        <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Barcode</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Barang</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Diskon Barang</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="cart_table">
                        <?php $this->view('transaction/sales/cart_data') ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Form Bawah -->
    <div class="row">
        <div class="col-4 d-flex">
            <div class="card card-body justify-content-between">
                <div class="row align-items-center mb-2">
                    <div class="col-4">
                        <label for="sub_total">Subtotal</label>
                    </div>
                    <div class="col-8">
                        <div class="input-group">
                            <span class="input-group-text">Rp. </span>
                            <input type="number" id="sub_total" value="" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mb-2">
                    <div class="col-4">
                        <label for="discount">Diskon Transaksi</label>
                    </div>
                    <div class="col-8">
                        <div class="input-group">
                            <span class="input-group-text">Rp. </span>
                            <input type="text" id="discount" value="0" min="0" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-4">
                        <label for="grand_total">Grand Total</label>
                    </div>
                    <div class="col-8">
                        <div class="input-group">
                            <span class="input-group-text">Rp. </span>
                            <input type="number" id="grand_total" class="form-control" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 d-flex">
            <div class="card card-body justify-content-between">
                <div class="row align-items-center mb-2">
                    <div class="col-4">
                        <label for="cash">Pembayaran</label>
                    </div>
                    <div class="col-8">
                        <div class="input-group">
                            <span class="input-group-text">Rp. </span>
                            <input type="text" id="cash" value="0" min="0" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mb-2">
                    <div class="col-4">
                        <label for="change">Kembalian</label>
                    </div>
                    <div class="col-8">
                        <div class="input-group">
                            <span class="input-group-text">Rp. </span>
                            <input type="number" id="change" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-4">
                        <label for="note">Catatan</label>
                    </div>
                    <div class="col-8">
                        <textarea class="form-control" id="note" rows="1" placeholder="Catatan Tambahan"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 d-flex">
            <div class="card card-body">
                <div class="text-center">
                    <h4>Invoice <b><span id="invoice"><?= $invoice ?></span></b></h4>
                    <h2><b><span id="grand_total2">0</span></b></h2>
                </div>
                <div class="gap-2 d-flex justify-content-between">
                    <button id="cancel_payment" class="btn bg-gradient-danger no-mb w-100">
                        <span>Reset</span>
                        <span><i class="fa fa-redo"></i></span>
                    </button>
                    <button id="process_payment" class="btn bg-gradient-success no-mb w-100">
                        <span>Transaksi</span>
                        <span><i class="fa fa-fighter-jet"></i></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Modal -->
<!-- Modal Item & Barcode -->
<div class="modal fade" id="modal-item" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Item Untuk Cart</h5>
                <button type="button" class="btn badge bg-gradient-secondary no-mb" data-bs-dismiss="modal" data-toggle="tooltip" title="Tutup"><i class="fa fa-times"></i></button>
            </div>
            <div class="modal-body">
                <div class="table p-0">
                    <table class="table align-items-center mb-0" id="table">
                        <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Barcode</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Produk</th>
                                <th class="text-right text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga Barang</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stok Barang</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Diskon / Pembelian</th>
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
                                        <p class="text-xs font-weight-bold mb-0"><?= wordwrap($data->name, 60, "<br>") ?></p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0 text-right"><?= indo_currency($data->price) ?></p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0 text-center"><?= $data->stock ?></p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0 text-center"><?= $data->potongan && $data->batasan_qty != 0 ? indo_currency($data->potongan) . ' / ' . $data->batasan_qty : "Tidak Ada Diskon" ?></p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <button class="btn badge badge-sm bg-gradient-info no-mb" id="select" data-dismiss="modal" data-toggle="tooltip" title="Pilih <?= $data->name ?>" data-id="<?= $data->item_id ?>" data-barcode="<?= $data->barcode ?>" data-name="<?= $data->name ?>" data-price="<?= $data->price ?>" data-stock="<?= $data->stock ?>" data-batasan_qty="<?= $data->batasan_qty ?>" data-potongan="<?= $data->potongan ?>">
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

<!-- Modal Update -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Barang Dalam Cart</h5>
                <button type="button" class="btn badge bg-gradient-secondary no-mb" data-bs-dismiss="modal" data-toggle="tooltip" title="Tutup"><i class="fa fa-times"></i></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="cartid_item">
                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" id="product_item" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-3">
                            <label>Barcode</label>
                            <input type="text" id="barcode_item" class="form-control" readonly>
                        </div>
                        <div class="col-5">
                            <label for="price_item">Harga Satuan</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp. </span>
                                <input type="number" id="price_item" min="0" class="form-control">
                            </div>
                        </div>
                        <div class="col-4">
                            <label>Stok</label>
                            <div class="input-group">
                                <input type="number" id="stock_item" class="form-control" readonly>
                                <span class="input-group-text">Pcs</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="discount_item">Diskon Barang (<span id="ptg" class="text-green"></span> / <span id="bts" class="text-green"></span>)</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp. </span>
                                <input type="number" id="discount_item" min="0" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="qty_item">Jumlah</label>
                            <div class="input-group">
                                <input type="number" id="qty_item" min="1" class="form-control">
                                <span class="input-group-text">Pcs</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label for="total_before">Total Tanpa Diskon</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp. </span>
                                <input type="number" id="total_before" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <label for="total_item">Total Setelah Diskon</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp. </span>
                                <input type="number" id="total_item" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer footer-spacing justify-content-end">
                <button type="button" class="btn bg-gradient-primary no-mb" id="edit_cart">
                    <span>Simpan</span>
                    <span><i class="fa fa-save"></i></span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Barang Dalam Cart</h5>
                <button type="button" class="btn badge bg-gradient-secondary no-mb" data-bs-dismiss="modal" data-toggle="tooltip" title="Tutup"><i class="fa fa-times"></i></button>
            </div>
            <div class="modal-body">
                <p class="no-mb">Yakin Akan Menghapus <span id="brg-hps"></span> dari Cart?</p>
            </div>
            <div class="modal-footer">
                <button type="submit" id="del-confirm" class="btn btn-sm bg-gradient-primary no-mb float-end">Hapus Data</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Reset -->
<div class="modal fade" id="modal-reset" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reset Semua Cart</h5>
                <button type="button" class="btn badge bg-gradient-secondary no-mb" data-bs-dismiss="modal" data-toggle="tooltip" title="Tutup"><i class="fa fa-times"></i></button>
            </div>
            <div class="modal-body">
                <p class="no-mb">Yakin Akan Menghapus Cart?</p>
            </div>
            <div class="modal-footer">
                <button type="submit" id="reset-confirm" class="btn btn-sm bg-gradient-primary no-mb float-end">Hapus Cart</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Transaksi -->
<div class="modal fade" id="modal-proses" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Transaksi</h5>
                <button type="button" class="btn badge bg-gradient-secondary no-mb" data-bs-dismiss="modal" data-toggle="tooltip" title="Tutup"><i class="fa fa-times"></i></button>
            </div>
            <div class="modal-body">
                <p class="no-mb">Konfirmasi Transaksi Ini?</p>
            </div>
            <div class="modal-footer">
                <button type="submit" id="proses-confirm" class="btn btn-sm bg-gradient-primary no-mb float-end">Cetak Struk</button>
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
    $(document).on('click', '#select', function() {
        var barcode = $(this).data('barcode')
        $('#item_id').val($(this).data('id'))
        $('#barcode').val(barcode)
        $('#item_name').val($(this).data('name'))
        $('#price').val($(this).data('price'))
        $('#stock').val($(this).data('stock'))
        $('#batas_qty').val($(this).data('batasan_qty'))
        $('#potongan').val($(this).data('potongan'))
        $('#modal-item').modal('hide')
        get_cart_qty(barcode)
    })

    function get_cart_qty(barcode) {
        $('#cart_table tr').each(function() {
            var qty_cart = $("#cart_table td.barcode:contains('" + barcode + "')").parent().find("td").eq(4).html()
            if (qty_cart != null) {
                $('#qty_cart').val(qty_cart)
            } else {
                $('#qty_cart').val(0)
            }
        })
    }

    $(document).on('click', '#add_cart', function() {
        var item_id = $('#item_id').val()
        var price = $('#price').val()
        var stock = $('#stock').val()
        var batas_qty = $('#batas_qty').val()
        var potongan = $('#potongan').val()
        var qty = $('#qty').val()
        var qty_cart = $('#qty_cart').val()
        var diskon = 0

        if (qty >= batas_qty && batas_qty != 0) {
            diskon = potongan
        } else {
            diskon
        }

        if (item_id == '') {
            toastr.warning('Mohon Pilih Produk Terlebih Dahulu')
            $('#btn-item').focus()
        } else if (stock < 1 || parseInt(stock) < (parseInt(qty_cart) + parseInt(qty))) {
            toastr.warning('Stok Barang Ini Tidak Mencukupi')
            $('#qty').focus()
        } else {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('sales/process') ?>',
                data: {
                    'add_cart': true,
                    'item_id': item_id,
                    'price': price,
                    'discount': diskon,
                    'qty': qty,
                },
                dataType: 'json',
                success: function(result) {
                    if (result.success == true) {
                        $('#cart_table').load('<?= site_url('sales/cart_data') ?>', function() {
                            calculate()
                        })
                        $('#item_id').val('')
                        $('#barcode').val('')
                        $('#item_name').val('')
                        $('#stock').val('')
                        $('#batas_qty').val('')
                        $('#potongan').val('')
                        $('#qty_cart').val('')
                        $('#qty').val(1)
                        $('#barcode').focus()
                        if (potongan > 0) {
                            toastr.success('Barang Berhasil Dimasukkan Cart')
                            toastr.info('Barang Ini Memiliki Potongan Setiap ' + batas_qty + ' Pembelian')
                        } else {
                            toastr.success('Barang Berhasil Dimasukkan Cart')
                        }
                    } else {
                        toastr.error('Barang Gagal Dimasukkan Cart')
                    }
                }
            })
        }
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
                        $('#price').val(result.item.price)
                        $('#stock').val(result.item.stock)
                        $('#batas_qty').val(result.item.batasan_qty)
                        $('#potongan').val(result.item.potongan)

                        $('#add_cart').click()
                    } else {
                        toastr.error('Barang Tidak Ditemukan')
                        $('#barcode').val('')
                    }
                }
            })
        }

        event.stopPropagation();
    });

    $(document).on('click', '#update_cart', function() {
        var batas_qty = $(this).data('batasan_qty')
        var potongan = $(this).data('potongan')
        var qty = $(this).data('qty')

        $('#cartid_item').val($(this).data('cartid'))
        $('#barcode_item').val($(this).data('barcode'))
        $('#product_item').val($(this).data('product'))
        $('#stock_item').val($(this).data('stock'))
        $('#price_item').val($(this).data('price')).valDuit()
        $('#qty_item').val($(this).data('qty'))
        $('#total_before').val($(this).data('price') * $(this).data('qty')).valDuit()
        $('#total_item').val($(this).data('total') - $(this).data('potongan')).valDuit()
        $('#ptg').text(potongan)
        $('#bts').text(batas_qty)

        if (parseInt(qty) >= parseInt(batas_qty)) {
            $('#discount_item').val($(this).data('potongan')).valDuit()
        } else {
            $('#discount_item').val(0)
        }

        $('#qty_item').change(function() {
            var qty = $('#qty_item').val()
            var mod = parseInt(qty) % parseInt(batas_qty)
            var diskon = $('#discount_item').val()

            if (parseInt(qty) >= parseInt(batas_qty)) {
                $('#discount_item').val(potongan).valDuit()
            } else {
                $('#discount_item').val(0)
            }
        })
    })

    function count_edit_modal() {
        var price = $('#price_item').val().replace(/[^\d]/g, "")
        var qty = $('#qty_item').val()
        var discount = $('#discount_item').val().replace(/[^\d]/g, "")

        total_before = price * qty
        $('#total_before').val(total_before).valDuit()

        total = (price * qty) - discount
        $('#total_item').val(total).valDuit()

        if (discount == '') {
            $('#discount_item').val(0)
        }
    }

    $(document).on('change', '#price_item, #qty_item', function() {
        count_edit_modal()
    })

    $(document).on('click', '#edit_cart', function() {
        var cart_id = $('#cartid_item').val()
        var price = $('#price_item').val().replace(/[^\d]/g, "")
        var qty = $('#qty_item').val()
        var discount = $('#discount_item').val().replace(/[^\d]/g, "")
        var total = $('#total_before').val().replace(/[^\d]/g, "")
        var stock = $('#stock_item').val()

        if (price == '' || price < 1) {
            toastr.warning('Harga Barang Harus Ada')
            $('#price_item').focus()
        } else if (qty == '' || qty < 1) {
            toastr.warning('Jumlah Barang Harus Ada')
            $('#qty_item').focus()
        } else if (parseInt(qty) > parseInt(stock)) {
            toastr.warning('Stok Barang Tidak Mencukupi')
            $('#qty_item').focus()
        } else {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('sales/process') ?>',
                data: {
                    'edit_cart': true,
                    'cart_id': cart_id,
                    'price': price,
                    'qty': qty,
                    'discount': discount,
                    'total': total
                },
                dataType: 'json',
                success: function(result) {
                    if (result.success == true) {
                        $('#modal-edit').modal('hide')
                        $('#cart_table').load('<?= site_url('sales/cart_data') ?>', function() {
                            calculate()
                        })
                        toastr.success('Barang Dalam Cart Berhasil di Update')
                    } else {
                        $('#modal-edit').modal('hide')
                        toastr.info('Tidak Ada Barang Yang di Update ')
                    }
                }
            })
        }
    })

    $(document).on('click', '#del_cart', function() {
        var cart_id = $(this).data('cartid')
        var brg = $(this).data('product')

        $('#brg-hps').text(brg)
        $('#modal-hapus').modal('toggle')
        $('#del-confirm').click(function() {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('sales/cart_del') ?>',
                dataType: 'json',
                data: {
                    'cart_id': cart_id
                },
                success: function(result) {
                    if (result.success == true) {
                        $('#modal-hapus').modal('toggle')
                        $('#cart_table').load('<?= site_url('sales/cart_data') ?>', function() {
                            calculate()
                        })
                        toastr.success('Data Berhasil Dihapus dari Cart')
                    }
                }
            })
        })
    })

    $(document).on('click', '#discount, #cash', function() {
        if ($(this).val() != 0) {
            $(this).val()
        } else {
            $(this).val('')
            $(this).focus()
        }
    })

    $(document).ready(function() {
        $('#discount, #cash').focusout(function() {
            if ($(this).val() != 0) {
                $(this).val()
            } else {
                $(this).val(0)
            }
        })
    })

    $.fn.valDuit = function() {
        return this.each(function() {
            $(this).val($(this).val().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."))
        })
    }

    $.fn.txtDuit = function() {
        return this.each(function() {
            $(this).text($(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."))
        })
    }

    $('#discount, #cash, #price_item').on({
        keyup: function() {
            formatCurrency($(this));
        },
        blur: function() {
            formatCurrency($(this), "blur");
        },
    });

    function calculate() {
        var subtotal = 0
        var total = 0
        $('#cart_table tr').each(function() {
            var cart_total = $(this).find('#total').text().replace(/[^\d]/g, "")
            var harga = $(this).find('#harga').text().replace(/[^\d]/g, "")
            var jumlah = $(this).find('#jumlah').text().replace(/[^\d]/g, "")
            subtotal += (parseInt(harga) * parseInt(jumlah))
            total += parseInt(cart_total)
        })
        isNaN(subtotal) ? $('#sub_total').val(0) : $('#sub_total').val(subtotal).valDuit()

        var discount = $('#discount').val().replace(/[^\d]/g, "")
        var grand_total = total - discount
        if (isNaN(grand_total)) {
            $('#grand_total').val(0)
            $('#grand_total2').text(0)
        } else {
            $('#grand_total').val(grand_total).valDuit()
            $('#grand_total2').text(grand_total).prepend('Rp. ').append(',-').txtDuit()
        }

        var cash = $('#cash').val().replace(/[^\d]/g, "")
        cash != 0 ? $('#change').val(cash - grand_total).valDuit() : $('#change').val(0)
    }

    $(document).on('keyup mouseup', '#discount, #cash', function() {
        calculate()
    })

    $(document).ready(function() {
        calculate()
    })

    $(document).on('click', '#cancel_payment', function() {
        $('#modal-reset').modal('toggle')
        $('#reset-confirm').click(function() {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('sales/cart_del') ?>',
                dataType: 'json',
                data: {
                    'cancel_payment': true
                },
                success: function(result) {
                    if (result.success == true) {
                        $('#modal-reset').modal('toggle')
                        $('#cart_table').load('<?= site_url('sales/cart_data') ?>', function() {
                            calculate()
                        })
                        toastr.success('Cart Berhasil Di Reset')
                    }
                }
            })
            $('#item_name').val('')
            $('#stock').val('')
            $('#discount').val(0)
            $('#cash').val(0)
            $('#customer').val('').change()
            $('#barcode').val('')
            $('#barcode').focus()
        })
    })

    $(document).on('click', '#process_payment', function() {
        var customer_id = $('#customer').val()
        var subtotal = $('#sub_total').val().replace(/[^\d]/g, "")
        var discount = $('#discount').val().replace(/[^\d]/g, "")
        var grandtotal = $('#grand_total').val().replace(/[^\d]/g, "")
        var cash = $('#cash').val().replace(/[^\d]/g, "")
        var change = $('#change').val().replace(/[^\d]/g, "")
        var note = $('#note').val()
        var date = $('#date').val()
        var sum = 0

        var fullDate = new Date()
        console.log(fullDate);

        var twoDigitMonth = ((fullDate.getMonth().length + 1) === 1) ? (fullDate.getMonth() + 1) : '0' + (fullDate.getMonth() + 1);

        var currentDate = fullDate.getFullYear() + "-" + twoDigitMonth + "-" + fullDate.getDate();
        console.log(currentDate);

        $('#cart #potong').each(function() {
            var potongan = $(this).text().replace(/[^\d]/g, "")
            if (!isNaN(potongan) && potongan.length != 0) {
                sum += parseInt(potongan)
            }
        })

        if (subtotal < 1) {
            toastr.warning('Mohon Pilih Produk Terlebih Dahulu')
            $('#barcode').focus()
        } else if (isNaN(discount)) {
            toastr.warning('Angka Diskon Salah, Silahkan Masukkan Hanya Angka')
            $('#discount').focus()
        } else if (cash < 1) {
            toastr.warning('Mohon Isi Jumlah Cash Terlebih Dahulu')
            $('#cash').focus()
        } else if (isNaN(cash)) {
            toastr.warning('Angka Pembayaran Salah, Silahkan Masukkan Hanya Angka')
            $('#cash').focus()
        } else if (parseInt(cash) < parseInt(grandtotal)) {
            toastr.warning('Jumlah Pembayaran Kurang, Mohon Isi Dengan Benar')
            $('#cash').focus()
        } else {
            var diskon = (parseInt(discount) + parseInt(sum))
            var diskon_sale = (parseInt(discount))
            $('#modal-proses').modal('toggle')
            $('#proses-confirm').click(function() {
                $.ajax({
                    type: 'POST',
                    url: '<?= site_url('sales/process') ?>',
                    data: {
                        'process_payment': true,
                        'customer_id': customer_id,
                        'subtotal': subtotal,
                        'discount_sale': diskon_sale,
                        'discount_all': diskon,
                        'grandtotal': grandtotal,
                        'cash': cash,
                        'change': change,
                        'note': note,
                        'date': currentDate,
                    },
                    dataType: 'json',
                    success: function(result) {
                        if (result.success) {
                            toastr.success('Transaksi Berhasil Di Proses')
                            window.open('<?= site_url('sales/cetak/') ?>' + result.sales_id, '_blank')
                        } else {
                            toastr.error('Transaksi Gagal Di Proses')
                        }
                        location.href = '<?= site_url('sales') ?>'
                    }
                })
            })
        }
    })
</script>