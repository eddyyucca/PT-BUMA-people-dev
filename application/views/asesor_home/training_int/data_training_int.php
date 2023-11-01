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
    <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('asesor') ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="">Traning</li>
        </ol>
    </nav>
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold ">Data Training<Section></Section>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="container">
                    <div class="form-group">
                        <!-- filter training -->
                        <div class="card shadow mb-4">
                            <a href="#f_t" class="d-block card-header py-3" data-toggle="collapse"
                                role="button" aria-expanded="true" aria-controls="f_t">
                                <h6 class="m-0 font-weight-bold text-primary">Filter Training</h6>
                            </a>
                            <div class="collapse" id="f_t">
                                <div class="card-body">
                                    <div class="form-group">
                                        <form action="<?= base_url('asesor/f_training')  ?>" method="POST"
                        enctype="multipart/form-data">
                                        <label>Nama Training</label>
                                        <select name="id_training" class="form-control  selectpicker"
                                            data-live-search="true" required>
                                            <option value="">--PILIH TRAINING--</option>
                                            <?php foreach ($training as $tra) { ?>
                                            <option value="<?= $tra->id_topt ?>"><?= $tra->nama_training_opt ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <button class="btn btn-success">Search</button>
                                </div>
                                            </form>
                            </div>
                        </div>

                         <!-- filter training -->
                        <div class="card shadow mb-4">
                            <a href="#f_bt" class="d-block card-header py-3" data-toggle="collapse"
                                role="button" aria-expanded="true" aria-controls="f_bt">
                                <h6 class="m-0 font-weight-bold text-primary">Filter Bulan & Tahun</h6>
                            </a>
                            <div class="collapse" id="f_bt">
                                <div class="card-body">
                                    <div class="form-group">
                                         <form action="<?= base_url('asesor/f_bulan_tahun')  ?>" method="POST"
                        enctype="multipart/form-data">
                                        <label>Pilih Bulan & Tahun</label>
                                        <div class="input-group">
                                            <select name="bulan" class="form-control  selectpicker"
                                                    data-live-search="true" required>
                                                    <option value="">--PILIH BULAN--</option>
                                                    <option value="1">Januari</option>
                                                    <option value="2">Februari</option>
                                                    <option value="3">Maret</option>
                                                    <option value="4">April</option>
                                                    <option value="5">Mei</option>
                                                    <option value="6">Juni</option>
                                                    <option value="7">Juli</option>
                                                    <option value="8">Agustus</option>
                                                    <option value="9">September</option>
                                                    <option value="10">Oktober</option>
                                                    <option value="11">November</option>
                                                    <option value="12">Desember</option>
                                            </select>
                                        <input type="number" placeholder="tahun" class="form-control"
                                        name="tahun" required>
                                </div>
                            </div>
                            <button class="btn btn-success">Search</button>
                        </div>
                    </form>
                            </div>
                        </div>

                            <!-- filter training -->
                        <div class="card shadow mb-4">
                            <a href="#f_pm" class="d-block card-header py-3" data-toggle="collapse"
                                role="button" aria-expanded="true" aria-controls="f_pm">
                                <h6 class="m-0 font-weight-bold text-primary">Filter Trainer</h6>
                            </a>
                            <div class="collapse" id="f_pm">
                                <div class="card-body">
                                     <form action="<?= base_url('asesor/f_trainer')  ?>" method="POST"
                        enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Nama Training</label>
                                        <div class="input-group">
                                            <select name="nik" class="form-control  selectpicker" data-live-search="true" required>
                                    <option value="">--PILIH KARYAWAN--</option>
                                    <?php foreach ($kar as $karyawan) { ?>
                                    <option value="<?= $karyawan->nik ?>"><?= $karyawan->nama ?> | <?= $karyawan->nik ?>
                                    </option>
                                    <?php } ?>
                                </select>
                                </div>
                                    </div>
                                    <button class="btn btn-success">Search</button>
                                </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                    <a href="<?= base_url('asesor/create_training_int') ?>" class="btn btn-success"><i
                            class="fas fa-plus-circle"></i> Tambah Training</a>
                    <a href="<?= base_url('asesor/export_excel_training_internal') ?>" class="btn btn-success"><i
                            class="fas fa-plus-circle"></i> Export All Data Excel</a>
                    <hr>
                </div>
                <?php

                if ($this->session->flashdata('pesan') == "hapus") { ?>
                <div class="alert alert-danger" role="alert">Data Berhasil Di Hapus !
                </div>
                <?php   } elseif ($this->session->flashdata('pesan') == "buat") { ?>
                <div class="alert alert-success" role="alert">
                    Data Berhasil Di Tambah !
                </div>
                <?php    } elseif ($this->session->flashdata('pesan') == "ubah") { ?>
                <div class="alert alert-warning" role="alert">
                    Data Berhasil Di Ubah !
                </div>
                <?php    } ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peserta</th>
                            <th>Training</th>
                            <th>Teori & Praktik</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Trainer</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($data as $x) { ?>
                        <tr>
                            <td><?= $nomor++; ?></td>
                            <td><?= $x->nama; ?>
                            </td>
                            <td>
                                <?= $x->nama_training_opt; ?>
                            </td>
                           
                            <td align="center"><?= $x->n_teori . "/". $x->n_praktik ?></td>
                            <td align="center">
                                <?= $x->status_training; ?>
                            </td>
                            <td><?= tanggal_indonesia($x->mulai_t) . " - " . tanggal_indonesia($x->akhir_t) ?></td>
                        </td>
                                 <?php
                                     $model = $this->load->model('karyawan_m');
                                     $pm = $this->karyawan_m->get_row_nik($x->p_materi);
                                     ?>
                                 <td>
                                     <?php echo $pm->nama; ?>
                                 </td>
                            <td align="center">
                                <a href="<?= base_url('asesor/delete_training_int/') . $x->id_training_int; ?>"
                                    class="btn btn-danger"> <i class="fas fa-trash"></i></a>
                                <a href="<?= base_url('asesor/edit_training_int/') . $x->id_training_int; ?>"
                                    class="btn btn-primary"> <i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                        <?php   } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php if ($this->session->flashdata('flash_message')) : ?>
<script>
    swal({
        title: "Done",
        text: "<?php echo $this->session->flashdata('flash_message'); ?>",
        timer: 1500,
        showConfirmButton: false,
        type: 'success'
    });
</script>
<?php endif; ?>