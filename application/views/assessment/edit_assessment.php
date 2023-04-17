<div class="content-body">
    <div class="container-fluid">
                                <div class="col-lg">
                                    <div class="p-5">
                                        <!-- Page Heading -->
                                        <div class="card">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold ">Edit Assessment</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="container-fluid">
                                                        <?= validation_errors() ?>
                                                        <form action="<?= base_url('admin/proses_edit_assessment/') . $data->id_am  ?>" method="POST" enctype="multipart/form-data">
                                                            <table class="table">
                                                                <tr>
                                                                    <td>Karyawan</td>
                                                                    <td><select name="karyawan" class="form-control  selectpicker" data-live-search="true">
                                                                            <option value="">--PILIH karyawan--</option>
                                                                            <?php foreach ($kar as $karyawan) { ?>
                                                                                <option value="<?= $karyawan->nik ?>" <?= $karyawan->nik == $data->karyawan ? 'selected=selected' : ''; ?>><?= $karyawan->nama ?> | <?= $karyawan->nik ?></option>
                                                                            <?php } ?>
                                                                        </select></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Asesor</td>
                                                                    <td><select name="asesor" class="form-control  selectpicker" data-live-search="true">
                                                                            <option value="">--PILIH Asesor--</option>
                                                                            <?php foreach ($asesor as $ar) { ?>
                                                                                <option value="<?= $ar->nik ?>" <?= $ar->nik == $data->asesor ? 'selected=selected' : ''; ?>><?= $ar->nama ?> | <?= $ar->nik ?></option>
                                                                            <?php } ?>
                                                                        </select></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Kompetensi</td>
                                                                    <td><select name="kompetensi" class="form-control  selectpicker" data-live-search="true">
                                                                            <option value="">--PILIH KMPETENSI--</option>
                                                                            <?php foreach ($kom as $kome) { ?>
                                                                                <option value="<?= $kome->id_kom ?>" <?= $kome->id_kom == $data->kompetensi ? 'selected=selected' : ''; ?>><?= $kome->j_kompetensi ?></option>
                                                                            <?php } ?>
                                                                        </select></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Target Kompetensi</td>
                                                                    <td><select name="t_komp" class="form-control  selectpicker" data-live-search="true">
                                                                            <option value="">--PILIH TARGET KOMPETENSI--</option>
                                                                            <?php foreach ($t_kom as $kome) { ?>
                                                                                <option value="<?= $kome->id_kompetensi ?>" <?= $kome->id_kompetensi == $data->t_komp ? 'selected=selected' : ''; ?>><?= $kome->t_kompetensi ?></option>
                                                                            <?php } ?>
                                                                        </select></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        File Pendukung
                                                                    </td>
                                                                    <td>
                                                                        <div class="mb-3">
                                                                            <input name="sertifikat" class="form-control" type="file" id="formFile" accept="image/*">
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                <tr>
                                                                    <td>Keterangan</td>
                                                                    <td>
                                                                        <div class="form-floating">
                                                                            <textarea name="ket" class="form-control" id="floatingTextarea"><?= $data->ket ?></textarea>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <td>
                                                                    <button class="btn btn-success">Simpan</button>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>