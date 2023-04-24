<div class="container-fluid">
    <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('admin/training/') ?>">Training</a></li>
              <li class="breadcrumb-item active" aria-current="">Create Training</li>
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
                    <form action="<?= base_url('admin/proses_tambah_training')  ?>" method="POST"
                        enctype="multipart/form-data">
                        <table class="table">
                            <div class="form-group">
                                <label> Yang Melakukan</label>
                                <select name="karyawan" class="form-control  selectpicker" data-live-search="true">
                                    <option value="">--PILIH karyawan--</option>
                                    <?php foreach ($kar as $karyawan) { ?>
                                    <option value="<?= $karyawan->nik ?>"><?= $karyawan->nama ?> | <?= $karyawan->nik ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Training</label>
                                <input type="text" name="training" class="form-control" required
                                    placeholder="Nama Training">
                            </div>
                            <div class="form-group">
                                <label>Penyelenggara</label>
                                <input type="text" name="penyelenggara" class="form-control" required
                                    placeholder="Nama Penyelenggara">
                            </div>
                            <div class="form-group">
                                <label> Tanggal Traininig</label>

                                <div class="input-group">
                                    <input type="date" aria-label="First name" class="form-control"
                                        name="mulai_training">
                                    <input type="date" aria-label="Last name" class="form-control"
                                        name="akhir_training">
                                </div>
                            </div>
                            <div class="form-group">
                                <label> Diskripsi Training</label>

                                <div class="input-group">
                                    <textarea name="d_training" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label> Tanggal Traininig</label>

                                <div class="input-group">
                                    <input type="date" class="form-control" name="awal_st">
                                    <input type="date" class="form-control" name="akhir_st">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Kredensial
                                    <input type="text" name="kredensial" class="form-control" required
                                        placeholder="Kredensial">

                                    <label> Upload Foto Sertifikat</label>


                                    <div class="mb-3">
                                        <input name="sertifikat_training" class="form-control" type="file" id="formFile"
                                            accept="image/*">
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