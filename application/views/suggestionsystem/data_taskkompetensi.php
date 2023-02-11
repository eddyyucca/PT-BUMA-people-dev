<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold ">Data Kompetensi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="container">
                    <a href="<?= base_url('admin/create_task_kompetensi') ?>" class="btn btn-success"><i class="fas fa-plus-circle"></i> Tambah Kompetensi</a>
                    <hr>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jabatan</th>
                            <th>Jenis kompetensi</th>
                            <th>Task kompetensi</th>
                            <th>Level</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($data as $x) { ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $x->nama_jab; ?></td>
                                <td><?= $x->j_kompetensi; ?></td>
                                <td><?= $x->t_kompetensi; ?></td>
                                <td><?= $x->level_kom; ?></td>
                                <td align="center">
                                    <a href="<?= base_url('admin/delete_task_kompetensi/') . $x->id_kompetensi; ?>" class="btn btn-danger">Hapus</a>
                                    <a href="<?= base_url('admin/update_task_kompetensi/') . $x->id_kompetensi; ?>" class="btn btn-primary">Edit</a>
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