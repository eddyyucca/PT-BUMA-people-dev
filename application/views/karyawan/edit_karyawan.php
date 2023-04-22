<div class="container">
		<div class="main-body">
              <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('admin/view_karyawan/') .$data->nik ?>">User</a></li>
              <li class="breadcrumb-item active" aria-current="">User Profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
			<div class="row">
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">
								<img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
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
                    <form action="<?= base_url('admin/proses_tambah_karyawan')  ?>" method="POST" enctype="multipart/form-data">
					<div class="card">
						<div class="card-body">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Full Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?= $data->nama ?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?= $data->email ?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Phone</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?= $data->telpon ?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Address</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?= $data->alamat ?>">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="button" class="btn btn-success px-4" value="Save">
								</div>
							</div>
                        </form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>