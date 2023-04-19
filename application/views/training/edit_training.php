<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold ">Edit Training</h6>
        </div>
        <div class="card-body">
             <div class="container">
            <?= validation_errors() ?>
            <form action="<?= base_url('admin/proses_edit_training/') . $data->id_training  ?>" method="POST"
                enctype="multipart/form-data">
                <table class="table">
                    <div class="form-group">
                        <label> Yang Melakukan</label>
                        <select name="karyawan" class="form-control  selectpicker" data-live-search="true">
                            <option value="">--PILIH karyawan--</option>
                            <?php foreach ($kar as $karyawan) { ?>
                            <option value="<?= $karyawan->nik ?>"
                                <?= $karyawan->nik == $data->karyawan ? 'selected=selected' : ''; ?>>
                                <?= $karyawan->nama ?> | <?= $karyawan->nik ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Training</label>
                        <input type="text" name="training" class="form-control" required placeholder="Nama Training"
                            value="<?= $data->training ?>">
                    </div>
                    <div class="form-group">
                        <label>Penyelenggara</label>
                        <input type="text" name="penyelenggara" class="form-control" required
                            value="<?= $data->penyelenggara ?>" placeholder="Nama Penyelenggara">
                    </div>
                    <div class="form-group">
                        <label> Tanggal Traininig </label>
                        <input type="date" aria-label="First name" class="form-control" name="mulai_training"
                            value="<?= $data->mulai_training ?>">
                        <input type="date" aria-label="Last name" class="form-control" name="akhir_training"
                            value="<?= $data->akhir_training ?>">
                    </div>
                    <div class="form-group">
                        <label> Diskripsi Training </label>
                        <textarea name="d_training" class="form-control"><?= $data->d_training ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Kredensial</label>
                        <input type="text" name="kredensial" class="form-control" required placeholder="Kredensial"
                            value="<?= $data->kredensial ?>">
                    </div>
                    <div class="form-group">
                        <label> Upload Foto Sertifikat</label>
                        <div class="mb-3">
                            <input name="sertifikat_training" class="form-control" type="file" id="formFile"
                                accept="image/*">
                        </div>
                        <button class="btn btn-success">Update</button>
                    </div>
            </form>
        </div>
    </div>
</div>
