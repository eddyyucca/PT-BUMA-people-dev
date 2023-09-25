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
    <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
              <li class="breadcrumb-item active" aria-current="">Traning</li>
            </ol>
          </nav>
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold ">Data Training<Section></Section>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="container">
                    <a href="<?= base_url('admin/create_training_int') ?>" class="btn btn-success"><i class="fas fa-plus-circle"></i> Tambah Training</a>
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
                            <th>Pemberi Materi</th>
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
                                    <?= $x->nama_training_opt; ?>
                                </td>
                                <td><?= tanggal_indonesia($x->mulai_t) . " - " . tanggal_indonesia($x->akhir_t) ?></td>
                             <?php
                                $model = $this->load->model('karyawan_m');
                                $pm = $this->karyawan_m->get_row_nik($x->p_materi);
                                ?>
                                <td> 
                                    <?php
                                            echo $pm->nama;
                                        ?>
                                </td>
                            </td>
                                <td align="center">
                                    <a href="<?= base_url('admin/delete_training_int/') . $x->id_training_int; ?>" class="btn btn-danger">  <i class="fas fa-trash"></i></a>
                                    <a href="<?= base_url('admin/edit_training_int/') . $x->id_training_int; ?>" class="btn btn-primary"> <i class="fas fa-edit"></i></a>
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