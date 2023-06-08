<div class="container">
    <div class="main-body">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('admin/data_karyawan/')?>">Data Karyawan</a></li>
                <li class="breadcrumb-item active" aria-current="">Add karyawan</li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('admin/proses_tambah_karyawan')  ?>" method="POST"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <label>NIK</label>
                               <input type="text" name="nik" class="form-control" required
                                        placeholder="NIK Lengkap">
                            </div>

                            <div class="form-group">
                                <label>Nama Lengkap</label>
                               <input type="text" name="nama_lengkap" class="form-control" required
                                        placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                               <select class="form-control" name="jk">
                                        <option value="-">--PILIH JENIS KELAMIN--</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label>Tempat/Tanggal/Lahir</label>
                               <input type="text" name="tempat" class="form-control" required placeholder="Tempat">
                                    <input type="date" name="ttl" class="form-control">
                                
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                               <textarea name="alamat" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Agama</label>
                                <select class="form-control" name="agama">
                                        <option value="">--AGAMA--</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                               <input type="email" name="email" class="form-control" required placeholder="Email">
                                
                            </div>
                            <div class="form-group">
                                <label>Telpon</label>
                               <input type="text" name="telpon" class="form-control" required placeholder="Telpon">
                                
                            </div>

                            <div class="form-group">
                                <label>Departement</label>
                               <select name="departement" class="form-control selectpicker"
                                        data-live-search="true">
                                        <option value="">--PILIH Departement--</option>
                                        <?php foreach ($dep as $departement) { ?>
                                        <option value="<?= $departement->id_dep ?>"><?= $departement->nama_dep ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                
                            </div>
                            <div class="form-group">
                                <label>Section</label>
                               <select name="section" class="form-control  selectpicker" data-live-search="true">
                                        <option value="">--PILIH SECTION--</option>
                                        <?php foreach ($sec as $section) { ?>
                                        <option value="<?= $section->id_sec ?>"><?= $section->nama_sec ?></option>
                                        <?php } ?>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                               <select name="jabatan" class="form-control  selectpicker" data-live-search="true">
                                        <option value="">--PILIH JABATAN--</option>
                                        <?php foreach ($jab as $jabatan) { ?>
                                        <option value="<?= $jabatan->id_jab ?>"><?= $jabatan->nama_jab ?></option>
                                        <?php } ?>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label>Foto</label>
<input type="file" name="foto" class="form-control" id="customFile" />
                            </div>
                            <div class="form-group">
                                    <button class="btn btn-primary">Simpan</button>
                            </div>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>