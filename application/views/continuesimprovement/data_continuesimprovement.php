<div class="container-fluid">
    <!-- Page Heading -->    <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
              <li class="breadcrumb-item active" aria-current="">Continues Inprovement</a></li>
              <!-- <li class="breadcrumb-item active" aria-current="">Create Training</li> -->
            </ol>
          </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold ">Data Continues Improvement
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="container">
                    <a href="<?= base_url('admin/create_continuesimprovement') ?>" class="btn btn-success"><i class="fas fa-plus-circle"></i> Add Continues Improvement</a>
                    <hr>
                </div>
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
                <?php    } ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>pembuat</th>
                            <th>Tanggal Implementasi</th>
                            <th>Tim Terlibat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($continuesimprovement as $x) { ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $x->judul; ?></td>
                                <td><?= $x->nama; ?></td>
                                <td><?= $x->t_implementasi; ?></td>
                                <?php
                                $model = $this->load->model('ci_m');
                                $citt = $this->ci_m->get_tim_ci($x->tim);
                                ?>
                                <td> <?php
                                        foreach ($citt as $ok) {
                                            echo $ok->nama_tim;
                                            echo "
                                    <hr>";
                                        }
                                        ?>
                                </td>
                                <td align="center">
                                    <a href="<?= base_url("admin/delete_continuesimprovement/") . $x->tim ?>" class="btn btn-danger"> <i class="fas fa-trash"></i></a>
                                    <a href="<?= base_url("admin/update_continuesimprovement/") . $x->id_ci . "/" . $x->pembuat ?>" class="btn btn-success"> <i class="fas fa-edit"></i></a>
                                </td>

                            </tr>
                        <?php   } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>