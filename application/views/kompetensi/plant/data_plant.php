<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold ">Data Plant Kompetensi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="container">
                    <a href="<?= base_url('admin/create_plant') ?>" class="btn btn-success"><i class="fas fa-plus-circle"></i> Tambah Plant Kompetensi</a>
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
                            <th>Plant Kompetensi</th>
                            <th>Bidang Pengembangan</th>
                            <th>Target</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($data as $x) { ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $x->nama_plant; ?></td>
                                <td><?php if ($x->pengembangan == "1") {
                                        echo "Core Competency";
                                    } elseif ($x->pengembangan == "2")
                                        echo "Leadership Competency";
                                    ?></td>
                                <td>
                                    <?php
                                    $model = $this->load->model('kompetensi_m');
                                    $target = $this->kompetensi_m->get_all_pk_sub($x->target_p);
                                    ?>
                                    <?php
                                    foreach ($target as $t) {
                                        echo $t->j_kompetensi;
                                        echo "
                                    <hr>";
                                    }
                                    ?>
                                </td>
                                <td align="center">
                                    <a href="<?= base_url('admin/delete_kompetensi/') . $x->id_plant; ?>" class="btn btn-danger">Hapus</a>
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