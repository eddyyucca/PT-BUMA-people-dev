<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href=" <?= base_url('assets') ?>/logo.ico">
    <title><?= $judul ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->
    <link href="<?= base_url('assets') ?>/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url('assets') ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?= base_url('assets') ?>/css/profil.css" rel="stylesheet">
    <!-- pop up -->
    <!-- select -->
    <link href="<?= base_url('assets') ?>/select/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="<?= base_url('assets') ?>/loading/loading.css" rel="stylesheet">
    <!-- <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'> -->
    <style>
        .file {
            visibility: hidden;
            position: absolute;
        }
    </style>

</head>
<!-- Loading Page -->

<body id="page-top" onload="myFunction()" style="margin:0;">
    <div id="loader"></div>
    <div style="display:none;" id="myDiv" class="animate-bottom">

        <!-- menu -->

        <body id="page-top">
            <!-- Page Wrapper -->
            <div id="wrapper">
                <!-- Sidebar -->
                <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
                    <!-- Sidebar - Brand -->
                    <!-- <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"> -->
                    <a class="sidebar-brand d-flex avbar-light bg-white topbar mb-4 static-top shadow align-items-center justify-content-center" href="<?= base_url('user') ?>">
                        <div class="sidebar-brand-icon">
                            <img src="<?= base_url('assets/logo.png'); ?>" width="90" height="35" alt="BUMA">
                        </div>
                        <div class="sidebar-brand-text mx-3"></div>
                    </a>
                    <!-- Divider -->
                    <hr class="sidebar-divider my-0">
                    <!-- Nav Item - Dashboard -->

                    <!-- Divider -->
                    <hr class="sidebar-divider">
                    <!-- Heading -->
                    <div class="sidebar-heading">
                        Interface
                    </div>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('user/profil') ?>">
                            <i class="fas fa-user-alt"></i>
                            <span>Profil</span></a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('user/suggestionsystem') ?>">
                            <i class="fas fa-sort-amount-up-alt"></i>
                            <span>Suggestion system</span></a>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('user/continuesimprovement') ?>">
                            <i class="fas fa-fw fa-chart-area"></i>
                            <span>Cont. Improvement</span></a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#training" aria-expanded="true" aria-controls="training">
                            <i class="fas fa-database"></i>
                            <span>Training</span>
                        </a>
                        <div id="training" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item" href="<?= base_url('user/training_int') ?>">Training Internal</a>
                                <!-- <a class="collapse-item" href="<?= base_url('user/training') ?>">Training External</a> -->
                              </div>
                        </div>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('user/assessment') ?>">
                            <i class="fas fa-tasks"></i>
                            <span>Assessment</span></a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('user/password') ?>">
                            <i class="fas fa-unlock-alt"></i>
                            <span>Password</span></a>
                    </li>

                    <!-- Divider -->

                    <!-- Divider -->
                    <hr class="sidebar-divider d-none d-md-block">


                    <!-- Divider -->

                    <!-- Sidebar Toggler (Sidebar) -->
                    <div class="text-center d-none d-md-inline">
                        <button class="rounded-circle border-0" id="sidebarToggle"></button>
                    </div>

                </ul>
                <!-- End of Sidebar -->

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

                                <!-- Nav Item - Alerts -->

                                <!-- Nav Item - User Information -->
                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mr-2 d-none d-lg-inline text-gray-600">
                                            <?= $nama; ?>
                                        </span>
                                        <i class="fas fa-user-circle"></i>
                                    </a>
                                    <!-- Dropdown - User Information -->
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="<?= base_url('login/keluar') ?>" data-toggle="modal" data-target="#logoutModal">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Keluar
                                        </a>
                                        <a class="dropdown-item" href="<?= base_url('user/password') ?>">
                                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i></i>
                                            Setting
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </nav>

                        <!-- End of Topbar -->

                        <!-- end menu -->