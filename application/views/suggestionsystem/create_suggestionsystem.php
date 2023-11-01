<div class="container-fluid">
    <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin/suggestionsystem') ?>">Suggestion System</a></li>
            <li class="breadcrumb-item active" aria-current="">Create System</a></li>
            <!-- <li class="breadcrumb-item active" aria-current="">Create Training</li> -->
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold ">Tambah Suggestion System</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="container-fluid">
                    <?= validation_errors() ?>
                    <form action="<?= base_url('admin/proses_tambah_suggestionsystem')  ?>" method="POST"
                        enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="judul_ss" class="form-control" required placeholder="Judul">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Implementasi</label>
                            <input type="date" name="t_implementasi_ss" class="form-control" required>

                        </div>
                        <div class="form-group">
                            <label> Tim Section</label>
                            <select name="section_ss" class="form-control  selectpicker" data-live-search="true">
                                <option value="">--PILIH SECTION--</option>
                                <?php foreach ($section as $sec) { ?>
                                <option value="<?= $sec->id_sec ?>"><?= $sec->nama_sec ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label> Yang Melakukan</label>
                            <select name="pembuat_ss" class="form-control  selectpicker" data-live-search="true">
                                <option value="">--PILIH karyawan--</option>
                                <?php foreach ($kar as $karyawan) { ?>
                                <option value="<?= $karyawan->nik ?>"><?= $karyawan->nama ?> |
                                    <?= $karyawan->nik ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">

                            <button class="btn btn-success">Simpan</button>

                        </div>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>