<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard Bengkel</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet');?>" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/admin/css/sb-admin-2.min.css');?>" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=site_url('admin/dashboard')?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Dashboard Bengkel</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?=site_url('admin/dashboard')?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('user');?>">
                    <i class="fas fa-users"></i>
                    <span>Data User</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('Layanan');?>">
                    <i class="fas fa fa-male"></i>
                    <span>Data Layanan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('Gallery');?>">
                    <i class="fa fa-address-card"></i>
                    <span>Data Gallery</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('Booking');?>">
                    <i class="fas fa-bookmark"></i>
                    <span>Data Booking</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('Feedback');?>">
                    <i class="fas fa-comments"></i>
                    <span>Data Feedback</span>
                </a>
            </li>
        </ul>
        <!-- End of Sidebar -->


