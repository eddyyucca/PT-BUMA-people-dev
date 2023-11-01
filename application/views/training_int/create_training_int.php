<div class="container-fluid">
    <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin/training_int/') ?>">Training Internal</a></li>
            <li class="breadcrumb-item active" aria-current="">Create Training Internal</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold ">Create Training Internal</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="container-fluid">
                    <?= validation_errors() ?>
                    <form action="<?= base_url('admin/proses_tambah_training_int')  ?>" method="POST"
                        enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Peserta</label>
                            <select name="karyawan" class="form-control  selectpicker" data-live-search="true" required>
                                <option value="">--PILIH KARYAWAN--</option>
                                <?php foreach ($kar as $karyawan) { ?>
                                <option value="<?= $karyawan->nik ?>"><?= $karyawan->nama ?> | <?= $karyawan->nik ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Training</label>
                            <select name="training" class="form-control  selectpicker" data-live-search="true" required>
                                <option value="">--PILIH TRAINING--</option>
                                <?php foreach ($training as $tra) { ?>
                                <option value="<?= $tra->id_topt ?>"><?= $tra->nama_training_opt ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label> Tanggal Traininig</label>

                            <div class="input-group">
                                <input type="date" aria-label="First name" class="form-control" name="mulai_t" required>
                                <input type="date" aria-label="Last name" class="form-control" name="akhir_t" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Trainer</label>
                            <select name="p_materi" class="form-control  selectpicker" data-live-search="true" required>
                                <option value="">--PILIH KARYAWAN--</option>
                                <?php foreach ($kar as $karyawan) { ?>
                                <option value="<?= $karyawan->nik ?>"><?= $karyawan->nama ?> | <?= $karyawan->nik ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Nilai Teori</label>
                            <input type="number" name="n_teori" class="form-control" required placeholder="Nilai Teori"
                                min="1" max="100">
                        </div>
                        <div class="form-group">
                            <label>Nilai Praktik</label>
                            <input type="number" name="n_praktik" class="form-control" required
                                placeholder="Nilai Praktik" min="1" max="100">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status_training" class="form-control" data-live-search="true" required>
                                <option value="">--PILIH STATUS--</option>
                                <option value="Lulus">Lulus</option>
                                <option value="Tidak Lulus">Tidak Lulus</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label> Diskripsi Training</label>
                            <div class="input-group">
                                <textarea name="diskripsi" class="form-control"></textarea>
                            </div>
                        </div>
                        <button class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>