<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold ">Data Assessment Karyawan<Section></Section>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="container">
                    <a href="<?= base_url('admin/create_assessment') ?>" class="btn btn-success"><i class="fas fa-plus-circle"></i> Tambah Assessment</a>
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
                            <th>Karyawan</th>
                            <th>Kompetensi</th>
                            <th>Target Kompetensi</th>
                            <th>Asesor</th>
                            <th>Dokumen Pendukung</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($data as $x) { ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $x->nama; ?></td>
                                <td><?= $x->j_kompetensi; ?></td>
                                <td><?= $x->t_kompetensi; ?></td>
                                <td><?php
                                    $model = $this->load->model('karyawan_m');
                                    $am = $this->karyawan_m->get_row_nik($x->asesor);
                                    echo $am->nama; ?></td>
                                <td align="center">
                                    <a href="<?= base_url('assets/dokumen_pendukung/') . $x->f_pendukung; ?>" class="btn btn-primary" target="_blank">Open File</a>
                                </td>
                                <td align="center">
                                    <a href="<?= base_url('admin/delete_assessment/') . $x->id_am; ?>" class="btn btn-danger">Hapus</a>
                                    <a href="<?= base_url('admin/edit_assessment/') . $x->id_am; ?>" class="btn btn-primary">Edit</a>
                                </td>
                            </tr>
                        <?php   } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php if ($this->session->flashdata('flash_message')) : ?>
    <script>
        swal({
            title: "Done",
            text: "<?php echo $this->session->flashdata('flash_message'); ?>",
            timer: 1500,
            showConfirmButton: false,
            type: 'success'
        });
    </script>
<?php endif; ?>