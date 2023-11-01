<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card-body">
        <div class="card shadow mb-4">
            <div class="card-header">
                <b>Dashboard</b>
            </div>
            <div class="card-body">

                <div class="row">
                    <!-- mulai -->

                    <!-- mulai -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <span class="float-left"><img src="<?= base_url('assets') ?>/img/dash/dash-1.png" alt="" width="210" height="160"></span>
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            <h6>
                                                <b>Karyawan</b>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <b><?= $total_karyawan ?></b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <span class="float-left"><img src="<?= base_url('assets') ?>/img/dash/dep.svg" alt="" width="210" height="160"></span>
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            <h6>
                                                <b>
                                                    Departement
                                                </b>

                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <b><?= $total_departement ?></b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <span class="float-left"><img src="<?= base_url('assets') ?>/img/dash/section.svg" alt="" width="210" height="160"></span>
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            <h6>
                                                <b>
                                                    Section
                                                </b>

                                            </h6>

                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <b><?= $total_section ?></b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <span class="float-left"><img src="<?= base_url('assets') ?>/img/dash/jab.svg" alt="" width="210" height="160"></span>
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            <h6>
                                                <b>
                                                    jabatan
                                                </b>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <b><?= $total_jabatan ?></b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Content Row -->
                </div>
                <div class="row">

                    <!-- Area Chart -->
                   
                    <!-- Pie Chart -->
           
                </div>

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
    </div>
</div>