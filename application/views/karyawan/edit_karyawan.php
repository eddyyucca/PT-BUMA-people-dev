<div class="container">
		<div class="main-body">
              <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('admin/view_karyawan/') .$data->nik ?>">User</a></li>
              <li class="breadcrumb-item active" aria-current="">Update Profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
			<div class="row">
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">
								   <?php if ($data->foto == false) { ?>
                                                    <img src="<?= base_url('assets') ?>/profil_default.png" class="rounded" width="150" height="150" alt="Foto Profil">
                                                <?php  } elseif ($data->foto == true) { ?>

                                                    <img src="<?= base_url('assets/foto_profil/') . $data->foto ?>" class="rounded" width="150" height="150" alt="Foto Profil">
                                                <?php  } ?>
								<div class="mt-3">
								<h4><?= $data->nama ?></h4>
                                <p class="text-secondary mb-1"> <?= $data->nama_jab ?></p>
                                <p class="text-muted font-size-sm"> <?= $data->nama_dep ?> - <?= $data->nama_sec ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
                    <form action="<?= base_url('admin/proses_edit_karyawan/'). $data->nik  ?>" method="POST" enctype="multipart/form-data">
					<div class="card">
						<div class="card-body">
							 <div class="form-group">
                                <label>NIK</label>
                               <input type="text" name="nik" class="form-control" 
                                        placeholder="NIK Lengkap" value="<?= $data->nik ?>">
                            </div>

                            <div class="form-group">
                                <label>Nama Lengkap</label>
                               <input type="text" name="nama_lengkap" class="form-control" required
                                        placeholder="Nama Lengkap" value="<?= $data->nama ?>">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                               <select class="form-control" name="jk">
                                        <option value="-">--PILIH JENIS KELAMIN--</option>
                                        <option value="Laki-Laki" <?= $data->jk == "Laki-Laki" ? 'selected=selected' : ''; ?>>Laki-Laki</option>
                                        <option value="Perempuan"  <?= $data->jk == "Perempuan" ? 'selected=selected' : ''; ?>>Perempuan</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label>Tempat/Tanggal/Lahir</label>
                               <input type="text" name="tempat" class="form-control" required placeholder="Tempat" value="<?= $data->tempat ?>">
                                    <input type="date" name="ttl" class="form-control" value="<?= $data->tanggal_lahir ?>">
                                
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                               <textarea name="alamat" class="form-control"><?= $data->alamat ?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Agama</label>
                                <select class="form-control" name="agama">
                                        <option value="">--AGAMA--</option>
                                        <option value="Islam" <?= $data->agama == "Islam" ? 'selected=selected' : ''; ?>>Islam</option>
                                        <option value="Kristen" <?= $data->agama == "Kristen" ? 'selected=selected' : ''; ?>>Kristen</option>
                                        <option value="Hindu" <?= $data->agama == "Hindu" ? 'selected=selected' : ''; ?>>Hindu</option>
                                        <option value="Budha" <?= $data->agama == "Budha" ? 'selected=selected' : ''; ?>>Budha</option>
                                        <option value="Konghucu" <?= $data->agama == "Konghucu" ? 'selected=selected' : ''; ?>>Konghucu</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                               <input type="email" name="email" class="form-control" required placeholder="Email" value="<?= $data->email ?>">
                                
                            </div>
                            <div class="form-group">
                                <label>Telpon</label>
                               <input type="text" name="telpon" class="form-control" required placeholder="Telpon" value="<?= $data->telpon ?>">
                                
                            </div>

                            <div class="form-group">
                                <label>Departement</label>
                               <select name="departement" class="form-control selectpicker"
                                        data-live-search="true">
                                        <option value="">--PILIH Departement--</option>
                                        <?php foreach ($dep as $departement) { ?>
                                        <option value="<?= $departement->id_dep?>"<?= $departement->id_dep == $data->departement ? 'selected=selected' : ''; ?>><?= $departement->nama_dep ?>
                                        </option>
                         
                                        <?php } ?>
                                    </select>
                                
                            </div>
                            <div class="form-group">
                                <label>Section</label>
                               <select name="section" class="form-control  selectpicker" data-live-search="true">
                                        <option value="">--PILIH SECTION--</option>
                                        <?php foreach ($sec as $section) { ?>
                                        <option value="<?= $section->id_sec ?>"
										<?= $section->id_sec == $data->section ? 'selected=selected' : ''; ?>
										><?= $section->nama_sec ?></option>
                                        <?php } ?>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                               <select name="jabatan" class="form-control  selectpicker" data-live-search="true">
                                        <option value="">--PILIH JABATAN--</option>
                                        <?php foreach ($jab as $jabatan) { ?>
                                        <option value="<?= $jabatan->id_jab ?>"
										<?= $jabatan->id_jab == $data->jabatan ? 'selected=selected' : ''; ?>
										><?= $jabatan->nama_jab ?></option>
                                        <?php } ?>
                                    </select>
                            </div>
                                 <div class="form-group">
                                <label>Foto</label>
<input type="file" name="foto" class="form-control" id="customFile" />
                            </div>

                                    <button class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
						</div>
					</div>
				</div>

		</div>
	</div>