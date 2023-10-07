<div class="container-fluid">
    <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('asesor') ?>">Home</a></li>
            <li class="breadcrumb-item active"><a href="<?= base_url('asesor/trainingopt') ?>">Training Optional</a></li>
            <li class="breadcrumb-item active" aria-current="">Create Training Optional</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold ">Tambah Training Optional</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="container-fluid">
                                                        <?= validation_errors() ?>
                                                        <form action="<?= base_url('asesor/proses_tambah_training_opt')  ?>" method="POST" enctype="multipart/form-data">
                                                            <table class="table">
                                                                <tr>
                                                                    <td width=20%>Nama Training Internal</td>
                                                                    <td><input type="text" name="nama_training_opt" class="form-control" required placeholder="Nama Training"></td>
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