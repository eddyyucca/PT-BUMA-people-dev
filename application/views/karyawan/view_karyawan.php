<div class="container">
    <div class="main-body">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('admin/data_karyawan/') ?>">User</a></li>
                <li class="breadcrumb-item active" aria-current="">User Profile</li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <?php if ($data->foto == false) { ?>
                                                    <img src="<?= base_url('assets') ?>/profil_default.png" class="rounded" width="150" height="150" alt="Foto Profil">
                                                <?php  } elseif ($data->foto == true) { ?>

                                                    <img src="<?= base_url('assets/foto_profil/') . $data->foto ?>" class="rounded" width="150" height="150" alt="Foto Profil">
                                                <?php  } ?>
                            <div class="mt-3">
                                <h4><?= $data->nama ?></h4>
                                <p class="text-secondary mb-1"> <?= $data->nama_jab ?></p>
                                <!-- <p class="text-muted font-size-sm"> <?= $data->nama_dep ?> - <?= $data->nama_sec ?></p> -->

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <!-- <div class="col-sm-6 mb-3"> -->
                    <div class="card h-100">
                        <div class="card-body">
                            <h6 class="d-flex align-items-center mb-3"><i
                                    class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                            <small>Training</small>
                            <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 80%"
                                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small>Suggestion System</small>
                            <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 72%"
                                    aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small>Continues Improvement</small>
                            <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 89%"
                                    aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small>Kompetensi</small>
                            <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 55%"
                                    aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small>Assessment</small>
                            <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 66%"
                                    aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small>Kompetensi Grade</small>
                            <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 66%"
                                    aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <a class="btn btn-success"
                                    href="<?= base_url('admin/edit_karyawan/') . $data->nik ?>">Edit Akun</a>
                                     | <a class="btn btn-success"
                                    href="<?= base_url('admin/ubah_level/') . $data->nik ?>">Level Akun</a>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= $data->nama ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Nik</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= $data->nik ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Departemen</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= $data->nama_dep ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Section</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= $data->nama_sec ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Jabatan</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= $data->nama_jab ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Tempat/Tanggal Lahir</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= $data->tempat ?> - <?= $data->tanggal_lahir ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Jenis Kelamin</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= $data->jk ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Agama</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= $data->agama ?> 
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= $data->email ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= $data->telpon ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Alamat</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= $data->alamat ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Training -->
        <div class="row gutters-sm">
            <div class="col-md-12 mb-3">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold ">Data Training<Section></Section>
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Karyawan</th>
                                        <th>Training</th>
                                        <th>Tanggal</th>
                                        <th>Penyelenggara</th>
                                    </tr>
                                </thead>
                                <tbody>
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
    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
                        $nomor = 1;
                        foreach ($data_training as $x) { ?>
                                    <tr>
                                        <td><?= $nomor++; ?></td>
                                        <td><?= $x->nama; ?>
                                            <br>
                                            <footer class="blockquote-footer">Section - <?= $x->nama_sec ?></footer>
                                            <footer class="blockquote-footer">Jabatan - <?= $x->nama_jab ?></footer>
                                        </td>
                                        <td>
                                            <?= $x->training; ?>
                                            <br>
                                            <footer class="blockquote-footer">
                                                <a href="<?= base_url('assets/sertifikat_training/') . $x->training_foto ?>"
                                                    target="_blank"><b>Open Sertitikat</b></a>
                                            </footer>
                                        </td>
                                        <td><?= tanggal_indonesia($x->mulai_training) . " - " . tanggal_indonesia($x->akhir_training) ?>
                                        </td>
                                        <td><?= $x->penyelenggara ?></td>
                                    </tr>
                                    <?php  } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ss -->
         <div class="row gutters-sm">
            <div class="col-md-12 mb-3">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold ">Suggestion System<Section></Section>
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Tanggal Implementasi</th>
                            <th>Tim Terlibat</th>
                            <th>Yang Melakukan</th>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($ss as $ssdata) { ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $ssdata->judul_ss; ?></td>
                                <td><?= $ssdata->t_implementasi_ss; ?></td>
                                <td><?= $ssdata->nama_sec; ?></td>
                                <td><?= $ssdata->nama; ?></td>                   
                            </tr>
                        <?php   } ?>
                    </tbody>
                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ci -->
         <div class="row gutters-sm">
            <div class="col-md-12 mb-3">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold ">Continues Improvement<Section></Section>
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>pembuat</th>
                            <th>Tanggal Implementasi</th>
                            <th>Tim Terlibat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($continuesimprovement as $x) { ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $x->judul; ?></td>
                                <td><?= $x->nama; ?></td>
                                <td><?= $x->t_implementasi; ?></td>
                                <?php
                                $model = $this->load->model('ci_m');
                                $citt = $this->ci_m->get_tim_ci($x->tim);
                                ?>
                                <td> <?php
                                        foreach ($citt as $ok) {
                                            echo $ok->nama_tim;
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
            </div>
        </div>
        <!-- ki -->
         <div class="row gutters-sm">
            <div class="col-md-12 mb-3">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold ">Assessment<Section></Section>
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Asesor</th>
                            <th>Karyawan</th>
                            <th>Jabatan</th>
                            <th>Section</th>
                            <th>Tanggal</th>
                            <th>View Kompetensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $nomor = 1;
                        foreach ($tk as $xtk) { 
                            if ($xtk->date_kom == true) { ?>
                                <tr>
                                <td><?= $nomor++; ?></td>
                                <td>
                                <?php  
                                $model = $this->load->model('karyawan_m');
                                $asesor = $this->karyawan_m->get_row_nik($xtk->asesor);
                                 ?>      
                                <?= $asesor->nama ?>
                                <footer class="blockquote-footer">NIK - <?= $xtk->nik ?></footer>
                            </td>
                                <td><?= $xtk->nama; ?>
                                <footer class="blockquote-footer">NIK - <?= $xtk->nik ?></footer>
                            </td>
                                <td><?= $xtk->nama_jab; ?></td>
                                <td><?= $xtk->nama_sec; ?></td>
                                <td><?= tanggal_indonesia($xtk->date_kom); ?></td>
                              <td align="center">
                                    <a href="<?= base_url('admin/view_taskkompetensi/') . $xtk->id_jab; ?>" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                         <?php   }else{

                            }
                             } ?>
                    </tbody>
                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ki -->
       
    </div>
</div>