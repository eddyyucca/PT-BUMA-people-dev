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
                        <img class="shadow rounded-circle" <?php
                                                            if ($data->foto == false) { ?> src="<?= base_url('assets/profil_default.png') ?>" <?php
                                                                                                                                            } else {
                                                                                                                                                ?> src="<?= base_url('assets/profil_default.png') ?>" <?php
                                                                                                                                                                                                    } ?> "
                              alt=" Foto_profil" class="card-img-top" data-holder-rendered="true" style="height: 275px; width: 225px; display: block;">


                    </div>
                    <div class="col-6">
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

    <div class="row">
        <div class="col-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#pendidikan" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="pendidikan">
                    <h6 class="m-0 font-weight-bold text-primary">Training </h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="pendidikan">
                    <div class="card-body">
                        <?php
                        if ($pendidikan == false) {
                            echo "-- Data Kosong --";
                        } else { ?>
                            <?php foreach ($data as $pen) { ?>
                                <table border="0">
                                    <tr>
                                        <td>Tingkatan</td>
                                        <td> </td>
                                    </tr>
                                </table>
                                <hr>
                                </tr>
                        <?php }
                        } ?>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#rw_pekerjaan" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="rw_pekerjaan">
                    <h6 class="m-0 font-weight-bold text-primary">Sertifikat</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="rw_pekerjaan">
                    <div class="card-body">
                        <?php
                        if ($data == false) {
                            echo "-- Data Kosong --";
                        } else { ?>
                            <?php foreach ($riwayat_pekerjaan as $rp) { ?>
                                <table border="0">
                                    <tr>
                                        <td>Nama Perusahaan</td>
                                        <td> : </td>
                                    </tr>
                                </table>
                                <hr>
                                </tr>
                        <?php }
                        } ?>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>