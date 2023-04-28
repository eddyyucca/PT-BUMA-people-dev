<div class="container-fluid">
    <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
            <li class="breadcrumb-item active"><a href="<?= base_url('admin/jabatan') ?>">Jabatan</a></li>
            <li class="breadcrumb-item active" aria-current="">Create Jabatan</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold ">Tambah Jabatan</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="container-fluid">
                                                        <?= validation_errors() ?>
                                                        <form action="<?= base_url('admin/proses_tambah_jab')  ?>" method="POST" enctype="multipart/form-data">
                                                            <table class="table">
                                                                <tr>
                                                                    <td width=20%>Nama Jabatan</td>
                                                                    <td><input type="text" name="nama_jab" aria-describedby="basic-addon1" class="form-control" required placeholder="Nama Jabatan"></td>
                                                                </tr>
                                                         
                                                                <tr>
                                                                    <td width=20%>Level</td>
                                                                    <td><input type="number" name="level" aria-describedby="basic-addon1" class="form-control" required placeholder="Level"></td>
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