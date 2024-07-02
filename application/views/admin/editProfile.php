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
                    <a class="dropdown-item" href="#">
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

    <?php
        $idUser = $this->session->userdata('id_admin');

        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('id_admin', $idUser);
        $query = $this->db->get();
        $admin = $query->row_array();

    ?>

    <!-- Begin Page Content -->
    <div class="container-fluid table-responsive">
        <!-- Page Heading -->
        <h1 class="h3 mb-0 text-gray-800">Halaman Edit Data Profil Admin</h1>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form">
                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
                    <?php endif; ?>
                    
                    <?php if ($admin): ?>
                        <form name="sentMessage" method="post" action="<?php echo site_url('admin/saveEditProfile'); ?>" enctype="multipart/form-data" autocomplete="off">
                            <input type="hidden" name="id_admin" value="<?= $admin['id_admin'] ?>" />
                            <div class="control-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" value="<?= $admin['username'] ?>" required />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Masukkan password baru" required />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <label>Konfirmasi Password</label>
                                <input type="password" name="password-confirm" class="form-control" placeholder="Konfirmasi password baru" required />
                                <p class="help-block text-danger"></p>
                            </div>
                            <br>
                            <div class="form-group">
                                <button class="btn btn-info float-left" type="submit">Simpan</button>
                                <!-- <button type="button" class="btn btn-danger float-left ml-2" onclick="window.history.back('/admin/dashboard')">Kembali</button> -->
                            </div>
                        </form>
                    <?php else: ?>
                        <p>Data admin tidak ditemukan.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

        

</div>
    <!-- /.container-fluid -->





