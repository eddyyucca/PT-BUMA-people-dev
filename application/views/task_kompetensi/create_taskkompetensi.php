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
                                                <h6 class="m-0 font-weight-bold ">Tambah Kompetensi</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="container-fluid">
                                                        <?= validation_errors() ?>
                                                        <form action="<?= base_url('admin/proses_tambah_task_kompetensi')  ?>" method="POST" enctype="multipart/form-data">
                                                            <table class="table">
                                                                <tr>
                                                                    <td>Jabatan</td>
                                                                    <td><select name="jabatan" class="form-control  selectpicker" data-live-search="true">
                                                                            <option value="">--PILIH Jabatan--</option>
                                                                            <?php foreach ($jabatan as $jab) { ?>
                                                                                <option value="<?= $jab->id_jab ?>"><?= $jab->nama_jab ?></option>
                                                                            <?php } ?>
                                                                        </select></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Kompetensi</td>
                                                                    <td><select name="kompetensi" class="form-control  selectpicker" data-live-search="true">
                                                                            <option value="">--PILIH Kompetensi--</option>
                                                                            <?php foreach ($kompetensi as $kom) { ?>
                                                                                <option value="<?= $kom->id_kom ?>"><?= $kom->j_kompetensi ?></option>
                                                                            <?php } ?>
                                                                        </select></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width=20%>Task Kompetensi</td>
                                                                    <td><input type="text" name="t_kompetensi" class="form-control" required placeholder="Task Kompetensi"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width=20%>Level</td>
                                                                    <td><input type="text" name="level" class="form-control" required placeholder="Level Kompetensi"></td>
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