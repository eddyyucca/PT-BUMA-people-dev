<div class="container-fluid">
    <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('admin/training_int/') ?>">Training Internal</a></li>
              <li class="breadcrumb-item active" aria-current="">Create Training Internal</li>
            </ol>
          </nav>
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold ">Create Training</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="container-fluid">
                    <?= validation_errors() ?>
                    <form action="<?= base_url('admin/proses_tambah_training_int')  ?>" method="POST"
                        enctype="multipart/form-data">
                        <table class="table">
                            <div class="form-group">
                                <label>Yang Melakukan Training</label>
                                <select name="karyawan" class="form-control  selectpicker" data-live-search="true">
                                    <option value="">--PILIH KARYAWAN--</option>
                                    <?php foreach ($kar as $karyawan) { ?>
                                    <option value="<?= $karyawan->nik ?>"><?= $karyawan->nama ?> | <?= $karyawan->nik ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Training</label>
                                <select name="training" class="form-control  selectpicker" data-live-search="true">
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
                                    <input type="date" aria-label="First name" class="form-control"
                                        name="mulai_t">
                                    <input type="date" aria-label="Last name" class="form-control"
                                        name="akhir_t">
                                </div>
                            </div>
                             <div class="form-group">
                                <label>Yang Memberi Training</label>
                                <select name="p_materi" class="form-control  selectpicker" data-live-search="true">
                                    <option value="">--PILIH KARYAWAN--</option>
                                    <?php foreach ($kar as $karyawan) { ?>
                                    <option value="<?= $karyawan->nik ?>"><?= $karyawan->nama ?> | <?= $karyawan->nik ?>
                                    </option>
                                    <?php } ?>
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
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</body>