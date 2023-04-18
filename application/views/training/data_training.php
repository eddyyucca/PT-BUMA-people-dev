<?php
function tanggal_indonesia($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );

    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold ">Data Training<Section></Section>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="container">
                    <a href="<?= base_url('admin/create_training') ?>" class="btn btn-success"><i class="fas fa-plus-circle"></i> Tambah Training</a>
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
                            <th>Training</th>
                            <th>Tanggal</th>
                            <th>Penyelenggara</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($data as $x) { ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $x->nama; ?>
                                    <br>
                                    <footer class="blockquote-footer">Section - <?= $x->nama_sec ?></footer>
                                    <footer class="blockquote-footer">Jabatan - <?= $x->nama_jab ?></footer>
                                </td>
                                <td>
                                    <?= $x->training; ?>
                                    <br>
                                    <footer class="blockquote-footer">
                                        <a href="<?= base_url('assets/sertifikat_training/') . $x->training_foto ?>" target="_blank"><b>Open Sertitikat</b></a>
                                    </footer>
                                </td>
                                <td><?= tanggal_indonesia($x->mulai_training) . " - " . tanggal_indonesia($x->akhir_training) ?></td>
                                <td><?= $x->penyelenggara ?></td>
                                <td align="center">
                                    <a href="<?= base_url('admin/delete_training/') . $x->id_training; ?>" class="btn btn-danger">Hapus</a>
                                    <a href="<?= base_url('admin/edit_training/') . $x->id_training; ?>" class="btn btn-primary">Edit</a>
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