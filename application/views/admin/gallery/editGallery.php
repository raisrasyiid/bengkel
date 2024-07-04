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

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <h6 class="text-dark">Nama Desa : <b><?php echo $this->session->userdata('nama_desa') ?></b> </h6>
                <span class="mr-2 d-none d-lg-inline text-grey-600 small"></span>
            </a>
        </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                    <img class="img-profile rounded-circle" src="<?php echo base_url('assets/admin/img/undraw_profile.svg'); ?>">
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

<!-- Contact Start -->
<div class="container-fluid">
    <div class="latest-product__text mb-4">
        <h4 class="section-title px-5">Form Edit Gallery</h4>
        <p class="mb-4 px-5">Halaman edit gallery untuk menambah data gallery yang kemudian akan ditampilkan ke halaman home sehingga informasi pada blog dapat dilihat oleh pelanggan yang ingin melihat konten edukasi.</p>
    </div>
    <div class="row px-xl-5">
        <div class="col-lg-7 mb-5">
            <div class="contact-form">
            <form name="sentMessage" method="post" action="<?php echo site_url('gallery/edit/'.$gallery->id_gallery);?>" enctype="multipart/form-data" autocomplete="off">
                <?php if($this->session->flashdata('gallery')): ?>
                    <?php echo $this->session->flashdata('gallery');?>    
                <?php endif; ?>
                <div class="control-group">
                    <label>Nama gallery</label>
                    <input type="text" class="form-control" value="<?php echo $gallery->nama_gallery; ?>" id="nama_gallery" name="nama_gallery" placeholder="nama gallery" autofocus required="required" data-validation-required-message="Please enter your nama gallery" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <label>Deskripsi</label>
                    <input type="text" class="form-control" value="<?php echo $gallery->deskripsi_gallery; ?>" id="deskripsi" name="deskripsi_gallery" placeholder="deskripsi" autofocus required="required" data-validation-required-message="Please enter your deskripsi gallery" />
                    <p class="help-block text-danger"></p>
                </div>
                <div>
                    <img src="<?php echo base_url('assets/foto_gallery/' . $gallery->foto_gallery);?>" alt="gambar" width="100" height="100">
                </div>
                <div class="control-group">
                    <label>Gambar</label>
                    <!-- Tambahkan input file untuk mengunggah gambar baru -->
                    <input type="file" class="form-control" id="foto_gallery" name="foto_gallery" autofocus>
                    <!-- Tambahkan input tersembunyi untuk menyimpan nama gambar yang sudah ada -->
                    <input type="hidden" name="gambar_lama" value="<?php echo $gallery->foto_gallery; ?>">
                    <p class="help-block text-danger"></p>
                </div>
                <br>
                <div>
                    <button class="btn bnt-sm btn-info float-left" type="submit" id="sendMessageButton">Simpan</button>
                    <button onClick="goBack()" class="btn btn-danger">Kembali</button>
                    <script>
                    function goBack() {
                        window.history.back();
                    }
                    </script>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>