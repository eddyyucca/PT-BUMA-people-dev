<div class="content-body">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h4>User Card View</h4>
                    <span>Lorem ipsum sit amet</span>
                </div>
                <a href="javascript:void(0);" class="btn btn-info light">+ Add Card</a>
            </div>
        </div>
    </div>
    <!-- foreach data karyawan -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <div class="container">
        <a href="<?= base_url('admin/add_karyawan/') ?>" class="btn btn-success"><i class="fas fa-user-plus"></i> Add Karyawan</a>
        <a href="" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
            <i class="fas fa-file-excel"></i> Import Excel</a>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Upload Data Karyawan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('admin/import')  ?>" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input type="file" class="form-control" name="file" accept=".xls, .xlsx" required>
                                    <div class="mt-1">
                                        <span class="text-secondary">File yang harus diupload : .xls, xlsx</span>
                                    </div>
                                    <?= form_error('file', '<div class="text-danger">', '</div>') ?>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary">Simpan</button>
                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Upload</button> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <nav class="navbar ">
            <form class="form-inline" action="<?= base_url('admin/search_data_karyawan')  ?>" method="POST">
                <input class="form-control mr-sm-2" type="search" name="cari" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </nav>
        <hr>
        <?php
        if ($this->session->flashdata('pesan') == "hapus") { ?>
            <div class="alert alert-danger" role="alert">Data Berhasil Di Hapus !
            </div>
        <?php   } elseif ($this->session->flashdata('pesan') == "buat") { ?>
            <div class="alert alert-success" role="alert">
                Data Berhasil Di Tambah !
            </div>
        <?php    } elseif ($this->session->flashdata('pesan') == "ubah") { ?>
            <div class="alert alert-warning" role="alert">
                Data Berhasil Di Ubah !
            </div>
        <?php  } elseif ($this->session->flashdata('pesan') == "import") { ?>
            <div class="alert alert-success" role="alert">
                Data Berhasil Di Import !
            </div>
        <?php    }  ?>
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-lg-6">
                <!-- Section Heading-->
            </div>
        </div>
        <div class="row">
            <!-- Single Advisor-->
            <?php foreach ($data as $kar) : ?>
                <div class="col-xl-3 col-xxl-4 col-sm-6">
                    <div class="card user-card">
                        <div class="card-body pb-0">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="dz-media me-3">
                                    <span class="icon-placeholder bg-primary text-white">pm</span>
                                </div>
                                <div>
                                    <h5 class="title"><a href="javascript:void(0);"><?= $kar->nama ?></a></h5>
                                    <span class="text-success"><?= $kar->nama_jab ?></span>
                                </div>
                            </div>
                            <!-- <p class="fs-12">Anticipate guests needs in order to accommodate them and provide an exceptional guest experience</p> -->
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <span class="mb-0 title">Nik</span> :
                                    <span class="text-black ms-2"><?= $kar->nik ?></span>
                                </li>
                                <li class="list-group-item">
                                    <span class="mb-0 title">Phone</span> :
                                    <span class="text-black ms-2"><?= $kar->telpon ?></span>
                                </li>
                                <li class="list-group-item">
                                    <span class="mb-0 title">Section</span> :
                                    <span class="text-black desc-text ms-2"><?= $kar->nama_sec ?></span>
                                </li>
                                <li class="list-group-item">
                                    <span class="mb-0 title">Departement</span> :
                                    <span class="text-black desc-text ms-2"><?= $kar->nama_dep ?></span>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <a href="<?= base_url('admin/view_karyawan/') . $kar->nik ?>" class="btn btn-secondary btn-xs">View Karyawan</a>
                        </div>
                    </div>
                </div>
            <?php
            endforeach; ?>
            <!-- Single Advisor-->
        </div>
    </div>
</div>
<!-- footer -->
<div class="row">
    <div class="col">
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>
