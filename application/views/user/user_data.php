<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <h6 class="font-weight-bolder mb-0 mt-0">User</h6>
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
                            <h6>Data User</h6>
                        </div>
                        <div class="col">
                            <div class="float-end">
                                <a class="btn btn-sm bg-gradient-primary" href="<?= site_url('user/add') ?>">Tambah User</a>
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
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Karyawan</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat Karyawan</th>
                                    <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Level</th> -->
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
                                            <p class="text-xs font-weight-bold mb-0"><?= $data->name ?></p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0 text-center"><?= $data->username ?></p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0 text-center"><?php echo wordwrap($data->address, 25, "<br>"); ?></p>
                                        </td>
                                        <!-- <td>
                                            <p class="text-xs font-weight-bold mb-0 text-center"><?= $data->level == 1 ? "Admin" : "Kasir" ?></p>
                                        </td> -->
                                        <td class="align-middle text-center text-sm">
                                            <a class="btn badge badge-sm bg-gradient-success" data-toggle="tooltip" title="Edit User" href="<?= site_url('user/edit/' . $data->user_id) ?>"><i class="fa fa-pencil-alt"></i></a>
                                            <button type="button" class="btn badge badge-sm bg-gradient-danger" data-toggle="tooltip" title="Hapus User" data-bs-toggle="modal" data-bs-target="#modal-hapus<?= $data->user_id ?>"><i class="fa fa-trash"></i></button>
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

<!-- Alert Toastr -->
<?php if ($this->session->flashdata('success')) { ?>
    <?php $this->load->view('utilities/alert'); ?>
<?php } else if ($this->session->flashdata('error')) { ?>
    <?php $this->load->view('utilities/alert'); ?>
<?php } ?>

<!-- Modal Modal -->
<!-- Modal Hapus -->
<?php foreach ($row->result() as $key => $data) { ?>
    <div class="modal fade" id="modal-hapus<?= $data->user_id ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <?php echo form_open('user/delete/' . $data->user_id); ?>
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data User</h5>
                </div>
                <div class="modal-body">
                    <p class="no-mb">Yakin Akan Menghapus Data User <?php echo $data->name ?>?</p>
                </div>
                <div class="modal-footer footer-spacing">
                    <button type="button" class="btn bg-gradient-secondary no-mb" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn bg-gradient-primary no-mb">Hapus Data</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
<?php } ?>