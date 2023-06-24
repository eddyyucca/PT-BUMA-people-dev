<div class="container-fluid">
    <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
            <li class="breadcrumb-item active"><a href="<?= base_url('admin/level_user') ?>">Data Level</a></li>
            <li class="breadcrumb-item active" aria-current="">Ubah Hak Akses Akun</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold ">Ubah Level</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="container-fluid">
                                                        <?= validation_errors() ?>
                                                        <form action="<?= base_url('admin/proses_ubah_level/'. $data->nik)  ?>" method="POST" enctype="multipart/form-data">
                                                            <table class="table">
                                                                <tr>
                                                                    <label>Level Hak Akses</label>
                                                                 <div class="form-group">
                                <select class="form-control" name="level">
                                        <option value="">--Level--</option>
                                        <option value="user"  <?= $data->level == "user" ? 'selected=selected' : ''; ?>>User</option>
                                        <option value="asesor" <?= $data->level == "asesor" ? 'selected=selected' : ''; ?>>Asesor</option>
                                        <option value="admin" <?= $data->level == "admin" ? 'selected=selected' : ''; ?>>Admin</option>
                                    </select>
                            </div>    
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