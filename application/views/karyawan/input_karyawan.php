<!-- Begin Page Content -->
<div class="container col-8">
    <!-- Page Heading -->
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('admin/pegawai') ?>"><i class="fas fa-arrow-circle-left"> Kembali</i></a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="container-fluid">
                    <?= validation_errors() ?>
                    <form action="<?= base_url('admin/tambah_pegawai_baru')  ?>" method="POST" enctype="multipart/form-data">
                        <table class="table">
                            <tr>
                                <td width=20%>NIK</td>
                                <td><input type="text" name="nik" class="form-control" required placeholder="NIK Lengkap"></td>
                            </tr>

                            <tr>
                                <td width=20%>Nama Lengkap</td>
                                <td><input type="text" name="nama_lengkap" class="form-control" required placeholder="Nama Lengkap"></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td><select class="form-control" name="jk">
                                        <option value="-">--PILIH JENIS KELAMIN--</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>Tempat/Tanggal/Lahir</td>
                                <td><input type="text" name="tempat" class="form-control" required placeholder="Tempat">
                                    <input type="date" name="ttl" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td><textarea name="Alamat" class="form-control"></textarea></td>
                            </tr>

                            <tr>
                                <td>Agama</td>
                                <td> <select class="form-control" name="agama">
                                        <option value="">--AGAMA--</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="email" name="email" class="form-control" required placeholder="Email"></td>
                            </tr>
                            <tr>
                                <td>Telpon</td>
                                <td><input type="text" name="no_telp" class="form-control" required placeholder="Telpon"></td>
                            </tr>
                            <tr>
                                <td>Mulai Bekerja</td>
                                <td><input type="date" name="mulai_bekerja" class="form-control" required placeholder="Mulai Bekerja"></td>
                            </tr>
                            <tr>
                                <td>Departement</td>
                                <td><select name="departement" class="form-control">
                                        <option value="">--PILIH BIDANG--</option>
                                        <?php foreach ($departement as $dep) { ?>
                                            <option value="<?= $dep->id_dep ?>"><?= $dep->nama_departement ?></option>
                                        <?php } ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>Section</td>
                                <td><select name="section" class="form-control">
                                        <option value="">--PILIH SECTION--</option>
                                        <?php foreach ($section as $section) { ?>
                                            <option value="<?= $section->id_sec ?>"><?= $section->nama_sec ?></option>
                                        <?php } ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>Jabatan</td>
                                <td><select name="jabatan" class="form-control">
                                        <option value="">--PILIH JABATAN--</option>
                                        <?php foreach ($jabatan as $jabatan) { ?>
                                            <option value="<?= $jabatan->id_jab ?>"><?= $jabatan->nama_jab ?></option>
                                        <?php } ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>Foto</td>
                                <td>
                                    <input type="file" name="foto" class="file" accept="image/*">
                                    <div class="input-group my-3">
                                        <input type="text" class="form-control" disabled placeholder="Upload File" id="foto">
                                        <div class="input-group-append">
                                            <button type="button" class="browse btn btn-primary">Browse...</button>
                                        </div>
                                    </div>
                                    <div class="ml-2 col-sm-6">
                                        <img src="<?= base_url("assets/images/default.png") ?>" width="100" height="100" id="preview" class="img-thumbnail">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button class="btn btn-primary">Simpan</button>
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