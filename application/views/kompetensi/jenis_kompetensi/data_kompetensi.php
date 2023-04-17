<div class="content-body">
    <div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold ">Data Kompetensi</h6>
        </div>
        <div class="container">
            <a href="<?= base_url('admin/create_kompetensi') ?>" class="btn btn-success"><i class="fas fa-plus-circle"></i> Tambah Jenis Kompetensi</a>
            <hr>
        </div>
        <div class="card-body">
            <div class="table-responsive">
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
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kompetensi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($data as $x) { ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $x->j_kompetensi; ?></td>
                                <td align="center">
                                    <a href="<?= base_url('admin/delete_kompetensi/') . $x->id_kom; ?>" class="btn btn-danger shadow btn-xs sharp">Hapus</a>
                                    <a href="<?= base_url('admin/edit_kompetensi/') . $x->id_kom; ?>" class="btn btn-primary shadow btn-xs sharp">Edit</a>
                                </td>
                            </tr>
                        <?php   } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

