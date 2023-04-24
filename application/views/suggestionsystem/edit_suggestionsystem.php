<div class="container-fluid">
    <!-- Page Heading -->
    <nav aria-label="breadcrumb" class="main-breadcrumb">
     <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin/suggestionsystem') ?>">Suggestion System</a></li>
            <li class="breadcrumb-item active" aria-current="">Update Suggestion System</a></li>
            <!-- <li class="breadcrumb-item active" aria-current="">Create Training</li> -->
        </ol>
    </nav>
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold ">Edit Suggestion System</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="container-fluid">
                    <?= validation_errors() ?>
                    <form action="<?= base_url('admin/proses_edit_suggestionsystem/') . $data->id_ss  ?>" method="POST"
                        enctype="multipart/form-data">
                        <table class="table">
                            <tr>
                                <td width=20%>Judul</td>
                                <td><input type="text" name="judul_ss" class="form-control"
                                        value="<?= $data->judul_ss ?>" required placeholder=" Judul"></td>
                            </tr>
                            <tr>
                                <td width=20%>Tanggal Implementasi</td>
                                <td><input type="date" name="t_implementasi_ss" class="form-control"
                                        value="<?= $data->t_implementasi_ss ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Tim Section</td>
                                <td><select name="section_ss" class="form-control  selectpicker"
                                        data-live-search="true">
                                        <option value="">--PILIH SECTION--</option>
                                        <?php foreach ($section as $sec) { ?>
                                        <option value="<?= $sec->id_sec ?>"
                                            <?= $sec->id_sec == $data->section_ss ? 'selected=selected' : ''; ?>>
                                            <?= $sec->nama_sec ?></option>
                                        <?php } ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>Yang Melakukan</td>
                                <td><select name="pembuat_ss" class="form-control  selectpicker"
                                        data-live-search="true">
                                        <option value="">--PILIH karyawan--</option>
                                        <?php foreach ($kar as $karyawan) { ?>
                                        <option value="<?= $karyawan->nik ?>"
                                            <?= $karyawan->nik == $data->pembuat_ss ? 'selected=selected' : ''; ?>>
                                            <?= $karyawan->nama ?> | <?= $karyawan->nik ?></option>
                                        <?php } ?>
                                    </select></td>
                            </tr>
                            <tr>
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