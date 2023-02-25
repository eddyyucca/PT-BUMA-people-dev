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
                                                <h6 class="m-0 font-weight-bold ">Create Training</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="container-fluid">
                                                        <?= validation_errors() ?>
                                                        <form action="<?= base_url('admin/proses_tambah_training')  ?>" method="POST" enctype="multipart/form-data">
                                                            <table class="table">
                                                                <tr>
                                                                    <td>Yang Melakukan</td>
                                                                    <td><select name="karyawan" class="form-control  selectpicker" data-live-search="true">
                                                                            <option value="">--PILIH karyawan--</option>
                                                                            <?php foreach ($kar as $karyawan) { ?>
                                                                                <option value="<?= $karyawan->nik ?>" <?= $karyawan->nik == $data->karyawan ? 'selected=selected' : ''; ?>><?= $karyawan->nama ?> | <?= $karyawan->nik ?></option>
                                                                            <?php } ?>
                                                                        </select></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width=auto>Nama Training</td>
                                                                    <td><input type="text" name="training" class="form-control" required placeholder="Nama Training"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width=auto>Penyelenggara</td>
                                                                    <td><input type="text" name="penyelenggara" class="form-control" required placeholder="Nama Penyelenggara"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Tanggal Traininig</td>
                                                                    <td>
                                                                        <div class="input-group">
                                                                            <input type="date" aria-label="First name" class="form-control" name="mulai_training">
                                                                            <input type="date" aria-label="Last name" class="form-control" name="akhir_training">
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Diskripsi Training</td>
                                                                    <td>
                                                                        <div class="input-group">
                                                                            <textarea name="d_training" class="form-control"></textarea>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Tanggal Traininig</td>
                                                                    <td>
                                                                        <div class="input-group">
                                                                            <input type="date" class="form-control" name="awal_st">
                                                                            <input type="date" class="form-control" name="akhir_st">
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width=auto>Kredensial</td>
                                                                    <td><input type="text" name="kredensial" class="form-control" required placeholder="Kredensial"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        Upload Foto Sertifikat
                                                                    </td>
                                                                    <td>
                                                                        <div class="mb-3">
                                                                            <input name="sertifikat_training" class="form-control" type="file" id="formFile" accept="image/*">
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <button class="btn btn-success">Update</button>
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