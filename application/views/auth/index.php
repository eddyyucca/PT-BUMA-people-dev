<body>
    <div class="mbr-slider slide carousel" data-keyboard="false" data-ride="carousel" data-interval="2000" data-pause="true">
        <div class="container">
            <!-- Outer Row -->
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card o-hidden border-0 shadow-lg my-5 ">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <img src="<?= base_url('assets/logo.png') ?>" width="30%">
                                            <hr>
                                            <?php

                                            if ($this->session->flashdata('login') == "n_login") { ?>
                                                <div class="alert alert-danger" role="alert">Anda Belum Login !
                                                </div>
                                            <?php   } elseif ($this->session->flashdata('login') == "keluar_akun") { ?>
                                                <div class="alert alert-success" role="alert">
                                                    Anda Berhasil Keluar !
                                                </div>
                                            <?php    } ?>
                                            <!-- <h1 class="h4 text-gray-900 mb-4">Login</h1> -->
                                        </div>
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
                                            <div class="form-group mb-4">
                                                <div class="form-group mb-4">
                                                    <input type="text" class="form-control" name="nik" placeholder="NIK Karyawan">
                                                </div>
                                            </div>

                                            <div class="form-group mb-4">
                                                <input type="password" class="form-control" name="password" placeholder="Password">
                                            </div>
                                            <hr>
                                            <button type="submit" class="btn btn-success btn-user btn-block">
                                                <i class="fas fa-sign-in-alt"></i> Masuk
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>