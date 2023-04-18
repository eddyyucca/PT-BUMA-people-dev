<body class="bg-gradient-success">
    <div class="mbr-slider slide carousel" data-keyboard="false" data-ride="carousel" data-interval="2000" data-pause="true">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card o-hidden border-0 shadow-lg my-5 ">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg">
                                    <div class="p-5">
                                        <!-- Page Heading -->
                                        <div class="card">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold ">Add Continues Improvement</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="container-fluid">
                                                        <?= validation_errors() ?>
                                                        <form action="<?= base_url('admin/proses_edit_ci/') . $data->tim ?>" method="POST" enctype="multipart/form-data">
                                                            <table class="table">
                                                                <tr>
                                                                    <td width=20%>Judul</td>
                                                                    <td><input type="text" name="judul" value="<?= $data->judul ?>" class="form-control" required placeholder="Judul">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Yang Melakukan</td>
                                                                    <td><select name="pembuat" class="form-control  selectpicker" data-live-search="true">
                                                                            <option value="">--PILIH karyawan--</option>
                                                                            <?php foreach ($kar as $karyawan) { ?>
                                                                                <option value="<?= $karyawan->nik ?>" <?= $karyawan->nik == $data->pembuat ? 'selected=selected' : ''; ?>><?= $karyawan->nama ?> | <?= $karyawan->nik ?></option>
                                                                            <?php } ?>
                                                                        </select></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Tim Terlibat</td>
                                                                    <td>
                                                                        <select data-placeholder="Begin typing a name to filter..." multiple class="form-control selectpicker" data-live-search="true" name="kar[]" multiple="multiple"> <?php foreach ($kar as $karyawan) { ?>
                                                                                <option value="<?= $karyawan->nama ?>"><?= $karyawan->nama ?> | <?= $karyawan->nik ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width=20%>Tanggal Implementasi</td>
                                                                    <td><input type="date" value="<?= $data->t_implementasi ?>" name="t_implementasi" class="form-control" required>
                                                                    </td>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>