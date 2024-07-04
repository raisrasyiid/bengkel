 <!-- Content Wrapper -->
 <div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
        <!-- <form
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                    aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form> -->

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                    <img class="img-profile rounded-circle"
                        src="<?= base_url('assets/img/undraw_profile.svg');?>">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?= site_url('admin/profile');?>">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Settings
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        Activity Log
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= site_url('admin/logout');?>" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid table-responsive">
        <!-- Page Heading -->
        <div class="box-header">
            <h4 style="text-align:center"><b>Data Layanan</b></h4>
            <hr>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
            <!-- <div class="card-footer clearfix">
                    <a href="<?php echo site_url('layanan/add'); ?>" class="btn btn-sm btn-primary float-left">Tambah Data</a> 
                </div> -->
            </div>
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="active">
                                <th style="width: auto">No</th>
                                <th style="text-align:center">Nama Pelanggan</th>
                                <th style="text-align:center">No Hp</th>
                                <th style="text-align:center">Keluhan</th>
                                <th style="text-align:center">Tanggal Booking</th>
                                <th style="text-align:center">Waktu Booking</th>
                                <th style="text-align:center">Status</th>
                                <th style="text-align:center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach($booking as $val){?>
                                <tr>
                                    <td style="text-align:center"> <?php echo $no; ?></td>
                                    <td style="text-align:center"> <?php echo $val->nama_user; ?></td>
                                    <td style="text-align:center"> <?php echo $val->no_hp_user; ?></td>
                                    <td style="text-align:center"> <?php echo $val->keluhan; ?></td>
                                    <td style="text-align:center"> <?php echo $val->tgl_book; ?></td>
                                    <td style="text-align:center"> <?php echo $val->waktu_book; ?></td>
                                    <td style="text-align:center">
                                        <?php if ($val->status == "Berhasil"){?>
                                            <button class="btn btn-success" style="color: white">Disetujui</button>
                                        <?php } elseif ($val->status == "Menunggu") {?>
                                            <button class="btn btn-secondary" style="color: white">Menunggu</button>
                                        <?php } else {?>
                                            <button class="btn btn-danger" style="color: white">Dibatalkan</button>
                                        <?php } ?> 
                                    </td>
                                    <td class="project-actions text-center">
                                        <div class="btn-group">
                                            <a href="<?php echo site_url('booking/ubah_status/'.$val->id_book);?>" class="btn btn-warning" style="color: white">Ubah Status</a>
                                        </div>
                                        <div class="btn-group disabled">
                                            <a href="<?php echo site_url('booking/delete/'.$val->id_book);?>" class="btn btn-danger" style="color: white">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                                <?php $no++; } ?>
                        </tbody>
                    </table>
                </div>
                <!-- terima session dari controller -->
	            <div class="pesan" data-flashdata="<?php echo $this->session->flashdata('pesan'); ?>"></div>
        </div>
    </div>

        

</div>
    <!-- /.container-fluid -->





