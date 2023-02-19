<!-- Begin Page Content -->
<div class="container col-8 mb-3">
    <!-- Page Heading -->
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('admin/ubah_asesor') ?>"><i class="fas fa-arrow-circle-left"> Kembali</i></a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="container-fluid">
                    <?= validation_errors() ?>
                    <form action="<?= base_url('admin/proses_ubah_asesor')  ?>" method="POST" enctype="multipart/form-data">
                        <table class="table">
                            <tr>
                                <td>Pilih Asesor</td>
                                <td><select name="nik" class="form-control  selectpicker" data-live-search="true">
                                        <option value="">--PILIH karyawan--</option>
                                        <?php foreach ($kar as $karyawan) { ?>
                                            <option value="<?= $karyawan->nik ?>"><?= $karyawan->nama ?> | <?= $karyawan->nik ?></option>
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