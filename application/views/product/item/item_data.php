<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <h6 class="font-weight-bolder mb-0 mt-0">Produk</h6>
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

<!-- Tabel -->
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
                                <a class="btn btn-sm bg-gradient-primary" href="<?= site_url('item/tambah') ?>">Tambah Produk</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="table">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Barcode</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kategori</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stok</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Diskon / Pembelian</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($row->result() as $key => $data) { ?>
                                    <tr>
                                        <td>
                                            <p class="text-xs text-secondary mb-0 text-center"><?= $no++ ?></p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0 text-center">
                                                <?= $data->barcode ?>
                                                <br>
                                                <button type="button" class="btn badge bg-gradient-secondary no-mb" data-toggle="tooltip" title="Lihat Barcode" data-bs-toggle="modal" data-bs-target="#modal-barcode<?= $data->item_id ?>"><i class="fa fa-eye"></i></button>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0"><?= wordwrap($data->name, 22, "<br>") ?></p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0"><?= $data->category_name ?>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0 text-right"><?= indo_currency($data->price); ?>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0 text-center"><?= $data->stock ?>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0 text-center"><?= $data->potongan && $data->batasan_qty != 0 ? indo_currency($data->potongan) . ' / ' . $data->batasan_qty : wordwrap("Tidak Ada Diskon", 10, "<br>") ?>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0 text-center">
                                                <?php if ($data->image != null) { ?>
                                                    <img src="<?= base_url('uploads/product/' . $data->image) ?>" style="width: 130px">
                                                <?php } else { ?>
                                                    <?php echo wordwrap("Tidak Ada Gambar", 10, "<br>"); ?>
                                                <?php } ?>
                                            </p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <a href="<?= site_url('item/update/' . $data->item_id) ?>" class="btn badge bg-gradient-success no-mb" data-toggle="tooltip" title="Edit Produk">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <button type="button" class="btn badge bg-gradient-danger no-mb" data-toggle="tooltip" title="Hapus Produk" data-bs-toggle="modal" data-bs-target="#modal-hapus<?= $data->item_id ?>"><i class="fa fa-trash"></i></button>
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
</div>

<!-- Modal Modal -->

<!-- Modal Barcode -->
<?php foreach ($row->result() as $key => $data) { ?>
    <div class="modal fade" id="modal-barcode<?= $data->item_id ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Barcode</h5>
                    <button type="button" class="btn badge bg-gradient-secondary no-mb" data-bs-dismiss="modal" data-toggle="tooltip" title="Tutup"><i class="fa fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <p class="no-mb text-center">
                        <?php
                        $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                        echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($data->barcode, $generator::TYPE_CODE_128)) . '"style="width:200px">';
                        ?>
                        <br>
                        <?= $data->barcode ?>
                        <br>
                        <a href="<?= site_url('item/barcode_print/' . $data->item_id) ?>" target="_blank" class="btn btn-sm bg-gradient-success no-mb">
                            <i class="fa fa-print"></i> Print
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Modal Hapus -->
<?php foreach ($row->result() as $key => $data) { ?>
    <div class="modal fade" id="modal-hapus<?= $data->item_id ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <?php echo form_open('item/hapus/' . $data->item_id); ?>
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data Produk</h5>
                    <button type="button" class="btn badge bg-gradient-secondary no-mb" data-bs-dismiss="modal" data-toggle="tooltip" title="Tutup"><i class="fa fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <p class="no-mb">Yakin Akan Menghapus Data Dari Produk <?php echo $data->name ?>?</p>
                </div>
                <div class="modal-footer float-right">
                    <button type="submit" class="btn btn-sm bg-gradient-primary no-mb">Hapus Data</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Alert Toastr -->
<?php if ($this->session->flashdata('success')) { ?>
    <?php $this->load->view('utilities/alert'); ?>
<?php } else if ($this->session->flashdata('error')) { ?>
    <?php $this->load->view('utilities/alert'); ?>
<?php } ?>
