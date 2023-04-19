<!-- Begin Page Content -->
<div class="container">
    <!-- Page Heading -->
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('admin/data_asesor') ?>"><i class="fas fa-arrow-circle-left"> Kembali</i></a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="container-fluid">
                    <?= validation_errors() ?>
                    <form action="<?= base_url('admin/proses_ubah_asesor')  ?>" method="POST" enctype="multipart/form-data">
                           <div class="form-group">
                             <label>   Pilih Asesor</label>
                               <select name="nik" class="form-control  selectpicker" data-live-search="true">
                                        <option value="">--PILIH karyawan--</option>
                                        <?php foreach ($kar as $karyawan) { ?>
                                            <option value="<?= $karyawan->nik ?>"><?= $karyawan->nama ?> | <?= $karyawan->nik ?></option>
                                        <?php } ?>
                                    </select>
                                        </div>
                           <div class="form-group">
                               
                                    <button class="btn btn-primary">Simpan</button>
                                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>