<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <h6 class="font-weight-bolder mb-0 mt-0">Kelola Produk</h6>
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
                                <a class="btn btn-sm bg-gradient-primary" href="<?= site_url('item') ?>">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="row mini-ml">
                        <?php echo form_open_multipart('item/process') ?>
                        <div class="form-group">
                            <label>Barcode </label>
                            <input type="hidden" name="id" value="<?= $row->item_id ?>">
                            <input type="text" name="barcode" id="barcode" value="<?= $row->barcode ?>" class="form-control" placeholder="Masukkan Barcode" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Produk</label>
                            <input type="text" name="product_name" value="<?= $row->name ?>" class="form-control" placeholder="Masukkan Nama Produk" required>
                        </div>
                        <div class="row align-items-center mb-2">
                            <div class="col">
                                <label>Kategori</label>
                                <select name="category" class="form-select form-control" required>
                                    <option value="">- Pilih Kategori -</option>
                                    <?php foreach ($category->result() as $key => $data) { ?>
                                        <option value="<?= $data->category_id ?>" <?= $data->category_id == $row->category_id  ? "selected" : null ?>><?= $data->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col">
                                <label>Harga</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp. </span>
                                    <input type="text" name="price" value="<?= $row->price ?>" class="form-control" placeholder="Harga Barang" required>
                                </div>
                            </div>
                        </div>
                        <div class="custom_upload_file form-group">
                            <label>Gambar</label>
                            <div class="input-group">
                                <?php if ($page == 'edit') {
                                    if ($row->image != null) { ?>
                                        <div style="margin-bottom:5px">
                                            <img src="<?= base_url('uploads/product/' . $row->image) ?>" style="width: 50%">
                                        </div>
                                <?php }
                                } ?>
                                <input type="file" name="image" class="form-control">
                                <label class="input-group-text mb-auto">Upload Gambar</label>
                            </div>
                        </div>
                        <div class="row align-items-center mb-2">
                            <div class="col">
                                <label>Minimal Pembelian</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="batasan_qty" value="<?= $row->batasan_qty ?>" placeholder="Min. Jumlah Pembelian Jika Diskon">
                                    <span class="input-group-text">Pcs</span>
                                </div>
                            </div>
                            <div class="col">
                                <label>Potongan Harga</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp. </span>
                                    <input type="text" class="form-control" name="potongan" value="<?= $row->potongan ?>" placeholder="Potongan Harga Setiap Min. Pembelian">
                                </div>
                            </div>
                        </div>
                        <div class="form-group pt-3">
                            <button type="reset" class="btn btn-sm bg-gradient-secondary no-mb reset">Reset</button>
                            <button type="submit" class="btn btn-sm bg-gradient-primary no-mb submit" name="<?= $page ?>">Simpan Produk</button>
                        </div>
                        <?php echo form_close() ?>
                    </div>
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
        $('#barcode').focus()
    })
</script>
