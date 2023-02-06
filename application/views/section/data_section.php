<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold ">Data <Section></Section>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="container">
                    <a href="<?= base_url('admin/create_section') ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Section</a>
                    <hr>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Section</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($data as $x) { ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $x->nama_sec; ?></td>
                                <td align="center">

                                    <button class="second">Second Alert</button>
                                    <a href="<?= base_url('admin/delete_section/') . $x->id_sec; ?>" class="btn btn-danger">Hapus</a>
                                    <a href="<?= base_url('admin/edit_section/') . $x->id_sec; ?>" class="btn btn-primary">Edit</a>
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