<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('user_karyawan/') ?>"><i class="fas fa-arrow-circle-left"> Kembali</i></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="container">
                    <form action="<?= base_url('user/proses_ubah_password/') . $data->nik ?>" method="POST">
                        <table class="table">
                            <!-- <?= $pesan; ?> -->
                            <?php

                            if ($this->session->flashdata('pesan') == "update") { ?>
                                <div class="alert alert-success" role="alert">Password Berhasil Di Ubah !
                                </div>
                            <?php   } elseif ($this->session->flashdata('pesan') == "salah") { ?>
                                <div class="alert alert-danger" role="alert">
                                    Password Salah !
                                </div>
                            <?php    } elseif ($this->session->flashdata('pesan') == "mtc") { ?>
                                <div class="alert alert-warning" role="alert">
                                    Password Tidak Sama !
                                </div>
                            <?php    } ?>
                            <tr>
                                <td width=20%>Password Lama</td>
                                <td><input type="password" name="password_lama" class="form-control" placeholder="Password Lama"></td>
                            </tr>
                            <tr>
                                <td width=20%>Password Baru</td>
                                <td><input type="password" name="password_baru" class="form-control" placeholder="Password Baru"></td>
                            </tr>
                            <tr>
                                <td width=20%>Ulangi Password Baru</td>
                                <td><input type="password" name="u_password" class="form-control" placeholder="Ulangi Password Baru"></td>
                            </tr>
                            <td>
                                <button class="btn btn-primary">Ubah</button>
                            </td>
                            <td></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>