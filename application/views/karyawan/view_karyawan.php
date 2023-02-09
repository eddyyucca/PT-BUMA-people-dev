<div class="container-fluid">
    <?= $this->session->flashdata('pesanan'); ?>
    <!-- Page Heading -->
    <div class="card-body">
        <div class="card shadow mb-4">
            <div class="card-header">
                Profil <?= $data->nama ?>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <img class="shadow" <?php
                                            if ($data->foto == false) { ?> src="<?= base_url('assets/profil_default.png') ?>" <?php
                                                                                                                            } else {
                                                                                                                                ?> src="<?= base_url('assets/profil_default.png') ?>" <?php
                                                                                                                                                                                    } ?> "
                              alt=" Foto_profil" class="card-img-top" data-holder-rendered="true" style="height: 275px; width: 225px; display: block;">


                    </div>
                    <div class="col-6">
                        <a href="<?= base_url('user_karyawan/cetak_idcard/' .  $data->nik) ?>" class="btn btn-primary mt-2">Edit Data Karyawan</a>
                        <a href="<?= base_url('user_karyawan/riwayat_pendidikan/' .  $data->nik) ?>" class="btn btn-primary mt-2">Cetak Personal Data</a>
                        <hr>

                        <table class="mt-2 ml-3">
                            <tr>
                                <td> NIK</td>
                                <td>: <?= $data->nik ?> </td>
                            </tr>
                            <tr>
                                <td> Nama</td>
                                <td>: <?= $data->nama ?> </td>
                            </tr>
                            <tr>
                                <td> Departemen</td>
                                <td>: <?= $data->nama_dep ?> </td>
                            </tr>
                            <tr>
                                <td> Jabatan </td>
                                <td>: <?= $data->nama_jab ?> </td>
                            </tr>
                            <tr>
                                <td> TTL </td>
                                <td>: <?= $data->tempat ?> <?= $data->tanggal_lahir ?> </td>
                            </tr>
                            <tr>
                                <td> Alamat </td>
                                <td>: <?= $data->alamat ?> </td>
                            </tr>
                            <tr>
                                <td> Email </td>
                                <td>: <?= $data->email ?> </td>
                            </tr>
                            <tr>
                                <td> No Telpon </td>
                                <td>: <?= $data->telpon ?> </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>



    </div>