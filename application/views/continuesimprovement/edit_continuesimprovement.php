<div class="container-fluid">
    <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
            <li class="breadcrumb-item active"><a href="<?= base_url('admin/continuesimprovement') ?>">Continues
                    Inprovement</a></li>
            <li class="breadcrumb-item active" aria-current="">Update Continues Inprovement</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold ">Add Continues Improvement</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="container-fluid">
                    <?= validation_errors() ?>
                    <form action="<?= base_url('admin/proses_edit_ci/') . $data->tim ?>" method="POST"
                        enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="judul" value="<?= $data->judul ?>" class="form-control" required
                                placeholder="Judul">
                            <div class="form-group">
                                <label>Yang Melakukan</label>
                                <select name="pembuat" class="form-control  selectpicker" data-live-search="true">
                                    <option value="">--PILIH karyawan--</option>
                                    <?php foreach ($kar as $karyawan) { ?>
                                    <option value="<?= $karyawan->nik ?>"
                                        <?= $karyawan->nik == $data->pembuat ? 'selected=selected' : ''; ?>>
                                        <?= $karyawan->nama ?> | <?= $karyawan->nik ?></option>
                                    <?php } ?>
                                </select>
                                <div class="form-group">
                                    <label>Tim Terlibat</label>
                                    <select data-placeholder="Begin typing a name to filter..." multiple
                                        class="form-control selectpicker" data-live-search="true" name="kar[]"
                                        multiple="multiple"> <?php foreach ($kar as $karyawan) { ?>
                                        <option value="<?= $karyawan->nama ?>"><?= $karyawan->nama ?> |
                                            <?= $karyawan->nik ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="form-group">
                                        <label>Tanggal Implementasi</label>
                                        <input type="date" value="<?= $data->t_implementasi ?>" name="t_implementasi"
                                            class="form-control" required>
                                        <div class="form-group">
                                            <td>
                                                <button class="btn btn-success">Simpan</button>
                                            </td>
                                            <td></td>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>