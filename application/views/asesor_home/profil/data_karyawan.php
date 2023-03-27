<?php
function tanggal_indonesia($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );

    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

?>
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
                <a href="#ss" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="ss">
                    <h6 class="m-0 font-weight-bold text-primary">Suggestion System</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="ss">
                    <div class="card-body">
                        <?php
                        if ($suggestionsystem == false) {
                            echo "-- Data Kosong --";
                        } else { ?>
                            <?php foreach ($suggestionsystem as $ss) { ?>
                                <table border="0">
                                    <tr>
                                        <td>Judul</td>
                                        <td>:</td>
                                        <td> <?= $ss->judul_ss ?></td>
                                    </tr>
                                    <tr>
                                        <td>Implementasi</td>
                                        <td>: </td>
                                        <td> <?= tanggal_indonesia($ss->t_implementasi_ss) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tim</td>
                                        <td>:</td>
                                        <td> <?= $ss->nama_sec ?></td>
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
                <a href="#ci" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="ci">
                    <h6 class="m-0 font-weight-bold text-primary">Continues Improvement</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="ci">
                    <div class="card-body">
                        <?php
                        if ($continuesimprovement == false) {
                            echo "-- Data Kosong --";
                        } else { ?>
                            <?php foreach ($continuesimprovement as $ci) { ?>
                                <table border="0">
                                    <tr>
                                        <td>Judul</td>
                                        <td>:</td>
                                        <td> <?= $ci->judul ?></td>
                                    </tr>
                                    <tr>
                                        <td>Implementasi</td>
                                        <td>: </td>
                                        <td> <?= tanggal_indonesia($ci->t_implementasi) ?></td>
                                    </tr>
                                    <tr>
                                        <td align="">Tim Terlibat</td>
                                        <td>:</td>
                                        <td align="top">
                                            <?php
                                            $model = $this->load->model('ci_m');
                                            $citt = $this->ci_m->get_tim_ci($ci->tim);
                                            foreach ($citt as $ok) {
                                                echo $ok->nama_tim;
                                                echo "
                                    <hr>";
                                            }
                                            ?>
                                        </td>
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
        <div class="col-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#training" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="training">
                    <h6 class="m-0 font-weight-bold text-primary">Training</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="training">
                    <div class="card-body">
                        <?php
                        if ($suggestionsystem == false) {
                            echo "-- Data Kosong --";
                        } else { ?>
                            <?php foreach ($suggestionsystem as $ss) { ?>
                                <table border="0">
                                    <tr>
                                        <td>Judul</td>
                                        <td>:</td>
                                        <td> <?= $ss->judul_ss ?></td>
                                    </tr>
                                    <tr>
                                        <td>Implementasi</td>
                                        <td>: </td>
                                        <td> <?= tanggal_indonesia($ss->t_implementasi_ss) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tim</td>
                                        <td>:</td>
                                        <td> <?= $ss->nama_sec ?></td>
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
                <a href="#assesment" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="assesment">
                    <h6 class="m-0 font-weight-bold text-primary">Assessment</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="assesment">
                    <div class="card-body">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Plan</th>
                            <th>Level Kompetensi</th>
                            <th>Nilai Level</th>
                            <th>Nilai Karyawan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($assessment as $x) { ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $x->nama_plan; ?></td>
                                <td><?= $x->target_p; ?></td>
                                <td align="center"><?= $x->nilai_lp; ?></td>
                               
                                <?php  
                                $model = $this->load->model('Assessment_m');
                                $x_assessment = $this->assessment_m->get_assessment($nik);
                                 ?>  
                                <td> 
                                    <?php
                                        foreach ($x_assessment as $ok) {
                                            echo $ok->nik;
                                            echo "
                                    <hr>";
                                        }
                                        ?>
                                </td>
                            </tr>
                        <?php   } ?>
                    </tbody>
                </table>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>