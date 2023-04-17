<div class="content-body">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <?= validation_errors() ?>
                <form action="<?= base_url('admin/proses_tambah_karyawan')  ?>" method="POST"
                    enctype="multipart/form-data">
                    <table class="table">
                        <div class="mb-3 col-md-9">
                            <td width=20%>NIK</td>
                            <td><input type="text" name="nik" class="form-control" required placeholder="NIK Lengkap">
                            </td>
                        </div>
                        <div class="mb-3 col-md-9">
                            <td width=20%>Nama Lengkap</td>
                            <td><input type="text" name="nama_lengkap" class="form-control" required
                                    placeholder="Nama Lengkap"></td>
                        </div>
                        <div class="mb-3 col-md-9">
                            <td>Jenis Kelamin</td>
                            <td><select class="form-control" name="jk">
                                    <option value="-">--PILIH JENIS KELAMIN--</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select></td>
                        </div>
                        <div class="mb-3 col-md-9">
                            <td>Tempat/Tanggal/Lahir</td>
                            <td><input type="text" name="tempat" class="form-control" required placeholder="Tempat">
                                <input type="date" name="ttl" class="form-control">
                            </td>
                        </div>
                        <div class="mb-3 col-md-9">
                            <td>Alamat</td>
                            <td><textarea name="alamat" class="form-control"></textarea></td>
                        </div>

                        <div class="mb-3 col-md-9">
                            <td>Agama</td>
                            <td> <select class="form-control" name="agama">
                                    <option value="">--AGAMA--</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select></td>
                        </div>
                        <div class="mb-3 col-md-9">
                            <td>Email</td>
                            <td><input type="email" name="email" class="form-control" required placeholder="Email"></td>
                        </div>
                        <div class="mb-3 col-md-9">
                            <td>Telpon</td>
                            <td><input type="text" name="telpon" class="form-control" required placeholder="Telpon">
                            </td>
                        </div>

                        <div class="mb-3 col-md-9">
                            <td>Departement</td>
                            <td><select name="departement" class="form-control selectpicker" data-live-search="true">
                                    <option value="">--PILIH Departement--</option>
                                    <?php foreach ($dep as $departement) { ?>
                                    <option value="<?= $departement->id_dep ?>"><?= $departement->nama_dep ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </div>
                        <div class="mb-3 col-md-9">
                            <td>Section</td>
                            <td><select name="section" class="form-control  selectpicker" data-live-search="true">
                                    <option value="">--PILIH SECTION--</option>
                                    <?php foreach ($sec as $section) { ?>
                                    <option value="<?= $section->id_sec ?>"><?= $section->nama_sec ?></option>
                                    <?php } ?>
                                </select></td>
                        </div>
                        <div class="mb-3 col-md-9">
                            <td>Jabatan</td>
                            <td><select name="jabatan" class="form-control  selectpicker" data-live-search="true">
                                    <option value="">--PILIH JABATAN--</option>
                                    <?php foreach ($jab as $jabatan) { ?>
                                    <option value="<?= $jabatan->id_jab ?>"><?= $jabatan->nama_jab ?></option>
                                    <?php } ?>
                                </select></td>
                        </div>
                        <div class="mb-3 col-md-9">
                            <td>Foto</td>
                            <td>
                                <input type="file" name="foto" class="file" accept="image/*">
                                <div class="input-group my-3">
                                    <input type="text" class="form-control" disabled placeholder="Upload File"
                                        id="foto">
                                    <div class="input-group-append">
                                        <button type="button" class="browse btn btn-primary">Browse...</button>
                                    </div>
                                </div>
                                <div class="ml-2 col-sm-6">
                                    <img src="<?= base_url("assets/profil_default.png") ?>" width="100" height="100"
                                        id="preview" class="img-thumbnail">
                                </div>
                            </td>
                        </div>
                        <div class="mb-3 col-md-9">
                            <td>
                                <button class="btn btn-primary">Simpan</button>
                            </td>
                            <td></td>
                        </div>
                    </table>
            </div>
        </div>


        <div class="col-xl-6 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Horizontal Form</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form>
                            <div class="row">
                                <div class="mb-3 col-md-9">
                                    <label class="form-label">Nik</label>
                                    <input type="text" name="nik" class="form-control" required
                                        placeholder="NIK Lengkap">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label>City</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">State</label>
                                    <select class="form-control" name="jk">
                                        <option value="-">--PILIH JENIS KELAMIN--</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-2">
                                    <label class="form-label">Zip</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox">
                                    <label class="form-check-label">
                                        Check me out
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>