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
            <h4 style="text-align:center"><b>Data Feedback</b></h4>
            <hr>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="active">
                                <th style="width: auto">No</th>
                                <th style="text-align:center">Nama Foto</th>
                                <th style="text-align:center">Deskripsi</th>
                                <th style="text-align:center">Foto</th>
                                <th style="text-align:center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach($feedback as $val){?>
                                <tr>
                                    <td style="text-align:center"><?php echo $no; ?></td>
                                    <td style="text-align:center"><?php echo $val->nama; ?></td>
                                    <td style="text-align:center"><?php echo $val->email; ?></td>
                                    <td style="text-align:center"><?php echo $val->text; ?></td>
                                    <td class="project-actions text-center">
                                        <!-- <a class="btn btn-warning btn-sm" href="<?php echo site_url('gallery/get_by_id/'.$val->id_gallery)?>">
                                            <i class="fas fa-edit"></i>Edit</a> -->
                                        <a class="btn btn-danger btn-sm" href="<?php echo site_url('feedback/delete/'.$val->id_feedback)?>" onclick="return confirm('Yakin Akan Hapus Data Ini?')">
                                            <i class="fas fa-trash"></i>Delete</a>
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

        

</div>
    <!-- /.container-fluid -->





