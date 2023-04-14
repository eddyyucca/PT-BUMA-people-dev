<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="Zenix - Crypto Admin Dashboard" />
    <meta property="og:title" content="Zenix - Crypto Admin Dashboard" />
    <meta property="og:description" content="Zenix - Crypto Admin Dashboard" />
    <meta property="og:image" content="https://zenix.dexignzone.com/xhtml/social-image.png" />
    <meta name="format-detection" content="telephone=no">
    <title><?= $judul ?> </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/xhtml') ?>/images/favicon.png">
    <link href="<?= base_url('assets/xhtml') ?>/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/xhtml') ?>/css/style.css" rel="stylesheet">
    <style>
        body {
            background-image: url("<?= base_url('assets') ?>/img/bg-account.jpg");
            background-color: #000000;
        }
    </style>
</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <img src="<?= base_url('assets') ?>/logo.png" class="img-fluid" width="50%" alt="">
                                    </div>
                                    <!-- <h4 class="text-center mb-4">Sign in your account</h4> -->
                                    <?php

                                    if ($this->session->flashdata('login') == "n_login") { ?>
                                        <div class="alert alert-danger" role="alert">Anda Belum Login !
                                        </div>
                                    <?php   } elseif ($this->session->flashdata('login') == "keluar_akun") { ?>
                                        <div class="alert alert-success" role="alert">
                                            Anda Berhasil Keluar !
                                        </div>
                                    <?php    } ?>
                                    <?php

                                    if ($this->session->flashdata('pesan') == "pass_salah") { ?>
                                        <div class="alert alert-danger" role="alert">Password Salah !
                                        </div>
                                    <?php   } elseif ($this->session->flashdata('pesan') == "nik_k") { ?>
                                        <div class="alert alert-warning" role="alert">
                                            NIK Tidak Terdaftar !
                                        </div>
                                    <?php    } ?>
                                    <?= validation_errors() ?>
                                    <form class="user" action="<?= base_url('login/auth') ?>" method="POST">
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Nik</strong></label>
                                            <input type="text" name="nik" class="form-control" placeholder="Nomor Induk Karyawan">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" name="password" placeholder="Password" class="form-control">
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox ms-1">
                                                    <input type="checkbox" class="form-check-input" id="basic_checkbox_1">
                                                    <label class="form-check-label" for="basic_checkbox_1">Remember my preference</label>
                                                </div>
                                            </div>
                                            <!-- <div class="form-group">
                                                <a href="page-forgot-password.html">Forgot Password?</a>
                                            </div> -->
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                                        </div>
                                    </form>
                                    <!-- <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="./page-register.html">Sign up</a></p>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?= base_url('assets/xhtml') ?>/vendor/global/global.min.js"></script>
    <script src="<?= base_url('assets/xhtml') ?>/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="<?= base_url('assets/xhtml') ?>/js/custom.js"></script>
    <script src="<?= base_url('assets/xhtml') ?>/js/deznav-init.js"></script>


</body>

</html>