<div class="content-body">
    <div class="container-fluid">
                    <?= validation_errors() ?>
                    <form action="<?= base_url('admin/proses_edit_karyawan')  ?>" method="POST" enctype="multipart/form-data">
                        <table class="table">
                            <tr>
                                <td width=20%>NIK</td>
                                <td><input type="text" name="nik" class="form-control" required placeholder="NIK Lengkap" disabled></td>
                            </tr>

                            <tr>
                                <td width=20%>Nama Lengkap</td>
                                <td><input type="text" name="nama_lengkap" class="form-control" required placeholder="Nama Lengkap" disabled></td>
                            </tr>

                            <tr>
                                <td>Section</td>
                                <td><select name="section" class="form-control  selectpicker" data-live-search="true" disabled>
                                        <option value="">--PILIH SECTION--</option>
                                        <?php foreach ($sec as $section) { ?>
                                            <option value="<?= $section->id_sec ?>"><?= $section->nama_sec ?></option>
                                        <?php } ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>Jabatan</td>
                                <td><select name="jabatan" class="form-control  selectpicker" data-live-search="true" disabled>
                                        <option value="">--PILIH JABATAN--</option>
                                        <?php foreach ($jab as $jabatan) { ?>
                                            <option value="<?= $jabatan->id_jab ?>"><?= $jabatan->nama_jab ?></option>
                                        <?php } ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>
                                    <button class="btn btn-primary">Simpan</button>
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